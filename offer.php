<?php
  $conn = mysqli_connect('localhost','root','','admin')
  or die('Error connecting to MySQL server.');
 header('content-type:application/json');

// $actionName = $_POST["actionName"];
 
//if($actionName == "imageDisplay"){
  $searchKey = isset($_POST["searchKey"]) ? $_POST["searchKey"] : '';
 
  if(!empty($searchKey))
    $query = "SELECT * FROM  offers where compain_name like '%$searchKey%' ORDER BY offers_id DESC";
  else
    $query = "SELECT * FROM  offers ORDER BY offers_id DESC";
  $result = mysqli_query($conn, $query);
 
  $rowCount = mysqli_num_rows($result);
 
  if($rowCount > 0){
    $postData = array();
      while($row = mysqli_fetch_assoc($result)){
        $postData[] = $row;
      }
      $resultData = array('status' => 'TRUE', 'postData' => $postData);
    }else{
      $resultData = array('status' => 'false', 'message' => 'No Post(s) Found...');
    }
 
    echo json_encode($resultData);
//}
?>
