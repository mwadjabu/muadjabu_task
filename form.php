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
    <center><h2>Add Post</h2></center>
    <form method="POST">
        
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="mb-3">
            <label for="views" class="form-label">Views</label>
            <input type="number" class="form-control" id="views" name="views">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Author</label>
           <select name="autid" id=""  class="form-control">
            <?php
            include "connect.php";
            $sql = mysqli_query($conn,"SELECT * FROM author");
            while($row=mysqli_fetch_array($sql)){
                ?>
                <option value=<?php echo $row['autid'];?> >
                <?php echo $row['fullnames'];?>
                </option>
                <?php
            }
            ?>
           </select>
        </div>
        <div class="mb-3">
        <input type="submit" name="button" class="btn btn-primary">
        </div>
        <div class="mb-3">
        <a href="./allpost.php"><button type="button" class="btn btn-primary">View all post</button></a>
        <a href="./addauthor.php"><button type="button" class="btn btn-primary">Add Author</button></a>
        <a href="./addreview.php"><button type="button" class="btn btn-primary">Add Review</button></a>
        </div>
    </form>
 
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
<?php
include "connect.php";

if (isset($_POST['button'])) {
    
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $descr = mysqli_real_escape_string($conn, $_POST['description']);
    $views = mysqli_real_escape_string($conn, $_POST['views']);
    $autid = mysqli_real_escape_string($conn, $_POST['autid']);

  
    $insert = mysqli_query($conn, "INSERT INTO post (postid, title, description, views, autid) 
                                   VALUES (NULL, '$title', '$descr', '$views', '$autid')");

    if ($insert) {
        echo "<script>
        alert('Post inserted successfully!');
        window.location.href='allpost.php'; 
      </script>";
        echo "";
    } else {
        echo "<script>
        alert('Fails to Insert post!!');
        window.location.href='allpost.php'; 
      </script>";
    }
}
    ?>