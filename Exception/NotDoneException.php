<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 23.08.2018
 * Time: 23:00
 */

namespace Gora\DTO\Exception;


use Throwable;

class NotDoneException extends \Exception
{
    function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = "Функционал не реализован ".$message;
        parent::__construct($message, $code, $previous);
    }

}