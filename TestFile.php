<?php

require 'ObjectHandler.php';


class User
{

	private $name;
	private $age;

	function __construct($name, $age)
	{
		$this->name = $name;
		$this->age = $age;
	}

	function getName()
	{
		return $this->name;
	}

	function isAdult()
	{
		return $this->age >= 18 ? "an Adult" : "Not an Adult";
	}

	public function __toString()
	{
		return (string) $this->name . (string) $this->age;
	}
}

$h = new User("Ali", 15);

$i = new User("Khaled", 22);

$j = new User("Mohammad", 27);

$k = new User("Anas", 19);

$l = new User("Ahmad", 26);

$m = new User("saif", 18);

//$o = new ObjectHandler();
ObjectHandler::save($h);
ObjectHandler::save($i);
ObjectHandler::save($j);
ObjectHandler::save($k);
ObjectHandler::save($l);
ObjectHandler::save("ahmad");
ObjectHandler::save(15);
ObjectHandler::save($m);


echo ObjectHandler::find(2) . '<br>';
echo ObjectHandler::find(7) . '<br>';
echo ObjectHandler::find(12) . '<br>';
echo ObjectHandler::find(1) . '<br>';
