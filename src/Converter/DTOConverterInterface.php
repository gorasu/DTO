<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 23.08.2018
 * Time: 21:50
 */

namespace Gora\DTO\Converter;


use Gora\DTO\DTOObjectInterface;
use Gora\DTO\Mappings\Driver\MappingDriverInterface;

/**
 * Interface DTOConverterInterface
 * @package Gora\DTO\Converter
 */
interface DTOConverterInterface
{

    function __construct(MappingDriverInterface $mappingDriver);

    /**
     * @param DTOObjectInterface $DTOObject
     * @return DTOConverterFormatInterface
     */
    function convert(DTOObjectInterface $DTOObject);


}