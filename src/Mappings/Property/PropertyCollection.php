<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 11:46
 */

namespace Gora\DTO\Mappings\Property;

use Gora\DTO\DTOObjectInterface;
use Traversable;

class PropertyCollection implements PropertyCollectionInterface, PropertyCollectionAdderInterface, PropertyCollectionFillValueInterface, PropertyCollectionValidatorInterface
{
    /**
     * @var PropertyInterface[]
     */
    private $properties;
    /**
     * @var PropertyValidatorInterface
     */
    private $validator;

    /**
     * PropertyCollectionValidatorInterface constructor.
     * @param PropertyValidatorInterface $validator
     */
    public function __construct(PropertyValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

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
       $this->setValidatorToProperty($property);
       $this->properties[] = $property;
    }

    /**
     * @param DTOObjectInterface $property
     * @return mixed
     */
    function fillValueByDtoObject(DTOObjectInterface $object)
    {
        /** @var PropertyInterface $item */
        foreach ($this->getIterator() as $item){
            $item->setValue($object->{$item->getName()});
        }
    }




    /**
     * @return PropertyValidatorInterface
     */
    function getValidator()
    {
       return $this->validator;
    }

    private function setValidatorToProperty(PropertyValidateInterface $property){
        $property->setValidator($this->getValidator());
    }
}