<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="./style.css">
</head>
<body><div class="container mt-5">
    <h2>Add Author</h2>
    <form method="POST">
        
        <div class="mb-3">
            <label for="title" class="form-label">FullNames:</label>
            <input type="text" class="form-control" id="title" name="fullnames" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Email:</label>
            <input type="email" class="form-control" id="description" name="email" required>
        </div>
        <div class="mb-3">
        <input type="submit" name="button" class=" btn btn-primary" value="+Add">
</div>
<div class="mb-3">
        <a href="./allauthors.php"><button type="button" class="btn btn-primary">View all Authors</button></a>
        <a href="./form.php"><button type="button" class="btn btn-primary">Back</button></a>
</div>

      

    </form>
 
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
<?php
include "connect.php";

if (isset($_POST['button'])) {
    
    $names = mysqli_real_escape_string($conn, $_POST['fullnames']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    

  
    $insert = mysqli_query($conn, "INSERT INTO author (autid, fullnames, email) 
                                   VALUES (NULL, '$names', '$email')");

    if ($insert) {
        echo "<script>
        alert('Aouthor Added successfully!🤛😀🤣');
        window.location.href='allauthors.php'; 
      </script>";
        echo "";
    } else {
        echo "<script>
        alert('Fails to Insert post!!');
        window.location.href='addauthor.php'; 
      </script>";
    }
}
    ?>