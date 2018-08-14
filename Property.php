<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:49
 */

namespace Gora\DTO;


class Property implements PropertyInterface
{

    private $type = null;
    private $name = null;
    private $apiName = null;
    private $required = false;
    private $value = null;

    function __construct($propertyName,array $propertyData)
    {
        foreach ($propertyData as $name =>$value ){
            $this->{$name} = $value;
        }

        $this->name = $propertyName;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getApiName()
    {
        return $this->apiName ?: $this->name;
    }

    /**
     * @return mixed
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param null $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

}