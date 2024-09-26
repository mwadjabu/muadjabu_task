<?php
include "connect.php"; 
$id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT * FROM `post` WHERE `postid`='$id'");
$row = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Post</h2>
    <form method="POST">
        <div class="mb-3">
            <!-- Add the postid value to the hidden input -->
            <input type="hidden" class="form-control" name="postid" value="<?php echo $row['postid']; ?>">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $row['description']; ?>">
        </div>
        <div class="mb-3">
            <label for="views" class="form-label">Views:</label>
            <input type="number" class="form-control" id="views" name="views" value="<?php echo $row['views']; ?>">
        </div>
        <div class="mb-3">
            <label for="autid" class="form-label">Author:</label>
            <select name="autid" class="form-select">
            <?php
            $authors = mysqli_query($conn, "SELECT * FROM author");
            while ($author = mysqli_fetch_array($authors)) {
                // Set selected for the correct author
                $selected = ($author['autid'] == $row['autid']) ? 'selected' : '';
                echo "<option value='{$author['autid']}' $selected>{$author['fullnames']}</option>";
            }
            ?>
            </select>
        </div>
        <center>
            <input type="submit" name="button" class="btn btn-primary" value="Update">
        </center>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>

<?php
if (isset($_POST['button'])) {
    $postid = $_POST['postid'];
    $title = $_POST['title'];
    $descr = $_POST['description'];
    $views = $_POST['views'];
    $autid = $_POST['autid'];

    // Use the $postid received from the form in the WHERE clause
    $update = mysqli_query($conn, "UPDATE `post` SET `title`='$title', `description`='$descr', `views`='$views', `autid`='$autid' WHERE `postid`='$id'");

    if ($update) {
        echo "<script>
        alert('Post Updated successfully!🤣🥰');
        window.location.href='allpost.php'; 
      </script>";
    } else {
        echo "<script>
        alert('fails to update post!😪😢😢');
        window.location.href='allpost.php'; 
      </script>";
    }
}
?>
