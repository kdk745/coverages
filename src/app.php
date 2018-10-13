<?php

include "Vehicle.php";

$validator = new ValidateCoverages();

echo "Vehicle to test 2018 BMW with 0 miles with base warranty of 3 months 3,000 miles\n\n";

$vehicleBMW = new Vehicle("BMW", 2018, 0, array("make" => "BMW", "term" => 3, "miles" => 3000));

echo "Testing if coverage for 3 months 3,000 miles can apply\n\n";

$vehicleBMW->output(array("name"=>"3 Months\/3,000 Miles","terms"=>"3","miles"=>"3000"));

echo "Testing if coverage for 6 months 12,000 miles can apply\n\n";

$vehicleBMW->output(array("name"=>"6 Months\/12,000 Miles","terms"=>"6","miles"=>"12000"));

echo "*************************************************************************************\n";

echo "\nVehicle to test 2016 Volkswagen with 30,000 miles with base warranty of 72 months 100,000 miles\n\n";

$vehicleVW = new Vehicle("VW", 2016, 30000, array("make" => "BMW", "term" => 72, "miles" => 100000));

echo "Testing if coverage for 100 months 120,000 miles can apply\n\n";

$vehicleVW->output(array("name"=>"100 Months\/120,000 Miles","terms"=>"100","miles"=>"120000"));

echo "Testing if coverage for 6 months 12,000 miles can apply\n\n";

$vehicleVW->output(array("name"=>"6 Months\/12,000 Miles","terms"=>"6","miles"=>"12000"));

?>
