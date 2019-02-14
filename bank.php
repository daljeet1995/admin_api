<?php
   $conn = mysqli_connect('localhost','root','','admin')
   or die('Error connecting to MySQL server.');

   header("content-type:application/json");
   $rawPostData = file_get_contents('php://input');
   $jsonData = json_decode($rawPostData);

   if($_SERVER['REQUEST_METHOD'] == "POST"){
        $bank_name             = $jsonData->bank_name;
        $account_holder_name   = $jsonData->account_holder_name;
        $account_number        = $jsonData->account_number;
        $ifsc_code             = $jsonData->ifsc_code;
        $email                 = $jsonData->email;
        $mobile_number         = $jsonData->mobile_number;
        $reedem_amount         = $jsonData->reedem_amount;
        // print_r($bank_name);
        // print_r($account_holder_name);
        // print_r($account_number);
        // print_r($ifsc_code);
        // print_r($mobile_number);die();

          // Insert data into data base
         $sql = "INSERT INTO bank(bank_name, account_holder_name, account_number, ifsc_code	, email,mobile_number,reedem_amount) VALUES 
         ( '".$bank_name."', '".$account_holder_name."', '".$account_number."', '".$ifsc_code."', '".$email."', '".$mobile_number."', '".$reedem_amount."');";

        $query = $conn->query($sql);
        //echo $query;die();
        $sql1 = "INSERT INTO reedem(source, reedem_amount, email_id) VALUES 
        ('BANK', '".$reedem_amount."', '".$email."');";
        $query1 = $conn->query($sql1);


        if($query){
        $jsonData = array("msg" => "Bank Details Saved");
        }else{
        $jsonData = array("status" => 0, "msg" => "Email Details are already exists");
        }
        }else{
        $jsonData = array("status" => 0, "msg" => "Request method not accepted");
        }

        mysqli_close($conn);

        /* Output header */
        header('Content-type: application/json');
        echo json_encode($jsonData);

