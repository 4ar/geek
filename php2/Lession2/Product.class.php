<?php
/*

1. Создать структуру классов ведения товарной номенклатуры.
а) Есть абстрактный товар.
б) Есть цифровой товар, штучный физический товар и товар на вес.
в) У каждого есть метод подсчета финальной стоимости.
г) У цифрового товара стоимость постоянная – дешевле штучного товара в два раза. У штучного товара обычная стоимость, у весового – в зависимости от продаваемого количества в килограммах. У всех формируется в конечном итоге доход с продаж.
д) Что можно вынести в абстрактный класс, наследование?


*/

abstract class Products {
    // Название товара
    private $name;
    // Закупочная цена
    private $baseprice;
    
    public function setName($name) {
        $this->name = $name;
    }
    public function setBasePrice($baseprice) {
        $this->baseprice = $baseprice;
    }

    public function getName() {
        return $this->name;
    }
    public function getBasePrice() {
        return $this->baseprice;
    }


    public function __construct($name, $baseprice){
        $this->setName($name);
        $this->setBasePrice($baseprice); 
    }

    //расчет стомость товара
    abstract public function shopPrice();

    //расчет стомость заказа
    abstract public function shopResult();

    //Доход с продажи товара 
    abstract public function profit();
 
}

class Product extends Products {
    // Кол-во приобретаемого товара
    private $count;

    // Процент нацеки 
    private $plusPrice = 25;

    public function setCount($count) {
        $this->count = $count;
    }

    public function getCount() {
        return $this->count;
    }

    public function __construct($name, $baseprice, $count){
        parent::__construct($name, $baseprice);
        $this->setCount($count);
    }

    public function shopPrice() {
        $res = $this->getBasePrice() + ($this->getBasePrice() * $this->plusPrice / 100 );
        return $res;
    }

    public function shopResult() {
        $res = $this->shopPrice() * $this->getCount();
        return $res;
    }

    public function profit() {
        $res = $this->shopResult() - ($this->getBasePrice() * $this->getCount());
        return $res;
    }
}



class Digital extends Product {



}


class WeightGoods extends Product {
    public function shopPrice() {
        return 1;
    }

    public function shopResult() {
        return 1;
    }

    public function profit() {
        return 1;
    }

}

$prod = new Product("Моя книга", 500, 4);
echo "Наименование товара: " . $prod->getName() . "<br>";
echo "Кол-во в заказе: " . $prod->getCount() . " шт.<br>";
echo "Закупочная стоимость товара: " . $prod->getBasePrice() . " р.<br>";
echo "Розничная стоимость товара: " . $prod->shopPrice() . " р.<br>";
echo "Итоговая стоимость заказа: " . $prod->shopResult() . " р.<br>";
echo "Чистая прибыль: " . $prod->profit() . " р.<br>";



//$dig->get();


