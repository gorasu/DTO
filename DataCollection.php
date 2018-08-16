<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 22:47
 */

namespace Gora\DTO;


/**
 * Class DataCollection
 * @package Gora\DTO
 */
class DataCollection implements DataCollectionInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * DataCollection constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param $key
     * @return bool
     */
    function isExists($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * @param $key
     * @return mixed|null
     */
    function getValue($key)
    {
        if(!$this->isExists($key)){
           return null;
        }
       return $this->data[$key];
    }

    /**
     * @param $data
     * @return $this
     */
    static function create($data)
    {
        return new Static($data);
    }
}