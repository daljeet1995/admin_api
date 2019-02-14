<?php
   $conn = mysqli_connect('localhost','root','','admin')
   or die('Error connecting to MySQL server.');

   header("content-type:application/json");
   $rawPostData = file_get_contents('php://input');
   $jsonData = json_decode($rawPostData);

   if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email       = $jsonData->email;
        $mobile_number  = $jsonData->mobile_number;
        $name           = $jsonData->name;
        $reedem_amount         = $jsonData->reedem_amount;
         // print_r($email_id);;
        

          // Insert data into data base
         $sql = "INSERT INTO phonepay(email, mobile_number, name,reedem_amount) VALUES 
         ( '".$email."', '".$mobile_number."', '".$name."', '".$reedem_amount."');";

        $query = $conn->query($sql);
        //echo $query;die();

        $sql1 = "INSERT INTO reedem(source, reedem_amount, email_id) VALUES 
        ('PHONEPAY', '".$reedem_amount."', '".$email."');";
        $query1 = $conn->query($sql1);

        if($query){
        $jsonData = array("msg" => "Phonepay Details Saved");
        }else{
        $jsonData = array("msg" => "Email Details are already Exists");
        }
        }else{
        $jsonData = array("status" => 0, "msg" => "Request method not accepted");
        }

        mysqli_close($conn);

        /* Output header */
        header('Content-type: application/json');
        echo json_encode($jsonData);

