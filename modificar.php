<?php

include 'vendor/autoload.php';
use App\Models\User;

$allUser = User::all();

$users= $allUser->toArray();
$pug = new Pug([
    // here you can set options

]);
$mensaje="";
$status = isset($_GET['status']) ? $_GET['status'] : "";
if($status=="success"){
    $mensaje="Usuario creado con Exito";
}else if($status=="error"){
    $mensaje= isset($_GET['error']) ? $_GET['error'] : "";
}
echo isset($_GET['error']);

//echo $pug->renderDirectory('./views', '.php', ['foo' => 'bar']);
echo $output = $pug->render("views/crear.pug", [
    'status' => $status,
    'mensaje'=> $mensaje,
    'users'=> $users,
]);

