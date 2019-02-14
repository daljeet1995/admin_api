<?php
  $conn = mysqli_connect('localhost','root','','admin')
 or die('Error connecting to MySQL server.');

   header("content-type:application/json");
    $rawPostData = file_get_contents('php://input');
    $jsonData = json_decode($rawPostData);

   // $actionName = $_POST["actionName"];
 
   //if($actionName == "imageDisplay"){
   $seachKey = isset($_POST["seachKey"]) ? $_POST["seachKey"] : '';
   
   $compain_id = $jsonData->home_id;
  
   if(!empty($seachKey))
      $query = "Select * From  task where task1 like '%$seachKey%' ORDER BY task_id DESC";
   else
      $query = "Select * From task where compain_name= $compain_id ORDER BY task_id DESC LIMIT 1";

     // print_r($query);die();

   $result = mysqli_query($conn, $query);
   
   $rowCount = mysqli_num_rows($result);

   // Same query run on second time with anoter variable 
   $result1 = mysqli_query($conn, $query);
   
   $rowCount = mysqli_num_rows($result1);

   if($rowCount > 0){
    $postData = array();
    $row = mysqli_fetch_assoc($result);
        $compain_name = $row['compain_name'];
        $task1 = $row['task1'];
        $task1_sub_heading1 = $row['task1_sub_heading1'];
        $task1_sub_heading2 = $row['task1_sub_heading2'];
        $task2	 = $row['task2'];
        $task2_sub_heading1 = $row['task2_sub_heading1'];
        $task2_sub_heading2 = $row['task2_sub_heading2'];
        $task3	 = $row['task3'];
        $link	 = $row['link'];

      while($row = mysqli_fetch_assoc($result1)){
       // $postData[] = $row;
        $postData[] = explode(',',$row['guidelines']);

      }
      $resultData = array('status' => 'True' ,'compain_name' => $compain_name, 'task1' => $task1, 'task1_sub_heading1' => $task1_sub_heading1, 'task1_sub_heading2' => $task1_sub_heading2,
      'task2' => $task2,'task2_sub_heading1' => $task2_sub_heading1,'task2_sub_heading2' => $task2_sub_heading2,'task3' => $task3,
      'link' => $link,'guidelines' => $postData );
    }else{
      $resultData = array('status' => 'false', 'message' => 'No Post(s) Found...');
    }
 
    echo json_encode($resultData);
   //}
   
?>