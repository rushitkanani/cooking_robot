<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredients List</title>
</head>
<body>
    <form>
        <table>
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Ingredient Name</th>
                    <th>Calories</th>
                    <th>Cooking Time</th>
                    <th>Cooking Temperature</th>
                    <th>Ingredient Image</th>
            </thead>
            <tbody>
            <?php 
                require_once('connection.php');
                $query = "select * from `ingredient_table`";
                $query_run = mysqli_query($conn, $query);
                $index=1;
                while ($row = mysqli_fetch_assoc($query_run)) 
                {
                    echo "<tr>";
                    echo "<td>".$index++."</td>";
                    echo "<td>".$row['ingredient_name']."</td>";
                    echo "<td>".$row['ingredient_calories']."</td>";
                    echo "<td>".$row['ingredient_time']."</td>";
                    echo "<td>".$row['ingredient_temperature']."</td>";
                    echo "<td><img src='data:image; base64,".base64_encode($row['ingredient_photo'])."' alt=".$row['ingredient_name']." width='100px'></td>";
                    echo "</tr>";
                }
            ?>
            </tbody>

    </form>
</body>
</html>