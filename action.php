<?php 

//  database connection

require('dbcon.php');

if(isset($_GET['auth'])){
    $auth = $_GET['auth'];

    if($auth=='login'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordmd5 = md5($password);
        
        if($username==''){
            echo "empty_username";
        }elseif($password==''){
            echo "empty_password";
        }else{
            $query = "SELECT * FROM user_info WHERE username = :username";
            $statement = $connection->prepare($query);
            $statement->execute(
                array(
                    'username' => $_POST['username']
                )
            );
            $count = $statement->rowCount();
            if($count > 0){
                $result = $statement->fetchAll();
                foreach($result as $row){
                    if($passwordmd5==$row['password']){
                        setcookie('uid',$row['id'],time()+3600);
                        echo "success";
                    }else{
                        echo "invalid_password";
                    }
        }
            }else{
                echo "invalid_username";
            }
        }
    }elseif($auth=='register'){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirm-password'];
        $passwordmd5 = md5($confirmpassword);

        if($username==''){
            echo "empty_username";
        }elseif($email==''){
            echo "empty_email";
        }elseif($password==''){
            echo "empty_password";
        }elseif($confirmpassword==''){
            echo "empty_confirm_password";
        }else{
            if($password!=$confirmpassword){
                echo "invalid_password";
            }else{
                $usernamequery = "SELECT * FROM user_info WHERE username = :username";
                $usernamestatement = $connection->prepare($usernamequery);
                $usernamestatement->execute(
                    array(
                        'username' => $_POST['username']
                    )
                );
                $usernamecount = $usernamestatement->rowCount();
                if($usernamecount > 0){
                    echo "invalid_username";
                }else{
                    $emailquery = "SELECT * FROM user_info WHERE email = :email";
                    $emaistatement = $connection->prepare($emailquery);
                    $emaistatement->execute(
                        array(
                            'email' => $_POST['email']
                        )
                    );
                    $emailcount = $emaistatement->rowCount();
                    if($emailcount > 0){
                        echo "invalid_email";
                    }else{
                        try{
                            $insert = "INSERT INTO user_info(username,email,password,registration_date) VALUES('$username','$email','$passwordmd5',now())";
                            $connection->exec($insert);
                            $userid = $connection->lastInsertId();
                            setcookie('uid',$userid,time()+3600);
                            echo "success";
                        }catch(PDOException $e){
                            echo $insert . $e->getMessage();
                        }
                    }
                }
            }
        }
    }
}

?>