<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 22:16
 */

namespace Gora\DTO;


class Mapping implements MappingInterface
{
    private $className;
    /**
     * @var PropertyInterface[]
     */
    private $properties;


    /**
     * MappingInterface constructor.
     * @param $class string
     * @param $properties PropertyInterface[]
     */
    public function __construct($className, $properties)
    {

        $this->className = $className;
        $this->properties = $properties;
    }

    /**
     *
     */
    function createInstance()
    {
        //@todo проверку на тип объекта сделать что это DTOIntrface
        $object = new $this->className();
        foreach ($this->properties as $property){
            $object->{$property->getName()} = $property->getValue();
        }
        return $object;


    }
}