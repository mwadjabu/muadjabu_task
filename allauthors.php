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
<a href="addauthor.php" style=""><button type="button" class="btn btn-primary">Add Author</button></a></center>
<table class="table table-striped" style="width:70%; margin: 50px auto;" >
  .<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fullnames</th>
      <th scope="col">Email</th>
     
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "connect.php";
    $sql = mysqli_query($conn,"SELECT * FROM author");
    while($row=mysqli_fetch_array($sql)){
        ?>
        <tr>
            <td><?php echo $row['autid']; ?></td>
            <td><?php echo $row['fullnames']; ?></td>
            <td><?php echo $row['email']; ?></td>
          
            
        <td><a href="editauthor.php ?id=<?php echo $row['autid'];?>"><button type="button" class="btn btn-primary">Edit author</button></a>
        <a href="deleteauthor.php ?id=<?php echo $row['autid'];?>"><button type="button" class="btn btn-danger">Delete author</button></a></td>
        </tr>
        <?php
    }
?>
  </tbody>..
</table>
</body>
</html>