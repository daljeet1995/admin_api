<?php
   $conn = mysqli_connect('localhost','root','','admin')
   or die('Error connecting to MySQL server.');

   header("content-type:application/json");
   $rawPostData = file_get_contents('php://input');
   $jsonData = json_decode($rawPostData);

   if($_SERVER['REQUEST_METHOD'] == "POST"){
       $home_id = $jsonData->home_id;
       // $image1 = base64_decode($jsonData->image1);
       $image1    = $jsonData->image1;
        $image2   = $jsonData->image2;
        $link     = $jsonData->link;
        $email_id = $jsonData->email_id;
        //echo $image1;die();

          // Insert data into data base
         $sql = "INSERT INTO completed_task(image1, image2, link, email_id, home_id) VALUES 
         ( '".$image1."', '".$image2."', '".$link."', '".$email_id."', '".$home_id."')";

        $query = $conn->query($sql);
        //print_r($query);die();
        if($query){
        $jsonData = array("msg" => "data saved");
        }else{
        $jsonData = array("msg" => "data cannot saved");
        }
        }else{
        $jsonData = array("status" => 0, "msg" => "Request method not accepted");
        }

        mysqli_close($conn);

        /* Output header */
        header('Content-type: application/json');
        echo json_encode($jsonData);

