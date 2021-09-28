<?php

function showHome(){
    echo '
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

    <form action="createtask" method="post">

        <input type="text" name="title" id="title" >
        <input type="text" name="description" id="description" >
        <input type="number" name="priority" id="priority" >
        <input type="checkbox" name="done" id="done" >
        <input type="submit" value="Guardar" >
    </form>

    <ul>';
    $tareas = getTareas();
       foreach($tareas as $tarea){
           echo '<li> '.$tarea->titulo.': '. $tarea->descripcion.'</li>';
       }
    echo'</ul>
</body>
</html>
    ';
    
    


}