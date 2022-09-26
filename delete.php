<?php
 if (isset($_GET["id"])){
    $id=$_GET["id"];
    $servername="localhost"; 
    $username="root" ;
    $password ="" ;
    $database="ecommerce" ;


    //creation connection 
    $connection= new mysqli($servername,$username,$password,$database);
    $sql="DELETE FROM article WHERE id=$id" ;
    $connection->query($sql);
}

header("location:/e-comerce/articles.php"); 
exit ; 
?>
 