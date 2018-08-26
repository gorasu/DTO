<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:47
 */

namespace Gora\DTO\Mappings\Driver;


use Gora\DTO\Mappings\Driver\MappingDriverInterface;
use Gora\DTO\Property;
use Gora\DTO\PropertyInterface;
use ReflectionProperty;

class AnnotationDriver implements MappingDriverInterface
{

    private static $propertiesReflectionCache;


    /**
     * @param $className
     * @return PropertyInterface[]
     * @throws \ReflectionException
     */
    public function createProperties($className){

        if(!($propertiesReflection = static::getPropertiesReflectionCache($className))){
            $reflectionClass = new \ReflectionClass($className);
            $propertiesReflection = $reflectionClass->getProperties();
            foreach ($propertiesReflection as $reflectionProperty) {
                static::setPropertiesReflectionCache($className, $reflectionProperty);
            }
        }
        $properties = [];
        foreach ($propertiesReflection as $reflectionProperty){
            preg_match('/@DTO(\((.*?)\))*/',$reflectionProperty->getDocComment(),$dtoInfo);

            $jsonString = isset($dtoInfo[2]) ? $dtoInfo[2] : null;
            if($jsonString) {
                $propertyData = json_decode($jsonString,true);
                $properties[] = new Property($reflectionProperty->getName(),$propertyData);
            }

        }
       return $properties;



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