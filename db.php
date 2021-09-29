<?php
function getTareas(){
    $db = new PDO('mysql: host=localhost;'.'dbname=bd_tareas;charset=utf8','root','' );
    $sentencia = $db->prepare("select * from tareas");
    $sentencia->execute();
    $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
    return $tareas;

}


function insertTask($titulo, $descripcion, $prioridad, $finalizada){
    $db = new PDO('mysql: host=localhost;'.'dbname=bd_tareas;charset=utf8','root','' );
    $sentencia = $db->prepare("INSERT INTO tareas(titulo, descripcion, prioridad, finalizada) VALUES(?, ?, ?, ?)");
    $sentencia->execute(array($titulo, $descripcion, $prioridad, $finalizada));



}

function deleteTaskFromDB($task_id){
     $db = new PDO('mysql: host=localhost;'.'dbname=bd_tareas;charset=utf8','root','' );
     $sentencia = $db->prepare("DELETE FROM tareas WHERE id_tarea=?");
      $sentencia->execute(array($task_id));
  }

  function updateTaskOnDB($task_id){
    $db = new PDO('mysql: host=localhost;'.'dbname=bd_tareas;charset=utf8','root','' );
    $sentencia = $db->prepare("UPDATE tareas SET finalizada= 1 WHERE id_tarea=?");
     $sentencia->execute(array($task_id));
 }