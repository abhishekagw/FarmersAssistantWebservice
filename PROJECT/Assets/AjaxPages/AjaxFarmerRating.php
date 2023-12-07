<?php

//submit_rating.php
include("../Connection/Connection.php");
session_start();
if(isset($_POST["rating_data"]))
{

	$ins = "INSERT INTO tbl_feedbackfarmer(retailer_id,feedbackfarmer_rating,feedbackfarmer_content,review_date,farmer_id)VALUES('".$_SESSION["rid"]."','".$_POST["rating_data"]."','".$_POST["user_review"]."',curdate(),'".$_POST["farmer_id"]."')";
	if($con->query($ins))
{
	echo "Your Review & Rating Successfully Submitted";
}
else
{
	echo "Your Review & Rating Insertion Failed";
}

}
//echo $_POST['pid'];
if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM tbl_feedbackfarmer fr inner join tbl_farmer r on r.farmer_id=fr.farmer_id where fr.farmer_id = '".$_POST["pid"]."' ORDER BY feedbackfarmer_id DESC
	";
//echo $query;
	$result = $con->query($query);

	while($row = $result->fetch_assoc())
	{
		$review_content[] = array(
			'user_name'		=>	$row["farmer_name"],
			'user_review'	=>	$row["feedbackfarmer_content"],
			'rating'		=>	$row["feedbackfarmer_rating"],
			'datetime'		=>	$row["review_date"]
		);

		if($row["feedbackfarmer_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["feedbackfarmer_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["feedbackfarmer_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["feedbackfarmer_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["feedbackfarmer_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["feedbackfarmer_rating"];

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
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>