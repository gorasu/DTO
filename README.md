@todo реализовать MappingDriver через файлы конфигурации 
@todo Реализовать заливку приватных свойств в объект DTO
@todo Написать тест на получение свойств с использованием интерфейса/родительских классов
@todo Реализвоать валидацию свойств на основе переданных типов
@todo Сделать конвертицию из сущностей в DTO и обратно
@todo type скоератить до названия класса, не выводить полный namespace
@todo заливу \Gora\DTO\Property::__construct сделать на основе передаваемого объекта с данными свйоства


"required":"true"

/**
 * @DTO({
 
 
 "type":"string|class name| class name[]" - тип переменной если указан существующий класс включая namespace то переменная будет содержать DTO экземпляр этого класса
 "required":"true|false" - обязательное ли поле для заполнения 
 "apiName":"string" - имя поля в API 
  
 });
 * @var
 */
 
 
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
         $mapper = new Mappings(Data::class,$annotationDriver);
         $object = $mapper->setDataCollection(new DataCollection([
             'Data'=>["test"=>"HELLO"]
             ,"test"=>23
 
         ]))
         
 ````
 
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