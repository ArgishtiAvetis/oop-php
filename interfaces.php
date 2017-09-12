<?php

interface Aircraft{
	function getName();
	function fly();
}

class Airplane implements Aircraft {
	private $name = 'Airbus A380';

	public function getName() {
		return $this->name;
	}
	public function fly() {
		echo "I am flying!";
	}
}

$myPlane = new Airplane();
echo $myPlane->getName();