<?php
$vehicleMileage = 10000;
$issue_mileage = array(
  array("min" => 0, "max" => 12000, "suffix2" => "A"),
  array("min" => 12001, "max" => 24000, "suffix2" => "A"),
  array("min" => 24001, "max" => 36000, "suffix2" => "B"),
  array("min" => 36001, "max" => 48000, "suffix2" => "C"),
  array("min" => 48001, "max" => 60000, "suffix2" => "D"),
  array("min" => 60001, "max" => 72000, "suffix2" => "E"),
  array("min" => 72001, "max" => 84000, "suffix2" => "F"),
  array("min" => 84001, "max" => 96000, "suffix2" => "G"),
  array("min" => 96001, "max" => 108000, "suffix2" => "H"),
  array("min" => 108001, "max" => 120000, "suffix2" => "I"),
  array("min" => 120001, "max" => 132000, "suffix2" => "J"),
  array("min" => 132001, "max" => 144000, "suffix2" => "K"),
  array("min" => 144001, "max" => 150000, "suffix2" => "L")
);
$suffix2;

foreach($issue_mileage as $mileage) {
  if ($vehicleMileage >= $mileage["min"] && $vehicleMileage <= $mileage["max"]) {
    $suffix2 = $mileage["suffix2"];
  }
}

echo $suffix2;


?>
