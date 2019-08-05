<?php
// Create connection
	$con=mysqli_connect("localhost","hf79csgsn2da","Sk@2991993","oauth"); // localhost, user name, user password, database name

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$query = "select * from post";
$result = mysqli_query($con,$query);
$books= array();
while($row = mysqli_fetch_array($result))
{
    $id = $row['id'];
    $title = $row['title'];
    $description = $row['description'];
    $idtoken = $row['idtoken'];
   
    $post = array('id'=>$id,'title'=>$title,'description'=>$description,'idtoken'=>$idtoken);
    array_push($books,$post);
}

$con->close();
$json = array("posts"=>$books);
echo json_encode($json);
?>