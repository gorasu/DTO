<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 9:20
 */

namespace Gora\DTO\Mappings\Property;


use Gora\DTO\Exception\PropertyIsRequiredException;
use Gora\DTO\Exception\PropertyValidateTypeException;

class PropertyValidator implements PropertyValidatorInterface
{

    /**
     * @param PropertyInterface $property
     * @throws \Exception
     */
    function validate($value, PropertyInterface $property)
    {
        if(empty($value) && $property->isRequired()) {
            throw new PropertyIsRequiredException($property);
        }

        if(!$this->validateType($value,$property->getType())){

            throw new PropertyValidateTypeException($property);
        }


    }

    private function validateType($value, PropertyTypeInterface $propertyType){

        if(empty($value)){
            return true;
        }
        if($propertyType->isArray()){
            return is_array($value);
        }
        if($propertyType->isString()){
            return is_string($value);
        }
        if($propertyType->isBool()){
            return is_bool($value);
        }
        if($propertyType->isInteger()){
            return is_integer($value);
        }
        if($propertyType->isDtoClass() && !$propertyType->isArray()){
            $className = $propertyType->getDtoClassName();
            return $value instanceof $className;
        }

        return true;

    }


}