<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 19.08.2018
 * Time: 13:40
 */

namespace Gora\DTO;


class PropertyType implements PropertyTypeInterface
{

    private $type;


    /**
     * PropertyTypeInterface constructor.
     * @param $type string
     */
    public function __construct($type)
    {


        $this->type = $type;
    }

    /**
     * @return bool
     */
    function isArray()
    {
       return strpos($this->getType(),'[]') !== false;
    }

    /**
     * @return bool
     */
    function isDtoObject()
    {
      $className =   rtrim($this->getType(),'[]');
      return class_exists($className);
    }

    /**
     * @return mixed
     */
    private function getType()
    {
        return $this->type;
    }
}