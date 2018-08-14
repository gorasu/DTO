<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:37
 */
namespace Gora\DTO;


interface MappingDriverInterface
{
    function createObject($className,DataCollectionInterface $dataCollection);

}