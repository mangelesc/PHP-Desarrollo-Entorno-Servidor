<?php 
if(isset($_POST['back-button'])){
    unset($_POST['back-button']);
    header("Location: ./admin.php");
}
?>
