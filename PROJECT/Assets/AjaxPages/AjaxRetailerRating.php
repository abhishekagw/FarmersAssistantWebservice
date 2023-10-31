<?php

//submit_rating.php
include("../Connection/Connection.php");
session_start();
if(isset($_POST["rating_data"]))
{

	$ins = "INSERT INTO tbl_feedbackretailer(farmer_id,feedbackretailer_rating,feedbackretailer_content,review_date,retailer_id)VALUES('".$_SESSION["fid"]."','".$_POST["rating_data"]."','".$_POST["user_review"]."',curdate(),'".$_POST["retailer_id"]."')";
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
	SELECT * FROM tbl_feedbackretailer fr inner join tbl_retailer r on r.retailer_id=fr.retailer_id where fr.retailer_id = '".$_POST["pid"]."' ORDER BY feedbackretailer_id DESC
	";
//echo $query;
	$result = $con->query($query);

	while($row = $result->fetch_assoc())
	{
		$review_content[] = array(
			'user_name'		=>	$row["retailer_name"],
			'user_review'	=>	$row["feedbackretailer_content"],
			'rating'		=>	$row["feedbackretailer_rating"],
			'datetime'		=>	$row["review_date"]
		);

		if($row["feedbackretailer_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["feedbackretailer_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["feedbackretailer_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["feedbackretailer_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["feedbackretailer_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["feedbackretailer_rating"];

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