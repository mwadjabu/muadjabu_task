<?php
$server = "localhost";
$username = "root";
$pass = "";
$db= "hanga";
$conn= mysqli_connect("$server","$username","$pass","$db");
if($conn==true){

}
else{
    alert("connection fails");
}
?>