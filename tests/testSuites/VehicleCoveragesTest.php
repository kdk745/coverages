<?php

include "testEngine.php";
use PHPUnit\Framework\TestCase;

final class VehicleCoveragesTest extends TestCase
{

  private $testYears;
  private $testBaseWarranties;
  private $testCoverages;
  private $classes;

  public function testValidateCoverageMileage() {
    // initialize validator
    $validator = $this->prophesize(ValidateCoverages::class);

    // test vars
    $coveragesToTest = test\TestEngine::jsonFileToArray("Coverages.json");
    $mileagesToTestBMW = test\TestEngine::jsonFileToArray("BMWCoverageMileagesToTest.json");
    $mileagesToTestVW = test\TestEngine::jsonFileToArray("VWCoverageMileagesToTest.json");
    $baseWarranties = test\TestEngine::jsonFileToArray("BaseWarranties.json");

    $BMWBaseWarranty = $baseWarranties[0];
    $VWBaseWarranty = $baseWarranties[1];
    // $vehicle = new Vehicle("BMW", 2018, 23000, array("make" => "BMW", "term" => 36, "miles" => 48000));
    // loop through years and base warranties and test against coverages
    foreach($mileagesToTestBMW as $mileage) {
      $expectedArray = $mileage["expected"];

      foreach($coveragesToTest as $key => $coverage) {

        $validator->validateCoverageMileage(intval($mileage["issueMileage"]), intval($BMWBaseWarranty["term"]), intval($coverage["terms"]))->shouldBeCalled()->willReturn($expectedArray[$key]);
        $response = $validator->reveal()->validateCoverageMileage(intval($mileage["issueMileage"]), intval($BMWBaseWarranty["term"]), intval($coverage["terms"]));
        $this->assertEquals($expectedArray[$key], $response);
      }
    }

    foreach($mileagesToTestVW as $mileage) {
      $expectedArray = $mileage["expected"];

      foreach($coveragesToTest as $key => $coverage) {

        $validator->validateCoverageMileage(intval($mileage["issueMileage"]), intval($VWBaseWarranty["term"]), intval($coverage["terms"]))->shouldBeCalled()->willReturn($expectedArray[$key]);
        $response = $validator->reveal()->validateCoverageMileage(intval($mileage["issueMileage"]), intval($VWBaseWarranty["term"]), intval($coverage["terms"]));
        $this->assertEquals($expectedArray[$key], $response);
      }
    }


  }

  public function testValidateMaxVehicleMileage()
  {
    // initialize validator
    $validator = $this->prophesize(ValidateCoverages::class);

    // test vars
    $coveragesToTest = test\TestEngine::jsonFileToArray("Coverages.json");
    $mileagesToTest = test\TestEngine::jsonFileToArray("MaxMileagesToTest.json");
    // $vehicle = new Vehicle("BMW", 2018, 23000, array("make" => "BMW", "term" => 36, "miles" => 48000));
    // loop through years and base warranties and test against coverages
    foreach($mileagesToTest as $mileage) {
      $expectedArray = $mileage["expected"];
      foreach($coveragesToTest as $key => $coverage) {
        $validator->validateMaxVehicleMileage(intval($mileage["issueMileage"]), intval($coverage["terms"]))->shouldBeCalled()->willReturn($expectedArray[$key]);
        $response = $validator->reveal()->validateMaxVehicleMileage(intval($mileage["issueMileage"]), intval($coverage["terms"]));
        $this->assertEquals($expectedArray[$key], $response);
      }
    }
  }



  public function testValidateBaseWarrantyExpiration()
  {
    // initialize validator
    $validator = $this->prophesize(ValidateCoverages::class);

    // test vars
    $coveragesToTest = test\TestEngine::jsonFileToArray("Coverages.json");
    $yearsToTestBMW = test\TestEngine::jsonFileToArray("BMWYearsToTest.json");
    $yearsToTestVW = test\TestEngine::jsonFileToArray("VWYearsToTest.json");
    $baseWarranties = test\TestEngine::jsonFileToArray("BaseWarranties.json");

    $BMWBaseWarranty = $baseWarranties[0];
    $VWBaseWarranty = $baseWarranties[1];
    // $vehicle = new Vehicle("BMW", 2018, 23000, array("make" => "BMW", "term" => 36, "miles" => 48000));
    // loop through years and base warranties and test against coverages
    foreach($yearsToTestBMW as $year) {
      $expectedArray = $year["expected"];

      foreach($coveragesToTest as $key => $coverage) {

        $validator->validateBaseWarrantyExpiration(intval($year["modelyear"]), intval($BMWBaseWarranty["term"]), intval($coverage["terms"]))->shouldBeCalled()->willReturn($expectedArray[$key]);
        $response = $validator->reveal()->validateBaseWarrantyExpiration(intval($year["modelyear"]), intval($BMWBaseWarranty["term"]), intval($coverage["terms"]));
        $this->assertEquals($expectedArray[$key], $response);
      }
    }

    foreach($yearsToTestVW as $year) {
      $expectedArray = $year["expected"];

      foreach($coveragesToTest as $key => $coverage) {

        $validator->validateBaseWarrantyExpiration(intval($year["modelyear"]), intval($VWBaseWarranty["term"]), intval($coverage["terms"]))->shouldBeCalled()->willReturn($expectedArray[$key]);
        $response = $validator->reveal()->validateBaseWarrantyExpiration(intval($year["modelyear"]), intval($VWBaseWarranty["term"]), intval($coverage["terms"]));
        $this->assertEquals($expectedArray[$key], $response);
      }
    }
  }

  /*
    Validate if
  */
  public function testValidateMaxVehicleAge()
  {

    // initialize validator
    $validator = $this->prophesize(ValidateCoverages::class);

    // test vars
    $coveragesToTest = test\TestEngine::jsonFileToArray("Coverages.json");
    $yearsToTest = test\TestEngine::jsonFileToArray("MaxYearsToTest.json");
    // $vehicle = new Vehicle("BMW", 2018, 23000, array("make" => "BMW", "term" => 36, "miles" => 48000));
    // loop through years and base warranties and test against coverages
    foreach($yearsToTest as $year) {
      $expectedArray = $year["expected"];
      foreach($coveragesToTest as $key => $coverage) {
        $validator->validateMaxVehicleAge(intval($year["modelyear"]), intval($coverage["terms"]))->shouldBeCalled()->willReturn($expectedArray[$key]);
        $response = $validator->reveal()->validateMaxVehicleAge(intval($year["modelyear"]), intval($coverage["terms"]));
        $this->assertEquals($expectedArray[$key], $response);
      }
    }
  }

}

?>
