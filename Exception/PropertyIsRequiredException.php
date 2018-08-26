<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 23.08.2018
 * Time: 22:47
 */

namespace Gora\DTO\Exception;


use Gora\DTO\Mappings\Property\PropertyInterface;
use Throwable;

class PropertyIsRequiredException extends  \Exception
{
    function __construct(PropertyInterface $property, $code = 0, Throwable $previous = null)
    {
        $message = $property->getName() .' обязательно для заполнения ';
        parent::__construct($message, $code, $previous);
    }

}