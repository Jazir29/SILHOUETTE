<?php
session_start();
include('config/conexion_be.php');
include('message.php');

//Codigo para la eliminacion de administrador

if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];

    //Conexion a la base de datos

    $query = "DELETE FROM usuarios WHERE id='$user_id' ";
    $query_run = mysqli_query($con,$query);
    if($query_run)
    {

        //Confirmacion de eliminacion
        
        $_SESSION['message'] = "Administrador eliminado correctamente";
        header('Location: view-register-usuarios.php');
        exit(0);
    }
    else
    {

        //Notificacion si no se elimino

        $_SESSION['message'] = "Algo salio mal";
        header('Location: view-register-usuarios.php');
        exit(0); 
    }
}

if(isset($_POST['add_user']))

//Codigo para agregar a un usuario

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
        
        //Confirmacion de Usuario agregado

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

//Actualizar datos del usuario

{
    
    $user_id = $_POST['user_id'];
    $nombre_completo = $_POST['nombre_completo'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    
    //Conexion a la base de datos

    $query = "UPDATE usuarios set nombre_completo = '$nombre_completo', usuario = '$usuario', correo = '$correo', contrasena = '$contrasena'
    where  id= '$user_id' ";

    $query_run = mysqli_query($con , $query);
    if($query_run)
    {
     
        //Notificacion de Actualizar correctamente

        $_SESSION['message'] = 'Actualizado con exito';
        
        header('Location: view-register-usuarios.php');
        exit(0);
    }
}
?>