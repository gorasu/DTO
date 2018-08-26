<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:38
 */

namespace Gora\DTO;

/**
 * Интерфейс для объектов  хранящие данные для создания объекта типа DTO
 * Interface DataCollectionInterface
 * @package Gora\DTO
 */
interface DataCollectionInterface
{

    /**
     * DataCollectionInterface constructor.
     * @param $data
     */
    function __construct($data);

    /**
     * @param $key
     * @return mixed
     */
    function isExists($key);

    /**
     * @param $key
     * @return mixed
     */
    function getValue($key);

    /**
     * @param $data
     * @return $this
     */
    static function create($data);

}