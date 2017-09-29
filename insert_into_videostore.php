<?php

include_once 'includes/config.php'; 
include_once 'includes/redirect_non_admin.php';

include_once("includes/youtube_data_API.php");


$result = "";

if(isset($_POST["videoID"], $_POST["category"])){

	$id = $_POST["videoID"];
	$category = $_POST["category"];

	try{
		$video = $youtube->getVideoInfo($id);
		if(empty($video)){
			//echo "Wrong ID or unavailable video.";
			throw new Exception("Wrong ID or unavailable video.");
		}
		$viewCount = $video->statistics->viewCount;
		$title = $video->snippet->localized->title;
		$title = str_replace("'", "", $title);

		//echo "<pre>"; print_r($video); echo "</pre>";
		if($category == "Bronze"){
			$counter = 5000;
			$price = $viewCount/50;
		}else if($category == "Silver"){
			$counter = 3000;
			$price = $viewCount/30;
		}else if($category == "Gold"){
			$counter = 1000;
			$price = $viewCount/10;
		}else if($category == "Featured"){
			$counter = 10000;
			$price = $viewCount/100;
		}

	
		$stmt = $pdo->prepare("INSERT INTO videostore (youtubeid, title, views, lastviews, counter, category, price, active) VALUES ('$id', '$title', '$viewCount', '$viewCount', '$counter','$category', '$price', 1)");
		$stmt->execute();
		echo "Successfully inserted.";
		
	}catch(Exception $e){
		echo "Something went wrong.";
	}
	
	

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'template/head.php' ?>
</head>

<body>
	<?php include_once 'template/menu.php' ?>
<div class="container">
	<h1>Videostore submission form</h1><br>
	<div class="col-sm-4">
		<form action="" method="post">
			<div class="form-group">
				<label for="videoID">Video ID:</label>
				<input type="text" class="form-control" id="videoID" name="videoID">
			</div>

			<div class="form-group">
				<label for="category">Select category:</label>
				<select class="form-control" id="category" name="category">
					<option>Bronze</option>
					<option>Silver</option>
					<option>Gold</option>
					<option>Featured</option>
				</select>
			</div>
		  	<button type="submit" class="btn btn-success">Submit</button>
		</form>
		<br>
		<p><?php echo $result; ?></p>
	</div>
</div>

</body>
</html>
<?php include_once "template/scripts.php" ?>