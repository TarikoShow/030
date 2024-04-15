<?php 

class Person {
  private $name;
  private $lastname;
  private $age;
  private $hp;
  private $mother;
  private $father;

  function __construct($name, $lastname, $age, $mother, $father)
  {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
    $this->hp = 100;
  }
  function sayHi($name) {
    return "Hi $name, I`m " . $this->name;
  }
  function setHp($hp) {
    if ($this->hp + $hp > 100) $this->hp = 100;
    else $this->hp = $this->hp + $hp;
  }
  function getHp() {
    return $this->hp;
  }
  function getName() {
    return $this->name;
  }
  function getLastname() {
    return $this->lastname;
  }
  function getAge() {
    return $this->age;
  }
  function getMother() {
    return $this->mother;
  }
  function getFather() {
    return $this->father;
  }
  function getInfo() {
    return "
      <h2>Несколько слов о моих родственниках: </h2><br>" . "Меня зовут - " . $this->getName() . "<br>Моя фамилия - " . $this->getLastname() . "<br>Мой возраст - " . $this->getAge() . " лет" . "<br>Мою маму зовут - " . $this->getMother() . "<br>Ее фамилия - " . $this->getMother()->getLastname() . "<br>Ее возраст - " . $this->getMother()->getAge() . " лет" . "<br>Ее маму зовут - " . $this->getMother()->getMother()->getName() . "<br>Ее фамилия - " . $this->getMother()->getMother()->getLastname() . "<br>Ее возраст - " . $this->getMother()->getMother()->getAge() . " лет" . "<br>Ее папу зовут - "$this->getMother()->getFather()->getName() . "<br>Его фамилия - " . $this->getMother()->getFather()->getLastname() . "<br>Его возраст - " . $this->getMother()->getFather()->getAge() . " лет" . "<br>Моего папу зовут - " . $this->getFather() . "<br>Его фамилия - " . $this->getFather()->getLastname() . "<br>Его возраст - " . $this->getFather()->getAge() . " лет" . "<br>Его маму зовут - " . $this->getFather()->getMother()->getName() . "<br>Ее фамилия - " . $this->getFather()->getMother()->getLastname() . "<br>Ее возраст - " . $this->getFather()->getMother()->getAge() . " лет" . "<br>Его папу зовут - "$this->getFather()->getFather()->getName() . "<br>Его фамилия - " . $this->getFather()->getFather()->getLastname() . "<br>Его возраст - " . $this->getFather()->getFather()->getAge() . " лет";
  }
}

$vera = new Person("Vera", "Ivanova", 70, null, null);
$maksim = new Person("Maksim", "Ivanov", 70, null, null);

$igor = new Person("Igor", "Petrov", 68, null, null);
$irina = new Person("Irina", "Petrova", 60, null, null);

$alex = new Person("Alex", "Ivanov", 32, $vera, $maksim);
$olga = new Person("Olga", "Ivanova", 30, $irina, $igor);

$valera = new Person("valera", "Ivanov", 7, $olga, $alex);

// echo $valera->getMother()->getFather()->getName();

echo $valera->getInfo();


//Здоровье не может быть больше 100

// $alex->setHp(-30); //упал

// $medKit = 50;

// echo $alex->getHp() . "<br>";

// $alex->setHp($medKit); //нашел аптечку

// echo $alex->getHp();


//echo $alex->sayHi($igor->name);


// $alex = new Person();
// $alex->name = "Alex";
// echo $alex->name;