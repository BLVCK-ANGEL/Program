<?php
class Distance {
public $feet;
public $inches;
public function __construct($feet, $inches) {
$this->feet = $feet;
$this->inches = $inches;
}
public function add($feet2, $inches2) {
$ft = $this->feet + $feet2;
$in = $this->inches + $inches2;
if ($in >= 12) {
$ft += floor($in / 12);
$in = $in % 12;
}
return new Distance($ft, $in);
}
public function subtract($feet2, $inches2) {
$ft = $this->feet - $feet2;
$in = $this->inches - $inches2;
if ($in < 0) {
$ft--; // Reduce a foot
$in += 12; // Add 12 inches
}
return new Distance($ft, $in);
}
public function getDistance() {
return $this->feet . " feet " . $this->inches . " inches";
}
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$feet1 = $_POST["feet1"];
$inches1 = $_POST["inches1"];
$feet2 = $_POST["feet2"];
$inches2 = $_POST["inches2"];
$distance1 = new Distance($feet1, $inches1);
$distance2 = new Distance($feet2, $inches2);
// Adding distances
$sum = $distance1->add($feet2, $inches2);
// Finding difference
$difference = $distance1->subtract($feet2, $inches2);
echo "<h2>Result</h2>";
echo "<p>Sum: " . $sum->getDistance() . "</p>";
echo "<p>Difference: " . $difference->getDistance() . "</p>";
}
?>