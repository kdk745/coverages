<?php

include "ValidateCoverages.php";

class Vehicle
{

  public $class, $year, $mileage, $baseWarranty;

  public function __construct(string $model, int $year, int $mileage, array $baseWarranty) {
    $this->model = $model;
    $this->year = $year;
    $this->mileage = $mileage;
    $this->baseWarranty = $baseWarranty;
  }

  public function output($coverage) {
    
    $validator = new ValidateCoverages();
    $checkCoverageMileage = $validator->validateCoverageMileage($this->mileage, $this->baseWarranty["miles"], $coverage["miles"]);
    $checkMaxVehicleMileage = $validator->validateMaxVehicleMileage($this->mileage, $coverage["miles"]);
    $checkBaseWarrantyExpiration = $validator->validateBaseWarrantyExpiration($this->year, $this->baseWarranty["term"], $coverage["terms"]);
    $checkMaxVehicleAge = $validator->validateMaxVehicleAge($this->year, $coverage["terms"]);
    $checkCoverageArray = array($checkCoverageMileage, $checkMaxVehicleMileage, $checkBaseWarrantyExpiration, $checkMaxVehicleAge);
    $suffix1 = $this->getSuffix1($this->year);
    $suffix2 = $this->getSuffix2($this->mileage);
    $newUsed = $this->mileage <= intval(($this->baseWarranty)["miles"]) ? "New" : "Used";
    $outputArray = array();
    foreach($checkCoverageArray as $output)
    {
      if ($output !== "success") {
        array_push($outputArray, $output);
      }
    }
    $coverageName = $coverage["name"];
    if (sizeOf($outputArray) == 0) {
      echo "$this->model $this->year $this->mileage $newUsed $coverageName suffix1:$suffix1 suffix2:$suffix2 RESULT: SUCCESS\n";
    } else {
      echo "$this->model $this->year $this->mileage $newUsed $coverageName suffix1:$suffix1 suffix2:$suffix2 \n";
      echo "RESULT: FAILURE\n";
      print_r($outputArray);
    }
  }


  private function getSuffix1($vehicleYear) {
    $years = array(
      array("modelyear" => 2003, "suffix1" => 15),
      array("modelyear" => 2004, "suffix1" => 14),
      array("modelyear" => 2005, "suffix1" => 13),
      array("modelyear" => 2006, "suffix1" => 12),
      array("modelyear" => 2007, "suffix1" => 11),
      array("modelyear" => 2008, "suffix1" => 10),
      array("modelyear" => 2009, "suffix1" => 9),
      array("modelyear" => 2010, "suffix1" => 8),
      array("modelyear" => 2011, "suffix1" => 7),
      array("modelyear" => 2012, "suffix1" => 6),
      array("modelyear" => 2013, "suffix1" => 5),
      array("modelyear" => 2014, "suffix1" => 4),
      array("modelyear" => 2015, "suffix1" => 3),
      array("modelyear" => 2016, "suffix1" => 2),
      array("modelyear" => 2017, "suffix1" => 1),
      array("modelyear" => 2018, "suffix1" => 0),
      array("modelyear" => 2019, "suffix1" => 0)
    );

    $key = array_search(2018, array_column($years,"modelyear"));
    return sprintf('%02d', $years[$key]["suffix1"]);

  }


  private function getSuffix2($vehicleMileage) {
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

    return $suffix2;

  }




}

?>
