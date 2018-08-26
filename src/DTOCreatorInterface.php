<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:44
 */

namespace Gora\DTO;
use Gora\DTO\Mappings\Driver\MappingDriverInterface;

/**
 * Класс отвечающий за создание объектов на основе имени класа и свйост
 * Interface DTOCreatorInterface
 * @package Gora\DTO
 */
interface DTOCreatorInterface
{

    /**
     * ConvectorInterface constructor.
     * @param $className string
     * @param $mappingDriver MappingDriverInterface
     */
    function __construct($className, MappingDriverInterface $mappingDriver);


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