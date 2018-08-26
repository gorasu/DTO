<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 19.08.2018
 * Time: 13:38
 */

namespace Gora\DTO\Mappings\Property;


/**
 * Interface PropertyTypeInterface
 * @package Gora\DTO
 */
interface PropertyTypeInterface
{
    /**
     * PropertyTypeInterface constructor.
     * @param $type string
     */
    function __construct($type);

    /**
     * @return bool
     */
    function isArray();

    /**
     * @return bool
     */
    function isDtoClass();


    /**
     * @return string
     */
    function getDtoClassName();

}