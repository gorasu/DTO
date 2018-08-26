<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 8:59
 */

namespace Gora\DTO\Mappings\Property;


interface PropertyCollectionInterface extends  \IteratorAggregate
{

    /**
     * @return \ArrayIterator || PropertyInterface[]
     */
    function getIterator();

    /**
     * @param PropertyInterface $property
     * @return mixed
     */
    function add(PropertyInterface $property);


}