<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:37
 */
namespace Gora\DTO;


/**
 * Драйвер который на основе каких то настроек свойст объекта DTO подготавливает экземпляр MappingInterface
 * Interface MappingDriverInterface
 * @package Gora\DTO
 */
interface MappingDriverInterface
{


    /**
     *
     * @param $className
     * @return PropertyInterface[]
     */
    function createProperties($className);
}