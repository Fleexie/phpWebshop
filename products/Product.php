<?php
class Product
{
    //Private properties
    private $_name;
    private $_price;
    private $_imgPath;

    public function __construct($name, $price, $imgPath)
    {
        $this->_name = $name;
        $this->_price = $price;
        $this->_imgPath = $imgPath;
    }

    public function getProduct()
    {
        return [
            $this->_name,
            $this->_price,
            $this->_imgPath
        ];
    }

}
