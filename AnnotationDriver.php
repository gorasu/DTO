<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:47
 */

namespace Gora\DTO;


use ReflectionProperty;

class AnnotationDriver implements MappingDriverInterface
{

    private static $propertiesReflectionCache;


    /**
     * @param $className
     * @param DataCollectionInterface $dataCollection
     */
    function createObject($className, DataCollectionInterface $dataCollection)
    {
        $properties = [];
        foreach ($this->getProperties($className) as $property){
            if($dataCollection->isExists($property->getApiName())){
                $value = $dataCollection->getValue($property->getApiName());
                if(class_exists($property->getType())){
                    //@todo избавиться от объявления DataCollection - может быть сюда принимать массив и уже тут создавать коллекцию
                    $value = $this->createObject($property->getType(),new DataCollection($property->getValue()));
                }

                $property->setValue($value);

                $properties[] = $property;
            }
        }
        return (new Mapping($className,$properties))->createInstance();


    }


    /**
     * @param $className
     * @return Property[]
     * @throws \ReflectionException
     */
    private function getProperties($className){

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