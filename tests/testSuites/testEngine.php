<?php
namespace test;
class TestEngine
{

  public function jsonFileToArray($fileName) {
    // Read JSON file
    $json = file_get_contents("./tests/resources/$fileName");

    //Decode JSON
    $json_data = json_decode($json,true);

    //return data
    return $json_data;
  }

  public function print() {
    echo "testing";
  }

  public function __construct() {

  }

}

?>
