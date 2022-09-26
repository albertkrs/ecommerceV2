<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myshop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Liste of Articles</h2>
         <a class="btn btn-primary" href="admin_page.php" role="button">New Articles</a>
         <br>
         <table class="table">
            <thead>
                <tr>
                    <th>article</th>
                    <th>title</th>
                    <th>price</th>
                    <th>description</th>
                     
                </tr>
            </thead>
            <tbody>
              <?php 
              $servername="localhost"; 
              $username="root" ;
              $password ="" ;
              $database="ecommerce" ;


              //creation connection 
              $connection= new mysqli($servername,$username,$password,$database);
              //check connection
              if ($connection->connect_error) {
                die("connection failed" . $connection->connect_error);
              }
                      //read all row from database table 
                      $sql ="SELECT *FROM article";
                      $result =$connection->query($sql);
                      if(!$result) {
                        die ("invalid query:" .$connection->error);
                      }
                      //read data of eache row  
                      while ($row =$result->fetch_assoc()){
                        echo "
                        <tr>
                    <td>$row[id]</td>
                    <td>$row[title]</td>
                    <td>$row[price]</td>
                    <td>$row[description]</td>
                     
                   
                    <td>
                        <a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                        <a  class='btn btn-danger btn-sm' href='/e-comerce/delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                        ";
                      }
              ?>
                </tbody>
</table>
    </div>
    
</body>
</html>