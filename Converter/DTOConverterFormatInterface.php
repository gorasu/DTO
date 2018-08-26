<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 23.08.2018
 * Time: 21:50
 */

namespace Gora\DTO\Converter;


use Gora\DTO\DTOObjectInterface;
use Gora\DTO\Mappings\MappingDriverInterface;

/**
 * Interface DTOConverterInterface
 * @package Gora\DTO\Converter
 */
interface DTOConverterFormatInterface
{

    function __construct(DTOObjectInterface $DTOObject,MappingDriverInterface $mappingDriver);


    /**
     * @return array
     */
    function toArray();

    /**
     * @return string
     */
    function toJson();


}