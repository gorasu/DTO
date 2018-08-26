<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 26.08.2018
 * Time: 16:10
 */

namespace Gora\DTO\Mappings\Property;


interface PropertyDataInterface
{

    function getType();
    function getApiName();
    function getRequired();

}