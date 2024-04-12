<?php   
    //Importar la conexion
    require 'includes/app.php';
    $db = conectarDB();
    
    //Crear un email y password
    $email = "ADMIN@ADMIN.com";
    $password = "1797859";
    
    $passwordHash = password_hash($password, PASSWORD_DEFAULT ) ;
    
    var_dump($passwordHash);
    
    //Query para el usuario
    
    $query = "INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHash}'); ";
    
    // echo $query;
    
    
    //Agregarlo a la base de datos
    
    mysqli_query($db, $query);
    


?>