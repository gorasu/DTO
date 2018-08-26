<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:47
 */

namespace Gora\DTO\Mappings\Driver;


use Gora\DTO\Mappings\Property\Property;
use Gora\DTO\Mappings\Property\PropertyCollection;
use Gora\DTO\Mappings\Property\PropertyCollectionInterface;
use Gora\DTO\Mappings\Property\PropertyData;
use Gora\DTO\Mappings\Property\PropertyValidator;
use ReflectionProperty;

class AnnotationDriver implements MappingDriverInterface
{

    private static $propertiesReflectionCache;


    /**
     * @param $className
     * @return PropertyCollectionInterface
     * @throws \ReflectionException
     */
    public function createProperties($className){

        $propertiesCollection  = new PropertyCollection();
        if(!($propertiesReflection = static::getPropertiesReflectionCache($className))){
            $reflectionClass = new \ReflectionClass($className);
            $propertiesReflection = $reflectionClass->getProperties();
            foreach ($propertiesReflection as $reflectionProperty) {
                static::setPropertiesReflectionCache($className, $reflectionProperty);
            }
        }
        foreach ($propertiesReflection as $reflectionProperty){
            preg_match('/@DTO(\((.*?)\))*/',$reflectionProperty->getDocComment(),$dtoInfo);

            $jsonString = isset($dtoInfo[2]) ? $dtoInfo[2] : null;
            if($jsonString) {
                $propertyData = json_decode($jsonString,true);

                $property = new Property($reflectionProperty->getName(),new PropertyData($propertyData));
                $property->setValidator(new PropertyValidator());
                $propertiesCollection->add($property);
            }

        }
       return $propertiesCollection;



    }

    /**
     * @return ReflectionProperty[]
     */
    private static function getPropertiesReflectionCache($className)
    {
        return isset(self::$propertiesReflectionCache[$className]) ? self::$propertiesReflectionCache[$className] : [];
    }

    /**
     * @param mixed $propertiesCache
     */
    public static function setPropertiesReflectionCache($className, ReflectionProperty $property)
    {
        self::$propertiesReflectionCache[$className][] = $property;
    }



}