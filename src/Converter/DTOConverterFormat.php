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
use Gora\DTO\Mappings\Property\PropertyInterface;

class DTOConverterFormat implements DTOConverterFormatInterface
{

    /**
     * @var DTOObjectInterface
     */
    private $DTOObject;
    /**
     * @var MappingDriverInterface
     */
    private $mappingDriver;

    /**
     * @var PropertyInterface[]
     */
    private $properties;

    public function __construct(DTOObjectInterface $DTOObject, MappingDriverInterface $mappingDriver)
    {
        $this->DTOObject = $DTOObject;
        $this->mappingDriver = $mappingDriver;
        $this->properties = $mappingDriver->createProperties(get_class($this->getDTOObject()));

    }

    /**
     * @return array
     * @throws PropertyIsRequiredException
     */
    function toArray()
    {
       $properties =  $this->getMappingDriver()->createProperties(get_class($this->getDTOObject()));
       $dtoObject = $this->getDTOObject();
       $result = [];
       foreach ($properties as $property){

           $value = $dtoObject->{$property->getName()};
           $this->validate($value,$property);

           $result[$property->getApiName()] =  $value;
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
     * @return MappingDriverInterface
     */
    private function getMappingDriver()
    {
        return $this->mappingDriver;
    }

    /**
     * @return DTOObjectInterface
     */
    private function getDTOObject()
    {
        return $this->DTOObject;
    }

    /**
     * @param $value
     * @param PropertyInterface $property
     * @throws PropertyIsRequiredException
     */
    private function validate($value, PropertyInterface $property){

        if(empty($value) && $property->isRequired()){
            throw new PropertyIsRequiredException($property);
        }

    }
}