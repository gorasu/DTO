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
 
 class Data implements DTOObjectInterface
 {
     /**
      * @DTO({"type":"string"});
      * @var
      */
     public $test;
 
     /**
      * @DTO({"type":"Gora\\YandexDeliveryBundle\\Components\\YandexDeliveryApi\\DTO\\SearchDeliveryList\\Data","required":"false"});
      * @var
      */
     public $Data;
 
     public function __construct()
     {
     }
 }
 
   $annotationDriver = new AnnotationDriver();
         $mapper = new DTOCreator(Data::class,$annotationDriver);
         $object = $mapper->setDataCollection(new DataCollection([
             'Data'=>["test"=>"HELLO"]
             ,"test"=>23
 
         ]))
         
 ````