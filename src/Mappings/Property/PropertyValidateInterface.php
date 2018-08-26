<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 12:57
 */

namespace Gora\DTO\Mappings\Property;


interface PropertyValidateInterface
{

    /**
     * @param PropertyValidatorInterface $validator
     * @return mixed
     */
    function setValidator(PropertyValidatorInterface $validator);

}