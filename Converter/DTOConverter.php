<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 23.08.2018
 * Time: 21:55
 */

namespace Gora\DTO\Converter;


use Gora\DTO\DTOObjectInterface;
use Gora\DTO\Mapping\MappingDriverInterface;

class DTOConverter implements DTOConverterInterface
{


    /**
     * @var MappingDriverInterface
     */
    private $mappingDriver;

    public function __construct(MappingDriverInterface $mappingDriver)
    {

        $this->mappingDriver = $mappingDriver;
    }

    /**
     * @param DTOObjectInterface $DTOObject
     * @return DTOConverterFormatInterface
     */
    function convert(DTOObjectInterface $DTOObject)
    {
        return new DTOConverterFormat($DTOObject,$this->mappingDriver);
    }
}