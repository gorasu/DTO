<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 9:15
 */

namespace Gora\DTO\Mappings\Property;


interface PropertyValidatorInterface
{

    /**
     * @param PropertyInterface $property
     * @throws \Exception
     */
    function validate(PropertyInterface $property);

}