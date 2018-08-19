<?php

namespace Gora\DTO\Tests\DTO;

/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 19.08.2018
 * Time: 14:49
 */

use Gora\DTO\DTOObjectInterface;


class MainDto implements DTOObjectInterface
{

    /**
     * @DTO({"type":"array","apiName":"array","required":"false"})
     * @var
     */
    public $array;

    /**
     * @DTO({"type":"\\Gora\\DTO\\Tests\\DTO\\SubMainDto","apiName":"sub_main_dto","required":"false"})
     * @var
     */
    public $dtoObject;

    /**
     * @DTO({"type":"\\Gora\\DTO\\Tests\\DTO\\SubMainDto[]","apiName":"sub_main_dto_array","required":"false"})
     * @var
     */
    public $dtoObjectArray;

    /**
     * @DTO({"type":"string"})
     * @var
     */
    public $string;





    public function __construct()
    {
    }
}