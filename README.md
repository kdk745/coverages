### PHP Challenge
#### Purpose
* Test a developers ability to create a class along with supporting methods.
* Test a developers ability to create unit tests to validate each methods logic.

#### Getting started
* Clone project into terminal via "git clone {project Url}" command
* Enter project with "cd coverages" command
* "composer install" command and then enter
* "source activate .bash_profile" command to activate phpunit command
* "phpunit --colors tests" to activate unit tests
* "php src/app.php" to activate example vehicles and test coverages

#### Description of project
* src directory
 * app.php - the example app to output example vehicles and coverages being validated
 * ValidateCoverages.php - business logic to validate a coverage for a given vehicle
 * Vehicle.php - creates a vehicle object and outputs a result for a coverage being validated

* tests directory
 * resouces directory contains json files with test data
 * testSuites directory
  * testEngine.php - a file for common methods used in test
  * VehiceCoveragesTest.php - uses PHPUnit to test methods created in src/ValidateCoverages.php
