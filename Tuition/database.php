 <?php

$conn = new mysqli('localhost','root','','register');
if (!$conn) {
    die("Something went wrong;");
}
else{
    echo " successful";
}

?>
