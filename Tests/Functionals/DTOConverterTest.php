<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 23.08.2018
 * Time: 22:54
 */

namespace Gora\DTO\Tests\Functionals;

use Gora\DTO\Mappings\Driver\AnnotationDriver;
use Gora\DTO\Converter\DTOConverter;
use Gora\DTO\Tests\DTO\ConvertDto;
use Gora\DTO\Tests\DTO\SubMainDto;

class DTOConverterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ConvertDto
     */
    private $dto;
    function setUp()
    {


        $this->dto = new ConvertDto();
        $this->dto->name = "Имя";
        $this->dto->company = "Компания";

        $subMain =  new SubMainDto();
        $subMain->name = "Объект-1";

        $subMain2 =  new SubMainDto();
        $subMain2->name = "Объект-2";

        $this->dto->subMain[] =  $subMain;
        $this->dto->subMain[] =  $subMain2;


    }

    public function testConvertToArrayWithAddObject()
    {

        $converter = new DTOConverter(new AnnotationDriver());
        $result = $converter->convert($this->dto)->toArray();
        $this->assertInternalType('array',$result);
        $this->assertArrayHasKey('name',$result);
        $this->assertArrayHasKey('company',$result);
        $this->assertEquals($this->dto->name, $result['name']);
        $this->assertEquals($this->dto->company, $result['company']);


        $this->assertInternalType('array',$result['sub_main']);
        foreach ($result['sub_main'] as $key => $subMain) {
            $this->assertArrayHasKey('name', $subMain);
            $this->assertEquals($this->dto->subMain[$key]['name'], $subMain['name']);
        }

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
