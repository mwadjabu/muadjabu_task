<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
 <center>   
<a href="form.php" style=""><button type="button" class="btn btn-primary">Add Post</button></a></center>
<table class="table table-striped" style="width:70%; margin: 50px auto;" >
  .<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Views</th>
      <th scope="col">Author Names</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "connect.php";
    $sql = mysqli_query($conn,"SELECT * FROM post INNER JOIN author ON author.autid=post.autid");
    while($row=mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td><?php echo $row['postid']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['views']; ?></td>
            <td><?php echo $row['fullnames']; ?></td>
            
        <td><a href="editpost.php ?id=<?php echo $row['postid'];?>"><button type="button" class="btn btn-primary">Edit post</button></a>
        <a href="deletepost.php ?id=<?php echo $row['postid'];?>"><button type="button" class="btn btn-danger">Delete post</button></a></td>
        </tr>
        <?php
    }
?>
  </tbody>..
</table>
</body>
</html>