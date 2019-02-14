<?php
   $conn = mysqli_connect('localhost','root','','admin')
   or die('Error connecting to MySQL server.');

   header("content-type:application/json");
   $rawPostData = file_get_contents('php://input');
   $jsonData = json_decode($rawPostData);

   if($_SERVER['REQUEST_METHOD'] == "POST"){
       $user_id	    = $jsonData->user_id;
       $offer_id    = $jsonData->offer_id;
       $username    = $jsonData->username;
       $link        = $jsonData->link;
       
       // echo $link;die();

          // Insert data into data base
         $sql = "INSERT INTO shop_link(user_id	, offer_id, username, link) VALUES 
         ( '".$user_id."', '".$offer_id."',  '".$username."', '".$link."')";

        $query = $conn->query($sql);
        //print_r($query);die();
        if($query){
        $jsonData = array("msg" => "shop link saved");
        }else{
        $jsonData = array("msg" => "shop link cannot saved");
        }
        }else{
        $jsonData = array("status" => 0, "msg" => "Request method not accepted");
        }

        mysqli_close($conn);

        /* Output header */
        header('Content-type: application/json');
        echo json_encode($jsonData);

