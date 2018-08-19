<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:45
 */

namespace Gora\DTO;


/**
 * Interface PropertyInterface
 * @package Gora\DTO
 */
interface PropertyInterface
{
    /**
     * @return PropertyTypeInterface
     */
    function getType();

    /**
     * @return string
     */
    function getName();

    /**
     * @return string
     */
    function getApiName();

    /**
     * @return bool
     */
    function isRequired();

    /**
     * @param $value
     * @return mixed
     */
    function setValue($value);

    /**
     * @return mixed
     */
    function getValue();

}