<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 31.08.2018
 * Time: 7:52
 */

namespace Gora\DTO\Tests\Functional;


use Gora\DTO\Converter\DTOConverter;
use Gora\DTO\DataCollection;
use Gora\DTO\DTOCreator;
use Gora\DTO\Mappings\Driver\AnnotationDriver;
use Gora\DTO\Tests\DTO\DTOExample;

class ExampleForReadMeTest extends \PHPUnit_Framework_TestCase
{


    /**
     * @dataProvider providerExample
     */
    function testExample($provider){
        $annotationDriver = new AnnotationDriver();
        $mapper = new DTOCreator(DTOExample::class,$annotationDriver);
        /** @var DTOExample $DTOExample */
         $mapper->setDataCollection(new DataCollection($provider));
        $DTOExample = $mapper->createInstance();



        $this->assertInstanceOf(DTOExample::class,$DTOExample->objectDTO);
        $this->assertInternalType('array',$DTOExample->objectDtoList);
        $this->assertEquals($provider['sting'],$DTOExample->sting);


        $convener = new DTOConverter($annotationDriver);
        $convertArray = $convener->convert($DTOExample)->toArray();
        $this->arrayHasKey('objectDTO',$convertArray);
        $this->arrayHasKey('string',$convertArray['objectDTO']);


    }

    public function providerExample()
    {

        return [
            [
              [
                  'objectDTO'=>["sting"=>"I am sting in sub object"]
                , 'objectDtoList'=>[["sting"=>"I am sting in sub object"],["sting"=>"I am sting in sub object"]]
                ,"sting"=>'I am sting'
              ]

            ]
        ];
    }


}