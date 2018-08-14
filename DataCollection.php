<?php
/**
 * Created by PhpStorm.
 * User: voroninaleksandr
 * Date: 13.08.2018
 * Time: 22:47
 */

namespace Gora\DTO;


class DataCollection implements DataCollectionInterface
{
    private $data;

    /**
     * DataCollection constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    function isExists($key)
    {
        return isset($this->data[$key]);
    }

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