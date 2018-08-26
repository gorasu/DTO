<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 8:59
 */

namespace Gora\DTO\Mappings\Property;


use Gora\DTO\DTOObjectInterface;

interface PropertyCollectionFillValueInterface
{

    /**
     * @param DTOObjectInterface $property
     * @return mixed
     */
    function fillValueByDtoObject(DTOObjectInterface $object);


}