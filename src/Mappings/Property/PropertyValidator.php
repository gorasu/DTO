<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 9:20
 */

namespace Gora\DTO\Mappings\Property;


use Gora\DTO\Exception\PropertyIsRequiredException;

class PropertyValidator implements PropertyValidatorInterface
{

    /**
     * @param PropertyInterface $property
     * @throws \Exception
     */
    function validate(PropertyInterface $property)
    {
        if(empty($property->getValue()) && $property->isRequired()) {
            throw new PropertyIsRequiredException($property);
        }
    }
}