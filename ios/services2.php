<?php

//including the file dboperation
 require_once 'DbOperation.php';

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//creating a response array to store data
$response = array();

//creating a key in the response array to insert values
//this key will store an array iteself
$response['example_table'] = array();

//creating object of class DbOperation
$db = new DbOperation();

//getting the teams using the function we created
$example_tables = $db->getAllTeams();

//looping through all the teams.
while($example_table = $example_tables->fetch_assoc()){
    //creating a temporary array
    $temp = array();

    //inserting the team in the temporary array
    $temp['id'] = $example_table['id'];
    $temp['item1']=$example_table['item1'];
    $temp['item2']=$example_table['item2'];

    //inserting the temporary array inside response
    array_push($response['example_table'],$temp);
}

//displaying the array in json format
echo json_encode($response);

?>
