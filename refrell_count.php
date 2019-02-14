<?php
  include('includes/connection.php');
  $con = mysqli_connect('localhost','root','','app')
   or die('Error connecting to MySQL server.');
 header('content-type:application/json');

    $rawPostData = file_get_contents('php://input');
    $jsonData = json_decode($rawPostData);

// $actionName = $_POST["actionName"];
 
//if($actionName == "imageDisplay"){
  $searchKey = isset($_POST["searchKey"]) ? $_POST["searchKey"] : '';

 // $email = $jsonData->email;
  $refrel = $jsonData->user_refrel;
   //print_r($email);die();
  if(!empty($searchKey))
    $query = "SELECT pending_amount, approved_amount from answer where email_id='$email'";
  else
    $query = "SELECT COUNT(referalcode) AS 'count_referal_code' from users
    where referalcode = '$refrel'";
    
  //print_r($query);die();
  $result = mysqli_query($con, $query);
 
  $rowCount = mysqli_num_rows($result);
 
  if($rowCount > 0){
    $postData = array();
      while($row = mysqli_fetch_assoc($result)){
        $postData[] = $row;
      }
      $resultData = array('status' => 'TRUE', 'payment_status' => $postData);
    }else{
      $resultData = array('status' => 'false', 'message' => 'No Post(s) Found...');
    }
 
    echo json_encode($resultData);
//}
?>
