<?php
  include('includes/connection.php');
 header('content-type:application/json');

    $rawPostData = file_get_contents('php://input');
    $jsonData = json_decode($rawPostData);

// $actionName = $_POST["actionName"];
 
//if($actionName == "imageDisplay"){
  $searchKey = isset($_POST["searchKey"]) ? $_POST["searchKey"] : '';

  $email = $jsonData->email;
   //print_r($email);die();
  if(!empty($searchKey))
    $query = "SELECT pending_amount, approved_amount from answer where email_id='$email'";
  else
    $query = "SELECT SUM(pending_amount) AS 'pending_amount', SUM(approved_amount) AS 'approved_amount', SUM(reedem.reedem_amount) AS 'reedem_amount' from answer
    JOIN reedem ON answer.email_id = reedem.email_id AND answer.email_id = '$email'";
    
  //print_r($query);die();
  $result = mysqli_query($conn, $query);
 
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
