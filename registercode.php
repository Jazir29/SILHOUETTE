<?php
session_start();
include('Admin/config/dbcon.php');

if(isset($_POST['register_btn']))
{
    $fname =  mysqli_real_escape_string($con, $_POST['fname']);
    $lname =  mysqli_real_escape_string($con, $_POST['lname']);
    $email =  mysqli_real_escape_string($con,  $_POST['email']);
    $password =  mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password =  mysqli_real_escape_string($con, $_POST['cpassword']);
    
    if($password == $confirm_password)
    {
        //verificar correo
        $chekemail = "SELECT email  FROM users Where email='$email'";
        $chekemail_run = mysqli_query($con, $chekemail);
    
        if(mysqli_num_rows($chekemail_run) > 0)
        {
            //correo ya existe
            $_SESSION['message'] = "Correo ya existente";
            header("Location: register.php");
            exit(0);
        }
        else
        {
            $user_query = "INSERT INTO users (fname, lname, email, password) VALUES ('$fname','$lname','$email','$password')";
            $user_query_run = mysqli_query($con,$user_query);

            if($user_query_run)
            {
                $_SESSION['message'] = "Registro existoso";
                header("Location: login.php");
                exit(0);
            }
            else
            {
                $_SESSION['message'] = "Algo salio mal";
                header("Location: register.php");
                exit(0);
            }
        }
       

    }
    else
    {
        $_SESSION['message'] = "Contraseña y Confirmar Contraseña no coinciden";
        header("Location: register.php");
        exit(0);

    }
}
else
{
    header("Location: register.php");
    exit(0);
}



?>