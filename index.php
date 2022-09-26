<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="main.css" />
    <title>Document</title>
  </head>
  <body>
    <section class="home">
      <h2>Our new products</h2>
      <div class="grid">
        

        <?php 
            $serverName ="localhost";
            $userName="root";
            $password = "";
            $database ="ecommerce";

            $connection = new mysqli($serverName,$userName,$password,$database);

            if($connection->connect_errno){
                die("connection failed" .$connection->connect_error);


            }
            $sql = "SELECT * FROM article";
            $result = $connection->query($sql);

            if(!$result){
                die("inavlid query :".$connection->error);
            }

            while($row = $result->fetch_assoc()){
                echo "
                <div class='grid-item'>
            <div class='card'>
                <img src='./Upload_img/$row[image]' alt='' class='card-img'>
                <div class='card-content'>
                    <h1 class='card-header'>$row[title]</h1>
                    <p class='card-text'>
                      $row[description]
                    </p>
                    <div class='action'>
                        <h1>$row[price]</h1>
                        <button class='card-btn'>buy Now</button>
                    </div>
                  </div>
            </div>
        </div>
                ";
            }
            ?>
           
      </div>
    </section>
  </body>
</html>
