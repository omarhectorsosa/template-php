<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verduleria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
      @media (min-width: 992px) {
        .alto-100 {
          height: 100vh;
        }   
      }
    </style>
</head>

<?php 
    echo '<body><main clas="container">';
    echo '<div class="row text-center bg-success mb-10"><div class="col-12">Tabla.</div></div>' ;

    /**
     * Conecto a una base de datoss de heroku
     * */    

    //if (!($conexion=mysqli_connect("us-cdbr-east-03.cleardb.com","b019e5d7c7a033","615a27bc","heroku_1ae4bba01a595f3"))) { 
    if (!($conexion=mysqli_connect("sql5.freemysqlhosting.net","sql5496827","tAee5z4mwN","sql5496827"))) { 
    //if (!($conexion=mysqli_connect("127.0.0.1","root","password","perfumeria"))) { 
        echo '<div class="row"><div class="col-12">Error conectando a la base de datos</div></div>' ;
        echo '</main></body>';  
        die(); 
    } 
     
    $res = mysqli_query($conexion,"SELECT * FROM product") or die(mysqli_error($conexion)); ;
    
    //if($res->num_rows>0) {
    //mysqli_data_seek ($res, 0); 
    
    while($reg = mysqli_fetch_array($res)){
        echo '<div class="row text-center b-10 boder-secondary border-radius border-5"><div class="col-3 bg-primary border boder-secondary  border-2">'.$reg["id"].'</div>';
        echo '<div class="col-3 bg-primary border boder-secondary  border-2">'.$reg["name"].'</div>';
        echo '<div class="col-3 bg-primary border boder-secondary  border-2">'.$reg["price"].'</div>';
        echo '<div class="col-3 bg-primary border boder-secondary  border-2">'.$reg["description"].'</div></div>';
    }
    //} else {
    //    echo '<div class="row"><div class="col-12">No hay Registros</div></div>' ;
    //}
    echo '</main></body>';
    
    mysqli_close($conexion);

?>
