@todo Реализовать заливку приватных свойств в объект DTO




"required":"true"

/**
 * @DTO({
 
 
 "type":"string|class name" - тип переменной если указан существующий класс включая namespace то переменная будет содержать DTO экземпляр этого класса
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
         $mapper = new Mapping(Data::class,$annotationDriver);
         $object = $mapper->setDataCollection(new DataCollection([
             'Data'=>["test"=>"HELLO"]
             ,"test"=>23
 
         ]))
         
 ````