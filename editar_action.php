<?php
require_once 'config.php';
require_once 'dao/UsuarioDAOMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($id && $name && $email) {

    
    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($name);
    $usuario->setEmail($email);

    $usuarioDao->update( $usuario );

    header("Location: index.php");
    exit;
    
} else {
    header("Location: editar.php?id=".$id);
    exit;
}