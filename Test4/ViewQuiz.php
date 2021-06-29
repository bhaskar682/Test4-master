<?php
include('dbconnection.php');
$query = mysqli_query($con,"SELECT t1.CourseName, t2.Lession_title, t3.Quiz_title 
FROM course_table as t1
LEFT JOIN lession_table as t2
ON t1.ID = t2.CourseID
LEFT JOIN quiz_table as t3
ON t2.ID = t3.LessionID");



?>
<!DOCTYPE html>
<html>
<head>
	<title>View Quiz</title>
	    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
	<div class="container">
		<h1 class="text-center">Course Planner</h1>
		<hr>
		<table class="table table-dark table-hover">
			<thead>
				<tr>
					<th>SR No.</th>
					<th>Course</th>
					<th>Lession</th>
					<th>Quiz</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i =1;
				while($row = mysqli_fetch_array($query))
				{


				?>
				<tr>
					<td><?php echo $i;?></td>
					<td><?php echo $row['CourseName'];?></td>
					<td><?php echo $row['Lession_title'];?></td>
					<td><?php echo $row['Quiz_title'];?></td>
				</tr>
				<?php
				$i++;
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
