<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 23.08.2018
 * Time: 22:43
 */

namespace Gora\DTO\Converter;


use Gora\DTO\DTOObjectInterface;
use Gora\DTO\Exception\NotDoneException;
use Gora\DTO\Exception\PropertyIsRequiredException;
use Gora\DTO\Mappings\Driver\MappingDriverInterface;
use Gora\DTO\Mappings\Property\PropertyCollection;
use Gora\DTO\Mappings\Property\PropertyCollectionFillValueInterface;
use Gora\DTO\Mappings\Property\PropertyCollectionInterface;
use Gora\DTO\Mappings\Property\PropertyInterface;

class DTOConverterFormat implements DTOConverterFormatInterface
{


    /**
     * @var PropertyCollection
     */
    private $propertyCollection;
    /**
     * @var MappingDriverInterface
     */
    private $mappingDriver;


    /**
     * DTOConverterFormat constructor.
     * @param DTOObjectInterface $DTOObject
     * @param MappingDriverInterface $mappingDriver
     * @throws \Exception
     */
    public function __construct(DTOObjectInterface $DTOObject, MappingDriverInterface $mappingDriver)
    {
        $this->mappingDriver = $mappingDriver;
        $this->propertyCollection =  $this->createPropertyCollection($DTOObject);
    }

    /**
     * @return array
     * @throws PropertyIsRequiredException
     */
    function toArray()
    {
        $result = [];
        /** @var PropertyInterface $property */
        foreach ($this->getPropertyCollection() as $property) {
            $value = $property->getValue();
            if($property->getValue() && $property->getType()->isDtoClass()){

                if($property->getType()->isArray()){
                    $newValue = [];
                    foreach ($value as $item){
                        $newValue[] = $this->getRecursionConvert($item, __FUNCTION__);
                    }
                    $value =$newValue;
                }else {
                    $value = $this->getRecursionConvert($value, __FUNCTION__);
                }

            }

            $result[$property->getApiName()] = $value;
        }
        return $result;

    }

    /**
     * @return string
     */
    function toJson()
    {
        throw new NotDoneException();
    }


    /**
     * @throws \Exception
     * @return PropertyCollectionInterface
     */
    private function createPropertyCollection(DTOObjectInterface $DTOObject)
    {

        /** @var PropertyCollectionInterface $propertyCollection */
        $propertyCollection = $this->getMappingDriver()->createProperties(get_class($DTOObject));
        if (!($propertyCollection instanceof PropertyCollectionFillValueInterface)) {
            throw new \Exception('$propertyCollection must implement ' . PropertyCollectionFillValueInterface::class);
        }
        $propertyCollection->fillValueByDtoObject($DTOObject);
        return $propertyCollection;

    }

    /**
     * @return PropertyCollectionInterface
     */
    private function getPropertyCollection()
    {
        return $this->propertyCollection;
    }

    /**
     * @return MappingDriverInterface
     */
    private function getMappingDriver()
    {
        return $this->mappingDriver;
    }

    private function getRecursionConvert (DTOObjectInterface $DTOObject, $methodName){
        $converter = new Static($DTOObject,$this->getMappingDriver());
        return $converter->{$methodName}();
    }


}
