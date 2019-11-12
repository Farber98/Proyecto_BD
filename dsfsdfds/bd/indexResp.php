<?php
    require_once 'config.php';
    session_start();
    if(isset($_SESSION["user"]))  
    {  
          header("location:user.php");  
    }
    if(isset($_POST['submit'])){
        $error=0;
        
        if(isset($_POST["email"]) && isset($_POST["password"]))
        {  
            $password = $_POST['password'];
		    $email = $_POST['email'];
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                if($password != ""){
                    $query = "SELECT id,email,password FROM users WHERE email = '$email'";  
                    $result = mysqli_query($link, $query);
                    if(mysqli_num_rows($result) > 0)  
                    {  
                        while($row = mysqli_fetch_array($result))  
                        {  
                             if($row["password"]==$password)  
                             {
                                      $_SESSION["user"] = $email;  
                                      header("location:admin/admin.php");  
                             }  
                             else  
                             {  
                                  $error=1;
                             }  
                        }  
                    }
                    else{
                        $error=1;
                    }
                }
                else{
                    $error=1;
                }
            }
            else{
                $error=1;
            }
        }
        else{
            $error=1;
        }
        if($error==1){
            header("location:index.php?msg=wrong");
        }    
    }
?>