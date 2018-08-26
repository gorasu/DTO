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
    function validate($value, PropertyInterface $property)
    {
        if(empty($value) && $property->isRequired()) {
            throw new PropertyIsRequiredException($property);
        }
    }
}