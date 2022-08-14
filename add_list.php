<?php
require_once('connection.php');
    $listname = $_GET['list'];
    echo $listname;
    $query = "INSERT INTO `list`( `list_name`) VALUES ('$listname')";
    
    $query_run = mysqli_query($conn,$query);
    if($query_run)
    {
        echo "<script> confirm('List Created Successfully');
        window.location.assign('createlist.php');
        </script>";
        
    }
    else{
        echo mysqli_error($conn);
        echo "failed";
    }


?>
