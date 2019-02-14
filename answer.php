<?php
   $conn = mysqli_connect('localhost','root','','admin')
   or die('Error connecting to MySQL server.');

   header("content-type:application/json");
   $rawPostData = file_get_contents('php://input');
   $jsonData = json_decode($rawPostData);

   if($_SERVER['REQUEST_METHOD'] == "POST"){
        $question_id = $jsonData->question_id;
        $answer      = $jsonData->answer;
        $home_id     = $jsonData->home_id;
        //echo $answer;die();

          // Insert data into data base
         $sql = "INSERT INTO answer (question_id, answer, home_id) VALUES 
         ( '".$question_id."', '".$answer."', '".$home_id."');";

        $query = $conn->query($sql);
        //print_r($query);die();
        if($query){
        $jsonData = array("status" => 1, "msg" => "perform");
        }else{
        $jsonData = array("status" => 0
        
        , "msg" => "pending");
        }
        }else{
        $jsonData = array("status" => 0, "msg" => "Request method not accepted");
        }

        mysqli_close($conn);

        /* Output header */
        header('Content-type: application/json');
        echo json_encode($jsonData);

