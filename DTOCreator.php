<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 22:16
 */

namespace Gora\DTO;


use Gora\DTO\Mapping\MappingDriverInterface;
use ReflectionClass;

/**
 * DTOCreator создает объект DTO на базе полученных данных, как правило это ответ  API
 * Class DTOCreator
 * @package Gora\DTO
 */
class DTOCreator implements DTOCreatorInterface
{
    /**
     * @var
     */
    private $className;


    /**
     * @var
     */
    private $dataCollection;
    /**
     * @var MappingDriverInterface
     */
    private $mappingDriver;

    /**
     * @var PropertyInterface
     */
    private $properties;


    /**
     * ConvectorInterface constructor.
     * @param $className
     * @param $mappingDriver MappingDriverInterface
     */
    public function __construct($className, MappingDriverInterface $mappingDriver)
    {
        $this->className = $className;
        $this->mappingDriver = $mappingDriver;
        $this->setProperties($this->getMappingDriver()->createProperties($className));

    }


    /**
     * @return DTOObjectInterface|mixed
     * @throws \Exception
     */
    function createInstance()
    {


        $this->fillValuesToProperties();

        $object = $this->createDtoObject();

        foreach ($this->getProperties() as $property) {

            if($property->isRequired() && empty($property->getValue())){
                throw  new \Exception($property->getName().' обязательно для заполнения');
            }
        //@Todo нужно реализовать заливку приватных свойств
            $object->{$property->getName()} = $property->getValue();
        }
        return $object;


    }

    /**
     * @param DataCollectionInterface $dataCollection
     * @return $this
     */
    function setDataCollection(DataCollectionInterface $dataCollection)
    {
        $this->dataCollection = $dataCollection;
        return $this;
    }

    /**
     * @return DataCollectionInterface
     */
    private function getDataCollection()
    {
        return $this->dataCollection;
    }

    /**
     * @return DTOObjectInterface|mixed
     */
    private function createDtoObject(){
        $className = $this->getClassName();
        $reflection=new ReflectionClass($className);
        if(!$reflection->implementsInterface(DTOObjectInterface::class)){
            throw  new \Exception($this->getClassName() .' должен быть реализован от интерфеса DTOObjectInterface');
        }
        return new $className();
    }

    /**
     * @return string
     */
    private function getClassName()
    {
        return $this->className;
    }

    /**
     * @return MappingDriverInterface
     */
    private function getMappingDriver()
    {
        return $this->mappingDriver;
    }

    /**
     * @return PropertyInterface[]
     */
    private function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param PropertyInterface[] $properties
     */
    private function setProperties($properties)
    {
        $this->properties = $properties;
    }

    /**
     *
     */
    private function fillValuesToProperties(){
        $dataCollection = $this->getDataCollection();
        foreach ($this->getProperties() as $property) {
            if ($dataCollection->isExists($property->getApiName())) {
                $value = $dataCollection->getValue($property->getApiName());
                if ($property->getType()->isDtoClass()) {
                    if($property->getType()->isArray()){
                        $newValue = [];
                        foreach ($value as $val){
                            $newValue[] =  $this->createDtoObjectValue($property->getType(),$val);
                        }
                        $value = $newValue;
                    }else {
                        $value = $this->createDtoObjectValue($property->getType(),$value);
                    }
                }

                $property->setValue($value);
            }
        }
    }

    /**
     * @param PropertyTypeInterface $propertyType
     * @param $value
     * @return DTOObjectInterface|mixed
     */
    private function createDtoObjectValue(PropertyTypeInterface $propertyType, $value){
        $dataCollection = $this->getDataCollection();
        $mapping = new Static($propertyType->getDtoClassName(), $this->getMappingDriver());
        $mapping->setDataCollection($dataCollection::create($value));
        return $mapping->createInstance();
    }



}