<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 23.08.2018
 * Time: 22:54
 */

namespace Gora\DTO\Tests\Functionals;

use Gora\DTO\Mapping\AnnotationDriver;
use Gora\DTO\Converter\DTOConverter;
use Gora\DTO\Tests\DTO\ConvertDto;

class DTOConverterTest extends \PHPUnit_Framework_TestCase
{

    private $dto;
    function setUp()
    {
        $this->dto = new ConvertDto();
        $this->dto->name = "Имя";
        $this->dto->company = "Компания";

    }

    public function testConvertToArray()
    {

        $converter = new DTOConverter(new AnnotationDriver());
        $result = $converter->convert($this->dto)->toArray();
        $this->assertInternalType('array',$result);
        $this->assertArrayHasKey('name',$result);
        $this->assertArrayHasKey('company',$result);
        $this->assertEquals($this->dto->name, $result['name']);
        $this->assertEquals($this->dto->company, $result['company']);

    }
}
