<?php

abstract class Products {

// Название товара
private $name;

// Процент нацеки 
private $plusPrice = 25;

// Закупочная цена
private $baseprice = 500;

// Кол-во приобретаемого товара
private $count;

// Seter Названия товара 
public function setName($name) {
    $this->name = $name;
}
// Getter Названия товара 
public function getName() {
    return $this->name;
}

// Seter процента нацеки  
public function setplusPrice($plusPrice) {
    $this->plusPrice = $plusPrice;
}
// Getter процента нацеки 
public function getplusPrice() {
    return $this->plusPrice;
}

// Seter закупочный цены 
public function setBasePrice($baseprice) {
    $this->baseprice = $baseprice;
}
// Getter закупочный цены 
public function getBasePrice() {
    return $this->baseprice;
}

// Seter кол-ва приобретаемого товара
public function setCount($count) {
    $this->count = $count;
}
// Seter кол-ва приобретаемого товара
public function getCount() {
    return $this->count;
}

    public function __construct($name){
        $this->setName($name);
        
    }

    //расчет стомость товара
    abstract public function shopPrice();

    //расчет стомость заказа
    abstract public function shopResult();

    //Доход с продажи товара 
    abstract public function profit();
 
}

class Product extends Products {
   
   
    public function __construct($name, $count){
        parent::__construct($name);
        $this->setCount($count);
       }

    public function shopPrice() {
        $res = $this->getBasePrice() + ($this->getBasePrice() * $this->getplusPrice() / 100 );
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

    public function shopDigitalBasePrice() {
        $res = $this->getBasePrice() / 2;
        return $res;
    }

    public function shopPrice() {
        $res = $this->shopDigitalBasePrice() + ($this->shopDigitalBasePrice() * $this->getplusPrice() / 100 );
        return $res;
    }

    public function profit() {
        $res = $this->shopResult() - ($this->shopDigitalBasePrice() * $this->getCount());
        return $res;
    }

  
}


class WeightGoods extends Products {

    public function __construct($name, $baseprice, $count, $plusPrice){
        parent::__construct($name);
        $this->setCount($count);
        $this->setBasePrice($baseprice);
        $this->setplusPrice($plusPrice);
       }

    public function shopPrice() {
        $res = $this->getBasePrice() + ($this->getBasePrice() * $this->getplusPrice() / 100 );
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

echo "<h1>Штучный товар</h1><br>";

$prod = new Product("Моя книга", 4);
echo "Наименование товара: " . $prod->getName() . "<br>";
echo "Кол-во в заказе: " . $prod->getCount() . " шт.<br>";
echo "Закупочная стоимость товара: " . $prod->getBasePrice() . " р.<br>";
echo "Розничная стоимость товара: " . $prod->shopPrice() . " р.<br>";
echo "Итоговая стоимость заказа: " . $prod->shopResult() . " р.<br>";
echo "Чистая прибыль: " . $prod->profit() . " р.<br>";

echo "<h1>Цифровой товар </h1><br>";

$prod1 = new Digital("Моя электроная книга",  2); ;
echo "Наименование товара: " . $prod1->getName() . "<br>";
echo "Кол-во в заказе: " . $prod1->getCount() . " шт.<br>";
echo "Закупочная стоимость товара: " . $prod1->shopDigitalBasePrice() . " р.<br>";
echo "Розничная стоимость товара: " . $prod1->shopPrice() . " р.<br>";
echo "Итоговая стоимость заказа: " . $prod1->shopResult() . " р.<br>";
echo "Чистая прибыль: " . $prod1->profit() . " р.<br>";

echo "<h1>Товар  на вес</h1><br>";

$prod2 = new WeightGoods("Мука", 65 ,10, 100);
echo "Наименование товара: " . $prod2->getName() . "<br>";
echo "Кол-во в заказе: " . $prod2->getCount() . " кг.<br>";
echo "Закупочная стоимость товара: " . $prod2->getBasePrice() . " р.<br>";
echo "Розничная стоимость товара: " . $prod2->shopPrice() . " р.<br>";
echo "Итоговая стоимость заказа: " . $prod2->shopResult() . " р.<br>";
echo "Чистая прибыль: " . $prod2->profit() . " р.<br>";






