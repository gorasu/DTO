<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 31.08.2018
 * Time: 7:54
 */

namespace Gora\DTO\Tests\DTO;


use Gora\DTO\DTOObjectInterface;

class DTOExample  implements DTOObjectInterface
{
    /**
     * @DTO({"type":"string"});
     * @var
     */
    public $sting;

    /**
     * @DTO({"type":"Gora\\DTO\\Tests\\DTO\\DTOExample"});
     * @var
     */
    public $objectDTO;

    /**
     * @DTO({"type":"Gora\\DTO\\Tests\\DTO\\DTOExample[]"});
     * @var
     */
    public $objectDtoList;

    public function __construct()
    {
    }
}

