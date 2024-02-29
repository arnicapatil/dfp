<?php
$aname=filter_input(INPUT_POST,'a_name');
$aemail=filter_input(INPUT_POST,'a_email');
$aphone=filter_input(INPUT_POST,'a_phone');
$apayment=filter_input(INPUT_POST,'a_payment');
$asubscription=filter_input(INPUT_POST,'a_subscription');
$astart=filter_input(INPUT_POST,'a_start');
$aend=filter_input(INPUT_POST,'a_end');
 if(!empty($aname)){
      if(!empty($aemail)){
          if(!empty($aphone)){
              if(!empty($asubscription)){
                  if(!empty($astart)){
                      if(!empty($aend)){
                          if(!empty($apayment)){
                               $host = "localhost";
                                    $dbusername = "root";
                                    $dbpassword = "";
                                    $dbname = "dfp-project";
                                    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
                                    if(mysqli_connect_error()){
                                        die('Connect Error ('. mysqli_connect_errno() .') '
                                        . mysqli_connect_error());
                                    }
                                    else{
                                        $sql = "INSERT INTO payment ( name, email, contact, Subscription, start_date, end_date, payment)
                                        values ('$aname','$aemail','$aphone','$asubscription','$astart','$aend','$apayment')";
                                        if ($conn->query($sql)){
                                        header("Location: newadmin.php");
                                        }
                                        else{
                                        echo "There was an error, send the message again!". $sql ."<br>". $conn->error;
                                        }
                                        $conn->close();
                                    }

     
 }else{
                            echo "Payment status cannot be empty";
                            die();
                        }
 }else{
                            echo "End date cannot be empty";
                            die();
                        }
 }else{
                            echo "Start date cannot be empty";
                            die();
                        }
 }else{
                            echo "subscription cannot be empty";
                            die();
                        }
     
 }else{
                            echo "contact value cannot be empty";
                            die();
                        }
 }else{
                            echo "Email cannot be empty";
                            die();
                        }
 }else{
     echo "Name cannot be empty";
    die();
    }
?>