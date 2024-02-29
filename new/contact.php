<?php
$firstn=filter_input(INPUT_POST,'first_name');
$lastn=filter_input(INPUT_POST,'last_name');
$email=filter_input(INPUT_POST,'email');
$phone=filter_input(INPUT_POST,'phone');
$reason=filter_input(INPUT_POST,'reason');
if(!empty($firstn)){
    if(!empty($lastn)){
        if(!empty($email)){
            if(!empty($phone)){
                if(!empty($reason)){
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
                        $sql = "INSERT INTO contact (First, Last, EID, Contact, Reason)
                        values ('$firstn','$lastn','$email','$phone','$reason')";
                        if ($conn->query($sql)){
                           header("Location: ../index.php");
                        }
                        else{
                            echo "There was an error, send the message again!". $sql ."<br>". $conn->error;
                        }
                        $conn->close();
                    }
                }
                else{
                    echo "Reason of Contact canot be empty!";
                    die();
                }
            }
            else{
                echo "Phone no cannot be empty!";
                die();
            }
        }
        else{
            echo "Email cannot be empty!";
            die();
        }
    }
    else{
        echo "Last Name cannot be empty!";
        die();
    }
}
else{
    echo "First Name cannot be empty!";
    die();
}
?>