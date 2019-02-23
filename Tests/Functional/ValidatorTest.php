<?php

namespace Gora\DTO\Tests\Functional;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{

    private $data;

    /**
     *
     */
    function setUp()
    {
        $this->data = [
            'array'=>[1,2,3,4]
            ,'string'=>1

        ];

    }


    /**
     * Что бы можно было проверить что данные указанные как число
     * корректно распознаются для поля которое ожидает данные в
     * строковом формате
     * @throws \Exception
     */
    function testValidateValueType(){

        $dto = new \Gora\DTO\DTOCreator(\Gora\DTO\Tests\DTO\MainDto::class,new \Gora\DTO\Mappings\Driver\AnnotationDriver());
        $dto->setDataCollection(new \Gora\DTO\DataCollection($this->data));
        /** @var \Gora\DTO\Tests\DTO\MainDto $mainDto */
        $mainDto = $dto->createInstance();

        $this->assertEquals($this->data['string'],$mainDto->string);





    }




}
