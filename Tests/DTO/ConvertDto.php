<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 19.08.2018
 * Time: 15:01
 */

namespace Gora\DTO\Tests\DTO;


use Gora\DTO\DTOObjectInterface;

class ConvertDto implements DTOObjectInterface
{

    /**
     * @DTO({"type":"string","apiName":"name","required":"false"})
     * @var
     */
    public $name;

    /**
     * @DTO({"type":"string","apiName":"company","required":"true"})
     * @var
     */
    public $company;
    /**
     * @DTO({"type":"\\Gora\\DTO\\Tests\\DTO\\SubMainDto[]","apiName":"sub_mains","required":"true"})
     * @var
     */
    public $subMains;

    /**
     * @DTO({"type":"\\Gora\\DTO\\Tests\\DTO\\SubMainDto","apiName":"sub_main","required":"true"})
     * @var
     */
    public $subMain;

    public function __construct()
    {
    }
}