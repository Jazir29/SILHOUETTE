<?php
session_start();
include('config/dbcon.php');
include('message.php');

//Codigo para la eliminacion de administrador

if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];

    //Conexion a la base de datos

    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {

        //Confirmacion de eliminacion
        
        $_SESSION['message'] = "Administrador eliminado correctamente";
        header('Location: view-register.php');
        exit(0);
    }
    else
    {

        //Notificacion si no se elimino

        $_SESSION['message'] = "Algo salio mal";
        header('Location: view-register.php');
        exit(0); 
    }
}


if(isset($_POST['add_user']))

//Codigo para agregar a un administrador

{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'] == true ? '1': '0';
    
    //Conexion a la base de datos

    $query = "INSERT INTO users (fname,lname,email,password,status) VALUES ('$fname','$lname','$email','$password','$status')";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        
        //Confirmacion de Administrador agregado

        $_SESSION['message'] = "Administrador Agregado correctamente";
        header('Location: view-register.php');
        exit(0);
    }
    else
    {

         //Notificacion si no se agrego

        $_SESSION['message'] = "Algo salio mal";
        header('Location: view-register.php');
        exit(0); 
    }
    
}


if(isset($_POST['update_user']))

//Actualizar datos del administrador

{
    
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'] == true ? '1': '0';
    
    //Conexion a la base de datos

    $query = "UPDATE users set fname = '$fname', lname = '$lname', email = '$email', password = '$password', status = '$status'
    where  id= '$user_id' ";

    $query_run = mysqli_query($con , $query);
    if($query_run)
    {
     
        //Notificacion de Actualizado correctamente

        $_SESSION['message'] = 'Actualizado con exito';
        
        header('Location: view-register.php');
        exit(0);
    }
}
?>