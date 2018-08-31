@todo реализовать MappingDriver через файлы конфигурации 
@todo Реализовать заливку приватных свойств в объект DTO
@todo Сделать конвертицию из сущностей в DTO и обратно
@todo аннотацию type сократить до названия класса, не выводить полный namespace


"required":"true"

/**
 * @DTO({
 
 
 "type":"string|class name| class name[]" - тип переменной если указан существующий класс включая namespace то переменная будет содержать DTO экземпляр этого класса
 "required":"true|false" - обязательное ли поле для заполнения 
 "apiName":"string" - имя поля в API 
  
 });
 * @var
 */
 
 
  Описание каталогов
  * Converter/ - конвертор из DTO в другие даные
  * Exception/ - исключения
  * Mappings/ - 
    * Driver/ -  драйвера для маппинга
    * Property/ - свойства, которые формируются на основе данных маппинга
  * Tests/  
    * DTO/  - классы DTOObject для тестирования 
    * Functional/ - функциональные тесты
  * vendor/
 
 
 Прмиер работы кода
 ````


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
$provider =   array (
                'objectDTO' => 
                
                array (
                  'sting' => 'I am sting in sub object',
                ),
                
                'objectDtoList' => 
                array (
                  0 => 
                  array (
                    'sting' => 'I am sting in sub object',
                  ),
                  1 => 
                  array (
                    'sting' => 'I am sting in sub object',
                  ),
                ),
                'sting' => 'I am sting',
              )


      $annotationDriver = new AnnotationDriver();
        $mapper = new DTOCreator(DTOExample::class,$annotationDriver);
        /** @var DTOExample $DTOExample */
         $mapper->setDataCollection(new DataCollection($provider));
        $DTOExample = $mapper->createInstance();
        
         
         
    print_r($DTOExample);
    
    Gora\DTO\Tests\DTO\DTOExample Object
    (
        [sting] => I am sting
        [objectDTO] => Gora\DTO\Tests\DTO\DTOExample Object
            (
                [sting] => I am sting in sub object
                [objectDTO] => 
                [objectDtoList] => 
            )
    
        [objectDtoList] => Array
            (
                [0] => Gora\DTO\Tests\DTO\DTOExample Object
                    (
                        [sting] => I am sting in sub object
                        [objectDTO] => 
                        [objectDtoList] => 
                    )
    
                [1] => Gora\DTO\Tests\DTO\DTOExample Object
                    (
                        [sting] => I am sting in sub object
                        [objectDTO] => 
                        [objectDtoList] => 
                    )
    
            )
    
    )

    
    
    $convener = new DTOConverter($annotationDriver);
    $convertArray = $convener->convert($DTOExample)->toArray();
    Array
    (
        [sting] => I am sting
        [objectDTO] => Array
            (
                [sting] => I am sting in sub object
                [objectDTO] => 
                [objectDtoList] => 
            )
    
        [objectDtoList] => Array
            (
                [0] => Array
                    (
                        [sting] => I am sting in sub object
                        [objectDTO] => 
                        [objectDtoList] => 
                    )
    
                [1] => Array
                    (
                        [sting] => I am sting in sub object
                        [objectDTO] => 
                        [objectDtoList] => 
                    )
    
            )
    
    )


     
         
         
 ````