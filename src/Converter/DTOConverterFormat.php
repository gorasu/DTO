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
use Gora\DTO\Mappings\Property\PropertyCollectionFillValueInterface;
use Gora\DTO\Mappings\Property\PropertyCollectionValidatorInterface;
use Gora\DTO\Mappings\Property\PropertyInterface;

class DTOConverterFormat implements DTOConverterFormatInterface
{


    /**
     * @var PropertyCollectionValidatorInterface
     */
    private $propertyCollection;

    public function __construct(DTOObjectInterface $DTOObject, MappingDriverInterface $mappingDriver)
    {
        $this->propertyCollection =  $this->createPropertyCollection($DTOObject,$mappingDriver);

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
            $result[$property->getApiName()] = $property->getValue();
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
     * @return PropertyCollectionValidatorInterface
     */
    private function createPropertyCollection(DTOObjectInterface $DTOObject, MappingDriverInterface $mappingDriver)
    {

        /** @var PropertyCollectionValidatorInterface $propertyCollection */
        $propertyCollection = $mappingDriver->createProperties(get_class($DTOObject));
        if (!($propertyCollection instanceof PropertyCollectionFillValueInterface)) {
            throw new \Exception('$propertyCollection must implement ' . PropertyCollectionFillValueInterface::class);
        }
        $propertyCollection->fillValueByDtoObject($DTOObject);
        return $propertyCollection;

    }

    /**
     * @return PropertyCollectionValidatorInterface
     */
    private function getPropertyCollection()
    {
        return $this->propertyCollection;
    }


}
