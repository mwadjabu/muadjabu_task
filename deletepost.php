<?php 
include "connect.php";

$del = $_GET['id']; 
$delete = mysqli_query($conn, "DELETE FROM post WHERE postid='$del'");

if($delete) {
   
    echo "<script>
            alert('Post deleted successfully!');
            window.location.href='allpost.php'; 
          </script>";
} else {
   
    echo "<script>
            alert('Error deleting post!');
            window.location.href='allpost.php'; 
          </script>";
}
?>
