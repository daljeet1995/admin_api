<?php
   $conn = mysqli_connect('localhost','root','','app')
   or die('Error connecting to MySQL server.');

   header("content-type:application/json");
   $rawPostData = file_get_contents('php://input');
   $jsonData = json_decode($rawPostData);

   if($_SERVER['REQUEST_METHOD'] == "POST"){
       $username	 = $jsonData->username;
       $lastname    = $jsonData->lastname;
       $email     = $jsonData->email;
       $city     = $jsonData->city;
       $gender     = $jsonData->gender;
        $mobile = $jsonData->mobile;

        $links = $jsonData->links;
        $profile_type = $jsonData->profile_type;
        $photolink = $jsonData->photolink;
        $fcmtoken = $jsonData->fcmtoken;
        $referalcode = $jsonData->referalcode;
        $userrefercode = $jsonData->userrefercode;
        //echo $image1;die();

          // Insert data into data base
         $sql = "INSERT INTO users(username	, lastname, email, city, gender, mobile, links, profile_type, photolink, fcmtoken, referalcode,userrefercode) VALUES 
         ( '".$username."', '".$lastname."', '".$email."',  '".$city."', '".$gender."', '".$mobile."', '".$links."', '".$profile_type."', '".$photolink."', '".$fcmtoken."', '".$referalcode."', '".$userrefercode."')";

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

