<?php

abstract class Airplane {
	public $name;

	public function __construct($name) {
		$this->name = $name;
	}

	abstract public function getName();
}

class Airbus extends Airplane {
	public function __construct($name) {
		parent::__construct($name);
	}
	public function getName() {
		return $this->name;
	}
	public static function getStats() {
		echo "Heeeeeey";
	}
}

echo Airbus::getStats();

