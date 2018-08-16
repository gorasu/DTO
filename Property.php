<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:49
 */

namespace Gora\DTO;


/**
 * Class Property
 * @package Gora\DTO
 */
class Property implements PropertyInterface
{

    /**
     * @var string|null
     */
    private $type = null;
    /**
     * @var string|null
     */
    private $name = null;
    /**
     * Имя свойства в API
     * @var string|null
     */
    private $apiName = null;
    /**
     * @var bool
     */
    private $required = false;
    /**
     * @var mixed|null
     */
    private $value = null;

    /**
     * Property constructor.
     * @param $propertyName
     * @param array $propertyData
     */
    function __construct($propertyName, array $propertyData)
    {
        foreach ($propertyData as $name =>$value ){
            $this->{$name} = $value;
        }

        $this->name = $propertyName;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getApiName()
    {
        return $this->apiName ?: $this->name;
    }

    /**
     * @return bool
     */
    public function isRequired()
    {
         return filter_var($this->required, FILTER_VALIDATE_BOOLEAN);
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