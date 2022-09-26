<?php
$id='' ;
$title='' ; 
$description='' ;
$price='' ;
$image='';


$servername="localhost"; 
$username="root" ;
$password ="" ;
$database="ecommerce" ;

//creation connection 
$connection= new mysqli($servername,$username,$password,$database);

if ($_SERVER['REQUEST_METHOD']=='GET'){
    if (!isset($_GET["id"])){
        header("location :/e-comerce/articles.php");
        exit; 
}
           $id=$_GET["id"];
   $sql="SELECT * FROM article WHERE id=$id" ;
   $result=$connection->query($sql) ; 
   $row=$result->fetch_assoc(); 
   if (!$row){
    header("location :/e-comerce/articles.php");
    exit; 
}

$id=$row["id"] ; 
$title=$row["title"] ; 
$description= $row["description"] ;
$price =$row["price"];
$image=$row["image"]["name"];
}
else {
    $id=$_POST["id"] ; 
    $title=$_POST["product_name"] ; 
    $description= $_POST["product_description"] ;
    $price=$_POST["product_price"];
    $image=$_FILES['product_image']['name'];

   do {
    if (empty($title) || empty($description) || empty($id) || empty($price) ||empty($image )) {
        $mess[] ='please fill out all';
    }


    $sql="UPDATE  article" . "SET  title ='$title' , price ='$price' ,description='$description' ,image='$image'". 
    "WHERE id =$id" ;
    $result=$connection->query($sql) ; 
    if (!$result) {
        $errormess="invalid query " .$connection->error ; 
        break; 
    }
    else {
        $suuces="updated" ; 
        header("location:/e-comerce/articles.php");
    }
   }while(false);


}


 
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="admin.css">

    <script src="java.js"></script>
    <title>dashbord</title>
</head>

<body>


    <div class="container">
        <div class="form-container">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id; ?>">;
                <h3>ADD NEW ARTICLE</h3>
                <input type="text" placeholder="entrer product name " name="product_name" class="box">
                <input type="number" placeholder="entrer price " name="product_price" class="box">
                <input type="file" accept="image/png,image/jpeg ,image/jpg" name="product_image" class="box">
                <input type="text" placeholder="entrer description  " name="product_description" class="box">
                <?php
                if (isset($mess)) {
                    foreach ($mess as $mess) {
                        echo '<span class="message">' . $mess . '</span>';
                    }
                }
                ?>
                <input type="submit" class="btn " name="add_product" value="add   Article">
                <div class="admin-buttons">
                    <button class="admin-btn" href="articles.php"> return </button>
                    <button class="admin-btn" href="index.php"> home page </button>
                </div>
            </form>
        </div>

    </div>
    <!--Container Main end-->

</body>

</html>