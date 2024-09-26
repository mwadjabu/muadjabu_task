<?php
include "connect.php"; 
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM `author` WHERE `autid`='$id'");
$row = mysqli_fetch_array($sql);
?>
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
    <h2>Update Author</h2>
    <form method="POST">
        
    <div class="mb-3">
            
            <input type="hidden" class="form-control" id="title" name="id">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">FullNames:</label>
            <input type="text" class="form-control" id="title" name="fullnames" required value="<?php echo $row['fullnames']; ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Email:</label>
            <input type="email" class="form-control" id="description" name="email" required value="<?php echo $row['email']; ?>">
        </div>
        <div class="mb-3">
        <input type="submit" name="button" class="form-control btn btn-primary" value="Update">
</div>


      

    </form>
 
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
<?php
include "connect.php";

if (isset($_POST['button'])) {
    $autid = mysqli_real_escape_string($conn, $_POST['id']);
    $names = mysqli_real_escape_string($conn, $_POST['fullnames']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $update = mysqli_query($conn,"UPDATE `author` SET `autid`='$autid',`fullnames`='$names',`email`='$email' WHERE `autid`='$id')");

    if ($update) {
        echo "<script>
        alert('Aouthor Updated successfully!🤛😀🤣');
        window.location.href='allauthors.php'; 
      </script>";
        echo "";
    } else {
        echo "<script>
        alert('Fails to update author!!');
        window.location.href='addauthor.php'; 
      </script>";
    }
}
    ?>