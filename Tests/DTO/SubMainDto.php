<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 19.08.2018
 * Time: 15:01
 */

namespace Gora\DTO\Tests\DTO;


use Gora\DTO\DTOObjectInterface;

class SubMainDto implements DTOObjectInterface
{

    /**
     * @DTO({"type":"sting","apiName":"name"})
     * @var
     */
    public $name;

    public function __construct()
    {
    }
}