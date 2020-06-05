<?php
include '../vendor/autoload.php';

use App\Models\User;
print_r($_POST);
try{
    $user = new User();
    $user->nick= $_POST['nick'];
    $user->nombre= $_POST['nombre'];
    $user->apellidos= $_POST['apellidos'];
    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user->rol_id = $_POST['rol'];
    $user->correo = $_POST['email'];
    $user->save();
    header("Location: http://localhost/crud?status=success");

}catch(Illuminate\Database\QueryException $e){
    $error=$e->errorInfo[2];
    header("Location: http://localhost/crud?error=$error&status=error");

}