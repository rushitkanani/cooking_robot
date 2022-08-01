<?php 
require_once 'connection.php';
if (isset($_POST['utensil'])){
    $utensil = $_POST["utensil"];
   
    $query = "INSERT INTO `utensils`(`utensils_name`) VALUES ('".$utensil."')";
    echo $query;

    $result = mysqli_query($conn, $query);
if ($result > 0) {
    echo "success";
}
else {
echo mysqli_error($conn);

}
}

?>


