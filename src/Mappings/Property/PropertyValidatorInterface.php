<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 9:15
 */

namespace Gora\DTO\Mappings\Property;


use Gora\DTO\Exception\PropertyIsRequiredException;

interface PropertyValidatorInterface
{

    /**
     * @param PropertyInterface $property
     * @throws \Exception
     * @throws PropertyIsRequiredException
     * @throws PropertyIsStringException
     * @throws PropertyIsIntegerException
     * @throws PropertyIsBoolException
     */
    function validate(PropertyInterface $property);

}