<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 21:38
 */

namespace Gora\DTO;

interface DataCollectionInterface
{

    function __construct($data);
    function isExists($key);
    function getValue($key);

}