<?php
  // include('includes/connection.php');

   //Step1
 $conn = mysqli_connect('localhost','root','','admin')
 or die('Error connecting to MySQL server.');

   header("content-type:application/json");
     $rawPostData = file_get_contents('php://input');
     $jsonData = json_decode($rawPostData);

   if($_SERVER['REQUEST_METHOD'] == "POST"){
    $question_id = $jsonData->question_id;
    $answer      = implode('\n',$jsonData->answer);
    $home_id     = $jsonData->home_id;
    $email_id     = $jsonData->email_id;
    $pending_amount     = $jsonData->amount;


        $sql = "INSERT INTO answer (question_id, answer, home_id, email_id, pending_amount,pending, featured ) VALUES 
          ('".$question_id."', '".$answer."', '".$home_id."', '".$email_id."', '".$pending_amount."', '1', 'Pending' );";

      $query = mysqli_query($conn,$sql);

//          $sql1 = "UPDATE answer
//          SET pending='1', featured='Pending'
//          WHERE home_id=$home_id && email_id=$email_id"; 
// $query = mysqli_query($conn,$sql1);
    //    // print_r(sql2); die();

    

    //   // print_r($sql);die();

    //   // $query2 =   mysqli_multi_query($conn,$sql);
    //   //print_r($query2);die();
    //   // $query2 = $conn->query($sql2);

    //   if ($sql and $sql1) {
    //     mysqli_query("COMMIT"); //Commits the current transaction
    //  } else {        
    //     mysqli_query("ROLLBACK");//Even if any one of the query fails, the changes will be undone
    //  }
      
        
        if($query){
        $jsonData = array("status" => 1, "msg" => "perform");
        }else{
        $jsonData = array("status" => 0, "msg" => "pending");
        }
        }else{
        $jsonData = array("status" => 0, "msg" => "Request method not accepted");
        }

        mysqli_close($conn);

        /* Output header */
        header('Content-type: application/json');
        echo json_encode($jsonData);

   

  
   
?>