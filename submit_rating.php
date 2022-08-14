<?php
require_once('connection.php');

if(isset($_POST["rating_data"]))
{

	$rating = $_POST["rating_data"];
	$user_id = $user_id;
	$user_review = $_POST["user_review"];
	$receipe_id = $_POST['receipe_id'];

	$sql = "SELECT * FROM `rating_table` WHERE `user_id` = $user_id AND `recipe_id` = $receipe_id";
	$q = mysqli_query($conn, $sql);
	if(mysqli_num_rows($q) > 0){
		$row = mysqli_fetch_assoc($q);
		$sql1 = "UPDATE `rating_table` SET `user_message`='$user_review' WHERE rating_id=".$row['rating_id'];
		$q1 = mysqli_query($conn, $sql1);
	}else{
		$query = "INSERT INTO `rating_table`(`user_id`, `recipe_id`, `user_message`, `user_rating`) 
			VALUES ('$user_id','$receipe_id','$user_review','$rating')";

		$q = mysqli_query($conn, $query);
		if($q){
			echo "Rating added";
		}
	}
}

if(isset($_POST["action"]))
{
	$receipe_id = $_POST['receipe_id'];
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = " SELECT * FROM `rating_table` WHERE recipe_id = $receipe_id";
	$queryy = mysqli_query($conn,$query);
	//echo $query;
	while($row = mysqli_fetch_assoc($queryy))
	{
		// $review_content[] = array(
		// 	'user_name'		=>	$row["user_name"],
		// 	'user_review'	=>	$row["user_review"],
		// 	'rating'		=>	$row["user_rating"],
			
		// );

		if($row["user_rating"] == 5)
		{
			$five_star_review++;
		}

		if($row["user_rating"] == 4)
		{
			$four_star_review++;
		}

		if($row["user_rating"] == 3)
		{
			$three_star_review++;
		}

		if($row["user_rating"] == 2)
		{
			$two_star_review++;
		}

		if($row["user_rating"] == 1)
		{
			$one_star_review++;
		}

		$total_review++;
		$total_user_rating = $total_user_rating + $row["user_rating"];
	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		//'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>