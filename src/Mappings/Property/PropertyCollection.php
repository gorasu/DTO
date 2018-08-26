<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 11:46
 */

namespace Gora\DTO\Mappings\Property;


use Gora\DTO\Exception\PropertyIsRequiredException;
use Traversable;

class PropertyCollection implements PropertyCollectionInterface
{
    /**
     * @var PropertyInterface[]
     */
    private $properties;


    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->properties);
    }


    function add(PropertyInterface $property)
    {
       $this->properties[] = $property;
    }
}