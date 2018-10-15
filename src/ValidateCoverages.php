<?php


class ValidateCoverages
{


  public function __construct() {
  }



  public function validateCoverageMileage($issueMileage, $baseMileage, $coverageMileage) {
    // if car had 12k miles with 36 month 48k base, test coverage miles must be greater than 36k miles
    // remaining on base
    // if (coverage term miles < remaining base miles) {
    //   wouldn't apply
    // }
    $message = "success";
    $remainingBaseMileage = $baseMileage - $issueMileage;
    if ($coverageMileage <= $remainingBaseMileage) {
      $message = "Miles expire before warranty";
    }
    return $message;

  }

  public function validateMaxVehicleMileage($issueMileage, $coverageMileage) {
    $message = "success";
    if ($issueMileage + $coverageMileage > 153000) {
      $message = "Maximum vehicle mileage exceeded";
    }

    return $message;
  }



  public function validateBaseWarrantyExpiration($vehicleYear, $baseWarrantyTerm, $coverageTerm) {
    // if 12 months old car, 36 month base - 24 months left on baseWarranty
    // if test coverage term is 3 months, it will expire before the 24 months is over
    // test coverage term must be greater than remaining term on base warranty for it to apply

    $currentYear = date("Y");
    $vehicleYearToMonths = ($vehicleYear < $currentYear ? ($currentYear - $vehicleYear) * 12 : 0);
    $remainingBaseTerm = $baseWarrantyTerm - $vehicleYearToMonths;
    $message = "success";
    if ($remainingBaseTerm >= $coverageTerm) {
      $message = "Term Expires before warranty";
    }
    return $message;
  }

  public function validateMaxVehicleAge($vehicleYear, $coverageTerm) {
    $currentYear = date("Y");
    $vehicleYearToMonths = ($vehicleYear < $currentYear ? ($currentYear - $vehicleYear) * 12 : 0);

    $message = "success";

    if ($coverageTerm + $vehicleYearToMonths > 147) {
      $message = "Maximum vehicle age exceeded";
    }

    return $message;
  }


}

 ?>
