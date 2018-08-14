<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:44
 */

namespace Gora\DTO;


/**
 * Класс отвечающий за создание объектов на основе имени класа и свйост
 * Interface MappingInterface
 * @package Gora\DTO
 */
interface MappingInterface
{

    /**
     * MappingInterface constructor.
     * @param $class string
     * @param $properties PropertyInterface[]
     */
    function __construct($className, $properties);


    /**
     * Возвращает объект типа $className созданный на основе перданных свойст
     * @return mixed
     */
    function createInstance();

    /**
     * @param DataCollectionInterface $dataCollection
     * @return $this
     */
    function setDataCollection(DataCollectionInterface $dataCollection);

}