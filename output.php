<?php
$servername ="localhost";
$username = "root";
$password ="";
$dbname="tech_jenga";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// else echo 'connected';
$round=$_POST['round'];
$question="";
$answer="";
// echo $round;
if($round==1)
{
$var=rand(0,5);
echo $var;
$sql = "select * from tech_jenga where type ='easy' and id='$var'";
$result=mysqli_query($conn, $sql);
$resultCheck=mysqli_num_rows($result);
if ($resultCheck > 0) {
	while($row = $result->fetch_assoc()) {
	$question=$row['question'];
	$answer=$row['answer'];}
}
}
else if($round==2)
{
	$var=rand(6,12);
	$sql = "select * from tech_jenga where type ='medium' and id='$var'";
$result=mysqli_query($conn, $sql);
$resultCheck=mysqli_num_rows($result);
if ($resultCheck > 0) {
	while($row = $result->fetch_assoc()) {
	$question=$row['question'];
	$answer=$row['answer'];
}}

}
else{
$var=rand(12,20);
$sql = "select * from tech_jenga where type ='difficult' and id='$var'";
$result=mysqli_query($conn, $sql);
$resultCheck=mysqli_num_rows($result);
if ($resultCheck > 0) {
	while($row = $result->fetch_assoc()) {
	$question=$row['question'];
	$answer=$row['answer'];
}}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>OUTPUT QUESTIONS</title>
	<style>body {
    background: black;
}

header {
    background: rgb(241, 179, 20);
}

.heading {
    flex-grow: 4;
    line-height: 150px;
    text-align: center;
    font-size: 85px;
    font-family: 'Jokerman';
}

.container {
    background: rgb(110, 17, 17);
}

.question {
    font-size: 40px;
    color: white;
    font-family: 'Monotype Corsiva';
}

.question p {
    text-align: center;
    top: 35%;
    width: 100%;
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
                <p><b> <?php echo $question ;?> </b> </p>
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
