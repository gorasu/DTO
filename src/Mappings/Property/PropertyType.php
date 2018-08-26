<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 19.08.2018
 * Time: 13:40
 */

namespace Gora\DTO\Mappings\Property;


use Gora\DTO\Mappings\Property\PropertyTypeInterface;

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
    function isDtoClass()
    {
      return class_exists($this->getDtoClassName());
    }

    /**
     * @return string
     */
    function getDtoClassName()
    {
        return rtrim($this->getType(),'[]');
    }


    /**
     * @return string
     */
    private function getType()
    {
        return $this->type;
    }


}