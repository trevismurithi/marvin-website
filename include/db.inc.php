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
    private $create_message="
        CREATE TABLE messages(
            id INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
            words TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            receiver INT(11) NOT NULL,
            user_id INT(11),
            FOREIGN KEY(user_id) REFERENCES users(id)
        );
    ";
    private $create_state ="
        CREATE TABLE state(
            id INT(11) AUTO_INCREMENT NOT NULL UNIQUE,
            current_state TEXT NOT NULL,
            set_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            user_id INT(11) NOT NULL,
            FOREIGN KEY(user_id) REFERENCES users(id)
        );
    ";
    private $create_image="
        CREATE TABLE image(
            id INT(11) AUTO_INCREMENT UNIQUE NOT NULL,
            img TEXT,
        user_id INT(11) UNIQUE NOT NULL,
        FOREIGN KEY(user_id) REFERENCES users(id)
        );
    ";

    private $create_order="
        CREATE TABLE orders(
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            type TEXT NOT NULL,
            type_write TEXT NOT NULL,
            university TEXT NOT NULL,
            duration TEXT NOT NULL,
            space TEXT NOT NULL,
            page TEXT NOT NULL,
            fee TEXT NOT NULL,
            deadline DATE NOT NULL,
            state TEXT NOT NULL,
            user_id INT(11) NOT NULL,
            FOREIGN KEY(user_id) REFERENCES users(id)
        )
    ";
    private $create_file = "
            CREATE TABLE files(
                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                filename TEXT NOT NULL,
                order_id INT(11) NOT NULL,
                FOREIGN KEY(order_id) REFERENCES orders(id)
            );
    ";
    private $create_user = "INSERT INTO users(user_name,first_name,last_name,email,phone_num,pwd) VALUES (?,?,?,?,?,?)";
    private $search_user = "SELECT * FROM users WHERE user_name=? OR email=? ";
    private $login_user = "SELECT id,email,phone_num,pwd FROM users WHERE user_name=?";
    private $all_users = "SELECT id,user_name FROM users";
    private $all_users_details = "SELECT * FROM users";
    //user roles querry selector
    private $user_role = "SELECT user_id FROM role";
    //messages from user querry selector
    private $user_message = "SELECT words,created_at FROM messages WHERE receiver=? AND user_id=?";
    private $sender_message = "SELECT words,receiver FROM messages WHERE user_id=?";
    private $insert_message = "INSERT INTO messages (words,receiver,user_id) VALUES (?,?,?)";
    //status querry selector
    private $insert_status = "INSERT INTO state(current_state,set_at,user_id) VALUES (?,?,?)";
    private $update_status = "UPDATE state SET current_state = ?, set_at=? WHERE user_id=?";
    private $user_status = "SELECT current_state FROM state WHERE user_id=?";
    private $all_status = "SELECT current_state,set_at,user_id FROM state";
    //image querry selector
    private $insert_image = "INSERT INTO image(img,user_id) VALUES(?,?)";
    private $update_image ="UPDATE image SET img=? WHERE user_id=?";
    private $select_image ="SELECT img FROM image WHERE user_id=?";
    private $all_images = "SELECT img,user_id FROM image";
    //orders querry selector
    private $insert_order = "INSERT INTO orders
    (type,type_write,university,duration,space,page,fee,deadline,state,user_id) 
    VALUES
    (?,?,?,?,?,?,?,?,?,?)";
    private $update_orders = "UPDATE orders SET state=? WHERE id=?";
    private $select_order = "SELECT * FROM orders WHERE state=? AND user_id=?";
    //files querry selector
    private $insert_file = "INSERT INTO files(filename,order_id) VALUES (?,?)";
    private $select_file = "SELECT filename FROM files WHERE order_id=?";
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
            header('Location: ../login.php?login=user');
            exit();
        }
    }

    public function logInUser($conn,$username,$pwd){
        $pass_ = "";
        $email="";
        $phone="";
        $user_id="";
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
                $stmt->bind_result($user_id,$email,$phone,$pass_);
                while($stmt->fetch()){
                    //compare the passwords
                    $match = password_verify($pwd,$pass_);
                    //if the passwords match
                    if($match){
                        //take them to dashboard.
                        //but first to the chat room
                        //set the session with their username, email and phone-number
                        session_start();
                        $_SESSION['user_id'] = $user_id;
                        $_SESSION['username'] = $username;
                        $_SESSION['phone'] = $phone;
                        $_SESSION['email'] = $email; 
                    }else {
                        //give message of for error
                        header("Location: ../login.php?error=failedlog");
                        exit();
                    }
                }
            }else{
                //the user does not exist
                header("Location: ../login.php?error=usernull");
                exit();
                $stmt->close();
                $conn->close();
            }
        }
    }

    public function updateStatus($conn,$status,$time,$user_id,$query){
        //prepare the statement 
        $stmt = $conn->prepare($query);
        if(!$stmt){
            //the preparation failed
            header("Location: ../signup.php?error=prepareerror");
            exit();
        }else{
            $stmt->bind_param('sss',$status,$time,$user_id);
            //execute
            $stmt->execute();
        }   
    }

    public function viewStatus($conn,$user_id){
        $status = "";
        //prepare the statement 
        $stmt = $conn->prepare($this->user_status);
        if(!$stmt){
            //the preparation failed
            header("Location: ../signup.php?error=prepareerror");
            exit();
        }else{
            $stmt->bind_param('s',$user_id);
            //execute statement
            $stmt->execute();
            //bind the result
            $stmt->bind_result($status);
            $stmt->fetch();
            return $status;
        }
    }

    public function viewAllStatus($conn){
        $current_state = "";
        $time = "";
        $user_id = "";
        //prepare the statement 
        $stmt = $conn->prepare($this->all_status);
        if(!$stmt){
            //the preparation failed
            header("Location: ../signup.php?error=prepareerror");
            exit();
        }else{
            //execute the statement
            $stmt->execute();
            //bind the result
            $stmt->bind_result($current_state,$time,$user_id);
            $arr=[];
            $i=0;
            while($stmt->fetch()){
                $arr[$i] = [$user_id,$current_state,$time];
                $i++;
            }
            return $arr;
        } 
    }

    public function updateImage($conn,$img,$user_id,$query){
        //prepare the statement 
        $stmt = $conn->prepare($query);
        if(!$stmt){
            //the preparation failed
            header("Location: ../signup.php?error=prepareerror");
            exit();
        }else{
            $stmt->bind_param('ss',$img,$user_id);
            //execute
            $stmt->execute();
        }   
    }

    public function viewAllImages($conn){
        $img = "";
        $user_id = "";
        //prepare the statement 
        $stmt = $conn->prepare($this->all_images);
        if(!$stmt){
            //the preparation failed
            header("Location: ../signup.php?error=prepareerror");
            exit();
        }else{
            //execute the statement
            $stmt->execute();
            //bind the result
            $stmt->bind_result($img,$user_id);
            $arr=[];
            while($stmt->fetch()){
                $arr[$user_id] = $img;
            }
            return $arr;
        } 
    }

    public function viewImage($conn,$user_id){
        $img = "";
        //prepare the statement 
        $stmt = $conn->prepare($this->select_image);
        if(!$stmt){
            //the preparation failed
            header("Location: ../signup.php?error=prepareerror");
            exit();
        }else{
            $stmt->bind_param('s',$user_id);
            //execute statement
            $stmt->execute();
            //bind the result
            $stmt->bind_result($img);
            $stmt->fetch();
            return $img;
        }
    }
    public function userDetails($conn){
        //prepare the statement
        $stmt = $conn->prepare($this->all_users_details);
        if(!$stmt){
            header("Location: ../chatroom.php?error=prepareerror");
            exit();
        }
        else{
            //execute the statement
            $stmt->execute();
            $result = $stmt->get_result();
            $arr = [];
            while($obj =$result->fetch_object()){
                 $arr[$obj->id] = [$obj->user_name,$obj->first_name, $obj->email];
            }
            return $arr;
        }
    }
    public function listener($conn){
        $id="";
        $user = "";
        //prepare the statement
        $stmt = $conn->prepare($this->all_users);
        if(!$stmt){
            header("Location: ../chatroom.php?error=prepareerror");
            exit();
        }
        else{
            //execute the statement
            $stmt->execute();
            $stmt->bind_result($id,$user);
            $arr = [];
            while($stmt->fetch()){
                 $arr[$id] = $user;
            }
            return $arr;
        }
    }

    public function rolePlay($conn){
        $user_id="";
        //prepare the statement
        $stmt = $conn->prepare($this->user_role);
        if(!$stmt){
            header("Location: ../chatroom.php?error=prepareerror");
            exit();
        }else{
            //execute the statement
            $stmt->execute();
            //bind the result
            $stmt->bind_result($user_id);
            //fetch the role players
            $i = 0;
            $arr=[];
            while($stmt->fetch()){
                $arr[$i]=$user_id;
                $i++;
            }
            return $arr;
        }
    }
    
    public function userMessages($conn,$receiver,$user_id){
        $message = "";
        $time = "";
        //prepare the statement
        $stmt = $conn->prepare($this->user_message);
        if(!$stmt){
            header("Location: ../chatroom.php?error=prepareerror");
            exit();
        }else{
            //bind the the user_id
            $stmt->bind_param('ss',$receiver,$user_id);
            //execute 
            $stmt->execute();
            //bind the message and time
            $stmt->bind_result($message,$time);
            //create and array
            $arr=[];
            while($stmt->fetch()){
                //get the message and who it is from
                $arr[$time] =[$message,$user_id];
            }
            return $arr;
        }       
    }

    public function insertMessage($conn,$message,$receiver,$user_id){
        //prepare the statement
        $stmt = $conn->prepare($this->insert_message);
        if(!$stmt){
            header("Location: ../chatroom.php?error=prepareerror");
            exit();
        }else{
            //bind the the user_id
            $stmt->bind_param('sss',$message,$receiver,$user_id);
            //execute 
            $stmt->execute();    
        }   
    }

    public function senders($conn,$user_id){
        $message = "";
        $receiver = "";
        //prepare the statement
        $stmt = $conn->prepare($this->sender_message);
        if(!$stmt){
            header("Location: ../chatroom.php?error=prepareerror");
            exit();
        }else{
            //bind the the user_id
            $stmt->bind_param('s',$user_id);
            //execute 
            $stmt->execute();
            //bind the message and time
            $stmt->bind_result($message,$receiver);
            //create and array
            $arr=[];
            $i = 0;
            while($stmt->fetch()){
                //get the message and who it is from
                $arr[$i] =[$message,$receiver];
                $i++;
            }
            return $arr;
        }     
    }

    public function saveOrder($conn,$type,$type_writer,$university,$duration,$space,$page,$fee,$deadline,$state,$user_id){
        //prepare the order
        $stmt = $conn->prepare($this->insert_order);
        if(!$stmt){
            header("Location: ../calculator.php?error=prepareerror");
            exit();      
        }else{
            //bind the parameters
            $stmt->bind_param('ssssssssss',$type,$type_writer,$university,$duration,$space,$page,$fee,$deadline,$state,$user_id);
            //execute the statement
            if(!$stmt->execute()){
                header("Location: ../calculator.php?error=execute");
                exit();
            }else{
                header("Location: ../order.php?error=none");
                exit();
            }

        }
    }

    public function updateOrder($conn,$state,$order_id){
        //prepare the order
        $stmt = $conn->prepare($this->update_orders);
        if(!$stmt){
            header("Location: ../chatroom.php?error=prepareerror");
            exit();      
        }else{
            //bind the parameters
            $stmt->bind_param('ss',$state,$order_id);
            //execute the statement
            $stmt->execute();
        }  
    }

    public function viewOrder($conn,$state,$user_id){
        //prepare the order
        $stmt = $conn->prepare($this->select_order);
        if(!$stmt){
            header("Location: ../chatroom.php?error=prepareerror");
            exit();      
        }else{
            //bind the parameters
            $stmt->bind_param('ss',$state,$user_id);
            //execute the statement
            $stmt->execute();
            //bind the result
            $result = $stmt->get_result();
            $arr=[];
            $i=0;
            while($obj = $result->fetch_object()){
                $arr[$i] = [
                    $obj->id,
                    $obj->type,
                    $obj->type_write,
                    $obj->university,
                    $obj->duration,
                    $obj->space,
                    $obj->page,
                    $obj->deadline,
                    $obj->fee,
                    $obj->state
                ];
                $i++;
            }
            $stmt->free_result();
            return $arr;    
        }
    }
    public function insertFile($conn,$filename,$order_id){
        //prepare the order
        $stmt = $conn->prepare($this->insert_file);
        if(!$stmt){
            header("Location: ../chatroom.php?error=prepareerror");
            exit();      
        }else{
            //bind the parameters
            $stmt->bind_param('ss',$filename,$order_id);
            //execute the statement
            $stmt->execute();  
        }
    }
    public function viewFile($conn,$order_id){
        $filename = "";
        //prepare the order
        $stmt = $conn->prepare($this->select_file);
        if(!$stmt){
            header("Location: ../myUsers.php?error=prepareerror");
            exit();      
        }else{
            //bind the parameters
            $stmt->bind_param('s',$order_id);
            //execute the statement
            $stmt->execute();
            //bind the result
            $stmt->bind_result($filename);
            $stmt->free_result();
            return $filename;    
        }
    }
    public function getInsertStatus(){return $this->insert_status;}
    public function getUpdateStatus(){return $this->update_status;}
    public function getInsertImage(){return $this->insert_image;}
    public function getUpdateImage(){return $this->update_image;}
}