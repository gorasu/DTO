<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 16:59
 */

namespace Gora\DTO\Exception;

use Gora\DTO\Mappings\Property\PropertyInterface;
use Throwable;

class PropertyValidateTypeException extends  \Exception
{

    function __construct(PropertyInterface $property, $code = 0, Throwable $previous = null)
    {
        $message = $property->getName() .'('.$property->getValue().') must be '. $property->getType()->getType().' type';


        parent::__construct($message, $code, $previous);
    }

}