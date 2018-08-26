<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 12:53
 */

namespace Gora\DTO\Mappings\Property;


interface PropertyCollectionValidatorInterface
{

    /**
     * PropertyCollectionValidatorInterface constructor.
     * @param PropertyValidatorInterface $validator
     */
    function __construct(PropertyValidatorInterface $validator);

    /**
     * @return PropertyValidatorInterface
     */
    function getValidator();

}