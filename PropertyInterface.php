<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:45
 */

namespace Gora\DTO;


interface PropertyInterface
{
    function getType();
    function getName();
    function getApiName();
    function isRequired();
    function setValue($value);
    function getValue();

}