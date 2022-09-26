<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$database = "ecommerce";

$connection = new mysqli($serverName, $userName, $password, $database);


if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'upload_img/' . $product_image;
    if (empty($product_name) || empty($product_price) || empty($product_image) || empty($product_description)) {
        $mess[] = 'please fill out all';
    } else {
        $insert = "INSERT INTO article (title,price,image,description) VALUES(' $product_name',' $product_price' , '$product_image','$product_description')";
        $upload = mysqli_query($connection, $insert);
        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $mess[] = 'new product added';
        } else {
            $mess[] = 'could not add product';
        }
    }
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
                    <button class="admin-btn" href="admin_page.php"> return </button>
                    <button class="admin-btn" href="index.php"> home page </button>
                </div>
            </form>
        </div>

    </div>
    <!--Container Main end-->

</body>

</html>