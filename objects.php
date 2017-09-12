<?php

namespace Planes;

class Plane {
	protected $name;
	private $model;

	public function __construct($name, $model) {
		$this->name = $name;
		$this->model = $model;
	}

	public function getName() {
		return $this->name;
	}

	public function getModel() {
		return $this->model;
	}

	public static function getStats() {
		print "Welcome on board!";
	} 
}

$planes = [
	new Plane("Airbus", "A380"),
	new Plane("Cessna", "172"),
	new Plane("Boeing", "747")
];

print "<table>";

foreach($planes as $plane) {
	echo "<tr><td>".$plane->getName()."</td><td>".$plane->getModel()."</td></tr>";
}

print "</table>";

// children classes

class Airbus extends Plane {
	public function __construct($model) {
		$this->name = 'Airbus';
	}
}

$a321 = new Airbus("A321");
echo $a321->getName();