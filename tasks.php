<?php


function showHome(){
    $html = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <base href="'.BASE_URL.'" taregt="_blank" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=h1, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Tareas</h1>

        <ul>';
        $tareas = getTareas();
        foreach($tareas as $tarea){
            if($tarea->finalizada==1){
                $html.= '<li> <strike>'.$tarea->titulo.': '. $tarea->descripcion.' - <a href="deleteTask/'.$tarea->id_tarea.'">Borrar</a> - <a href="updateTask/'.$tarea->id_tarea.'">Hecho</a> <strike></li>';
            }
            else{
            $html.= '<li> '.$tarea->titulo.': '. $tarea->descripcion.' - <a href="deleteTask/'.$tarea->id_tarea.'">Borrar</a> - <a href="updateTask/'.$tarea->id_tarea.'">Hecho</a> </li>';
            }
        }
        
        $html .='
        </ul>
        
        <form id="form" action="createTask" method="POST">

            <input type="text" name="title" id="title" >
            <input type="text" name="description" id="description" >
            <input type="number" name="priority" id="priority" >
            <input type="checkbox" name="done" id="done" >
            <input type="submit" value="Guardar" >
        </form>
        
    </body>
    </html>
        ';
        echo $html;




}
        
    function createTask(){
    
        if(!isset($_POST['done'])){
            $done=0;
        }
        else{
            $done =1;
        }
       insertTask($_POST['title'], $_POST['description'],$_POST['priority'],$done);
        header("Location: ". BASE_URL."home");


    }
    
    function deleteTask($task_id){
        deleteTaskFromDB($task_id);
        header("Location: ". BASE_URL."home");
      }

      function updateTask($task_id){
          updateTaskOnDB($task_id);
          header("Location: ". BASE_URL."home");
      }