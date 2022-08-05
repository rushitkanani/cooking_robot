<?php 
require_once('connection.php');

if(isset($_GET['add_utensil']))
{
    
    $utensil = strtoupper($_GET['utensil']);

    $query = "INSERT INTO `utensils`( `utensils_name`) VALUES ('$utensil')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo "<script> confirm('utensil Added Successfully');
        window.location.assign('ingredients.php');
        </script>";
        
    }
    else{
        echo mysqli_error($conn);
        echo "failed";
    }
}
?>


