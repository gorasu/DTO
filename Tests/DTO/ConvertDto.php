<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 19.08.2018
 * Time: 15:01
 */

namespace Gora\DTO\Tests\DTO;


use Gora\DTO\Converter\DTOConverter;

class ConvertDto extends AbstractDTO
{

    /**
     * @DTO({"type":"string","apiName":"name","required":"false"})
     * @var
     */
    public $name;


    public function __construct()
    {
    }
}