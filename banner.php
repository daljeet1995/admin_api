<?php
  // include('includes/connection.php');

   //Step1
 $conn = mysqli_connect('localhost','root','','admin')
 or die('Error connecting to MySQL server.');

   header("content-type:application/json");

   // $actionName = $_POST["actionName"];
 
   //if($actionName == "imageDisplay"){
   $seachKey = isset($_POST["seachKey"]) ? $_POST["seachKey"] : '';
  
   if(!empty($seachKey))
      $query = "Select * From  banner where banner_title like '%$seachKey%' ORDER BY banner_id DESC";
   else
      $query = "Select * From banner ORDER BY banner_id DESC";

   $result = mysqli_query($conn, $query);
   
   $rowCount = mysqli_num_rows($result);

   if($rowCount > 0){
    $postData = array();
      while($row = mysqli_fetch_assoc($result)){
        $postData[] = $row;
      }
      $resultData = array('status' => 'True', 'postData' => $postData);
    }else{
      $resultData = array('status' => 'false', 'message' => 'No Post(s) Found...');
    }
 
    echo json_encode($resultData);
   //}
   
?>