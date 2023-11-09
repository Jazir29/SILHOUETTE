<?php
session_start();
include('Admin/config/dbcon.php');

if(isset($_POST['login_btn']))
{
    $email =  mysqli_real_escape_string($con,  $_POST['email']);
    $password =  mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users where email= '$email' and password= '$password' limit 1 ";
    $login_query_run = mysqli_query($con,$login_query);

    if(mysqli_num_rows($login_query_run) > 0 )
    {
        foreach($login_query_run as $data){
            $user_id = $data['id'];
            $user_name = $data['fname'].' '.$data['lname'];
            $user_email = $data['email'];
            $role_as = $data['role_as'];
        }
        $_SESSION['auth'] = true;
        $_SESSION['auth_role'] = "$role_as"; //1 = administrados  y 0=usuario
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_email' => $user_email,
        ];

        if( $_SESSION['auth_role']== '1')  //1=administrador
        {
            $_SESSION['message'] = "Bienvenido al panel de control";
            header("Location: Admin/index.php");
            exit(0); 
        }
        elseif($_SESSION['auth_role'] == '0' )   //0 = usuario
        {
            $_SESSION['message'] = "Tu estas registrado";
            header("Location: index.php");
            exit(0);  
        }
    }
    else
    {
        $_SESSION['message'] = "Correo o contraseña Invalida";
        header("Location: login.php");
        exit(0); 
    }
}
else
{

    $_SESSION['message'] = "No esta permitido a ingresar a esta parte";
            header("Location: login.php");
            exit(0);
}

?>