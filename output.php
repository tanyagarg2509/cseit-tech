<?php
$servername ="localhost";
$username = "root";
$password ="";
$dbname="tech_jenga";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
// $round=$_POST['round'];
$question="";
$answer="";
// echo $round;

// $var=rand(1,20);
$sql = "select * from output_question";
$result=mysqli_query($conn, $sql);

$resultCheck=mysqli_num_rows($result);
if ($resultCheck > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	$question=$row['question'];
	$answer=$row['answer'];
	
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>OUTPUT QUESTIONS</title>
	<style>
	
body {
    background: black;
}

header {
    background: rgb(241, 179, 20);
}

.heading {
    
    line-height: 150px;
    text-align: center;
    font-size: 85px;
    font-family: 'Jokerman';
}

.box1 {
    background: rgb(110, 17, 17);
}

.question {
    font-size:14px;
	color: white;
	width:400px;
	height:100%;
	overflow: auto;
    font-family: 'Monotype Corsiva';
}

.question p {
   
    /* top: 35%; */
   
}
</style>
</head>
<body>
<?php 
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if(isset($_POST['answer_by_user']))
				{
					$output=$_POST['answer_by_user'];
					if($answer==$output){
						echo 'alert(successfull)';
					}
					
				}
			}
			
			?>
<header>
<div class="heading">
            OUTPUT QUESTIONS
        </div>
    </header>

    <div class="container">
        <div class="box1">
            <div class="question">
                Question :<?php echo $question ;?>
			</div>
			<div class="output">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="output" method="POST">
				<textarea rows ="8" cols = "60" name = "answer_by_user" placeholder="Enter the OUTPUT"></textarea>
				<br>
				<br>
				<input type="submit" name="submit" value="SUBMIT">
			</form>
			
			</div>
        </div>
</div>
</body>
</html>
