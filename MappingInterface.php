<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:44
 */

namespace Gora\DTO;


interface MappingInterface
{

    /**
     * MappingInterface constructor.
     * @param $class string
     * @param $properties PropertyInterface[]
     */
    function __construct($className, $properties);


    function createInstance();

}