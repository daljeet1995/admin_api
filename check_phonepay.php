<?php
  include('includes/connection.php');
 header('content-type:application/json');

    $rawPostData = file_get_contents('php://input');
    $jsonData = json_decode($rawPostData);

// $actionName = $_POST["actionName"];
 
//if($actionName == "imageDisplay"){
  $searchKey = isset($_POST["searchKey"]) ? $_POST["searchKey"] : '';

  $email = $jsonData->email;
   print_r($email);die();
  if(!empty($searchKey))
    $query = "(SELECT * FROM  home_section where compain_name like '%$searchKey%') union (select pending from answer where email_id = '$emailid_ex') ORDER BY home_section_id DESC";
  else
    $query = "SELECT * from phonepay where email='$email'";

    //print_r($query);die();
  $result = mysqli_query($conn, $query);
 
  $rowCount = mysqli_num_rows($result);
 
  if($rowCount > 0){
    $postData = array();
      while($row = mysqli_fetch_assoc($result)){
        $postData[] = $row;
      }
      $resultData = array('status' => 'TRUE', 'check_phonepay' => $postData);
    }else{
      $resultData = array('status' => 'false', 'message' => 'No Post(s) Found...');
    }
 
    echo json_encode($resultData);
//}
?>
