<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:37
 */
namespace Gora\DTO\Mappings\Driver;
use Gora\DTO\Mappings\Property\PropertyInterface;


/**
 * Драйвер который на основе каких то настроек свойст объекта DTO подготавливает экземпляр ConvectorInterface
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