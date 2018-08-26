<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 16:12
 */

namespace Gora\DTO\Mappings\Property;


class PropertyData implements PropertyDataInterface
{

    private $type = "string";
    private $name = null;
    private $apiName = null;
    private $required = false;

    function __construct(array $propertyData)
    {
        foreach ($propertyData as $name =>$value ){
            $this->{$name} = $value;
        }
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return null
     */
    public function getApiName()
    {
        return $this->apiName;
    }

    /**
     * @return bool
     */
    public function getRequired()
    {
        return $this->required;
    }

}