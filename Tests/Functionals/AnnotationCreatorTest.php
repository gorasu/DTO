<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 19.08.2018
 * Time: 15:05
 */

class AnnotationCreatorTest extends PHPUnit_Framework_TestCase
{

    private $data;



    function setUp()
    {
        $this->data = [
            'array'=>[1,2,3,4]
            ,'sub_main_dto'=>['name'=>'Hello']
            ,'sub_main_dto_array'=>[['name'=>'Hello'],['name'=>'Hello2']]
            ,'string'=>'Hello'

        ];

    }


    function testDTOObject(){

        $dto = new \Gora\DTO\DTOCreator(\Gora\DTO\Tests\DTO\MainDto::class,new \Gora\DTO\Mapping\AnnotationDriver());
        $dto->setDataCollection(new \Gora\DTO\DataCollection($this->data));
        /** @var \Gora\DTO\Tests\DTO\MainDto $mainDto */
        $mainDto = $dto->createInstance();




        $this->assertEquals($this->data['array'],$mainDto->array);
        $this->assertEquals($this->data['string'],$mainDto->string);

        $this->assertInstanceOf( \Gora\DTO\Tests\DTO\SubMainDto::class,$mainDto->dtoObject);
        $this->assertEquals($this->data['sub_main_dto']['name'],$mainDto->dtoObject->name);

        /** @var \Gora\DTO\Tests\DTO\SubMainDto $item */
        foreach ($mainDto->dtoObjectArray as $key => $item){
            $this->assertInstanceOf(\Gora\DTO\Tests\DTO\SubMainDto::class, $item);

            $this->assertEquals($this->data['sub_main_dto_array'][$key]['name'],$item->name);


        }




    }

}