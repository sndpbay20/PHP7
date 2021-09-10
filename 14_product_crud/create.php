  <?php
  $pdo = new PDO('mysql:host=localhost; port=3306; dbname=product_crud', 'root', '');
  $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  echo $_SERVER['REQUEST_METHOD'].'<br>';
  if($_SERVER['REQUEST_METHOD'] === 'POST'){ 

 $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $date = date('Y-m-d H:i:s');

  $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                    VALUES (:title, :image, :description, :price, :date)");
      
    $statement -> bindValue(':title', $title);
    $statement -> bindValue(':image', '');
    $statement -> bindValue(':description', $description);
    $statement -> bindValue(':price', $price);
    $statement -> bindValue(':date', $date);
    $statement-> execute();
  }

  // print_r($pdo); die();

  ?>

  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Product CRUD</title>

  </head>

  <body>
    <h1>Create new product</h1>

    <form action="" method="post">
      <div class="form-group">
        <label>Product Image</label>
        <br> 
        <input type="file" name="image">
      </div>
      <div class="form-group">
        <label>Product Title</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="form-group">
        <label>Product Description</label>
        <textarea class="form-control" name="description"></textarea>
      </div>
      <div class="form-group">
        <label>Product Price</label>
        <input type="number" step=".01" name="price" class="form-control">
      </div><br>

     <button type="submit" class="btn btn-primary">Submit</button>
    </form>

  </body>

  </html>