<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 23.08.2018
 * Time: 21:50
 */

namespace Gora\DTO\Converter;


use Gora\DTO\DTOObjectInterface;

/**
 * Interface DTOConverterInterface
 * @package Gora\DTO\Converter
 */
interface DTOConverterInterface
{

    /**
     * @param DTOObjectInterface $DTOObject
     * @return $this
     */
    function convert(DTOObjectInterface $DTOObject);

    /**
     * @return array
     */
    function toArray();

    /**
     * @return string
     */
    function toJson();


}