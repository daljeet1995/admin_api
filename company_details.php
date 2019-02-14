<?php
   $conn = mysqli_connect('localhost','root','','admin')
   or die('Error connecting to MySQL server.');

   header("content-type:application/json");

   $rawPostData = file_get_contents('php://input');
    $jsonData = json_decode($rawPostData);

   $seachKey = isset($_POST["seachKey"]) ? $_POST["seachKey"] : ''; 
  // $homeid_ex = $_POST['home_id'];
  $offer_id = $jsonData->offer_id;

   if(!empty($seachKey))

      $query = "SELECT home_section.compain_name, home_section.company_name,home_section.task,home_section.amount, question.question, question.interview_question_id
            FROM home_section
            INNER JOIN question
            ON home_section.home_section_id=question.home_id";

            
    //   $query = "Select * From question where question like '%$seachKey%' ORDER BY interview_question_id DESC";
       else
       $query = "SELECT * FROM company_details where offer_id = $offer_id";

      //$query .= "SELECT * from mission" or die('Could not query');
        // echo $query;die();
         

      // $query = "Select * From mission where mission_details like '%$seachKey%' ORDER BY mission_id DESC";
        
     // print_r($query);die();
      // echo $query;die();
    
      $result = mysqli_query($conn, $query);

     // echo $result;die();
   
      $rowCount = mysqli_num_rows($result);


      $result1 = mysqli_query($conn, $query);

     // echo $result;die();
   
      $rowCount1 = mysqli_num_rows($result1);

     // echo $rowCount;die();

     if($rowCount > 0){
      $postData = array();
      $row = mysqli_fetch_assoc($result);
      //$desc = $row['company_details'];
      $couponcodes = $row['coupon_code'];
      // $companyName = $row['company_name'];
      $offer_id = $row['offer_id'];
      $reward = $row['reward'];
      $tracking_speed = $row['tracking_speed'];
      $link = $row['link'];
      $missing_order = $row['missing_order'];
      // print_r($row);die(); 
        
          while($row1 = mysqli_fetch_assoc($result1)){
            $postData1[] = $row1['company_details'] ;
            $postData2[] = $row1['coupon_code'];
            // $postData[] = array_merge($postData1, $postData2);
            $postData[] = $row1;
             
            
            //print_r($postData);die();
            
           // print_r($row['company_name']);die();
           //  $json = file_get_contents('data.json');
           // echo $json;die();
              
          }
          $resultData = array('status' => 'True', 'Reward' => $reward, 'Tracking_speed' =>$tracking_speed, 'Link' => $link, 
          'Missing Order' =>$missing_order,'Offer Id' =>$offer_id,'Coupon Code' =>$couponcodes,  'Description' =>$postData);
         // $arr        = array('result1'=>'jghj','result2'=>'ghhj'); 
        }
        else{
          $resultData = array('status' => 'false', 'message' => 'No Post(s) Found...');
        }

       // $arr3=array($resultData,$arr); 
       //  print (json_encode($arr3));
     
        echo json_encode($resultData);
?>