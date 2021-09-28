<?php
function getTareas(){
    $db = new PDO('mysql: host=localhost;'.'dbname=bd_tareas;charset=utf8','root','' );
    $sentencia = $db->prepare("select * from tareas");
    $sentencia->execute();
    $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
    return $tareas;

}


