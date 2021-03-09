<?php


class UserManager
{
    private $server="localhost";
    private $database = "essay";
    private $user = "root";
    private $password = "";
    private $create_table ="
        CREATE TABLE users(
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        user_name TEXT UNIQUE NOT NULL,
        first_name TEXT NOT NULL,
        last_name TEXT NOT NULL,
        email TEXT UNIQUE NOT NULL,
        phone_num TEXT NOT NULL,
        pwd TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    private $create_user = "INSERT INTO users(user_name,first_name,last_name,email,phone_num,pwd) VALUES (?,?,?,?,?,?)";
    private $search_user = "SELECT * FROM users WHERE user_name=? OR email=? ";
    private $login_user = "SELECT pwd FROM users WHERE user_name=?";
    private $all_users = "SELECT user_name FROM users";
    public function createConnection()
    {
        $conn = new mysqli($this->server,$this->user,$this->password,$this->database);
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }else{
            return $conn;
        }
    }

    public function testNameEmail($conn,$user_name,$email)
    {
        //create a statement 
        $stmt = $conn->prepare($this->search_user);
        if(!$stmt){
            //failed to prepare the statement
            header("Location: ../signup.php?error=prepareerror");
            exit();
        }else{
            //if the statement passed
            //bind the querry with variables
            $stmt->bind_param('ss',$user_name,$email);
            //execute 
            $stmt->execute();
            //get the number of users
            $stmt->store_result();
            $number = $stmt->num_rows;
            //if the number  is greater
            // than 0 send error message
            if($number>0){
                $stmt->free_result();
                $stmt->close();
                $conn->close();
                header("Location: ../signup.php?error=userexists");
                exit();
            }
        }

    }

    public function createUser($conn,$user_name,$first_name,$last_name,$email,$phone,$pwd)
    {
        //prepare the statement
        $stmt = $conn->prepare($this->create_user);
        if(!$stmt){
            //if the statement failed
            header("Location: ../signup.php?error=prepareerror");
            exit();
        }else{
            //if the statement is successful
            //bind the querry with the variables
            $stmt->bind_param('ssssss',$user_name,$first_name,$last_name,$email,$phone,$pwd);
            //execute the statement and close the both statement and connection
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }
    }

    public function logInUser($conn,$username,$pwd){
        $pass_ = "";
        //prepare the statement 
        $stmt = $conn->prepare($this->login_user);
        if(!$stmt){
            //the preparation failed
            header("Location: ../signup.php?error=prepareerror");
            exit();
        }else{
            //if the statement is successful
            //bind the querry with the variables
            $stmt->bind_param('s',$username);
            $stmt->execute();
            //store the result
            $stmt->store_result();
            //get the number of rows
            $number = $stmt->num_rows;
            if($number>0){
                //bind the password
                $stmt->bind_result($pass_);
                while($stmt->fetch()){
                    //compare the passwords
                    $match = password_verify($pwd,$pass_);
                    //if the passwords match
                    if($match){
                        //take them to dashboard.
                    }else {
                        //give message of for error
                    }
                }
                $stmt->close();
                $conn->close();
            }else{
                //the user does not exist
                header("Location: ../login.php?error=usernull");
                exit();
                $stmt->close();
                $conn->close();
            }
        }
    }

    public function listener($conn){
        $user = "";
        //prepare the statement
        $stmt = $conn->prepare($this->all_users);
        if(!$stmt)echo"failed to prepare";
        else{
            //execute the statement
            $stmt->execute();
            $stmt->bind_result($user);
            $i = 0;
            $arr = [];
            while($stmt->fetch()){
                 $arr[$i] = $user;
                $i++;
            }
            return $arr;
        }
    }
}