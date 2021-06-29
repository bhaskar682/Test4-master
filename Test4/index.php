<!DOCTYPE html>
<html>
<head>
    <title>Add Quiz</title>
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
        <h3 class="text-center">Course Planner</h3>
        <form name="add_name" id="add_name" method="post">
            <input type="submit" name="submit" value="SAVE" class="btn btn-warning" style="float:right">

            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-6">
                <input type="text" name="course" class="form-control" placeholder="Course Name" style="background-color: #ffcccb">
                
                </div>
            </div>
            <table  id="dynamic_field">
              <tr>
                <td><div><input type="text" name="lession[]" placeholder="Lession 1" class="form-control" style="position: relative;left:573px;top:10px; width:140%;background-color:#add8e6"  >
                <button type="button" id="addLession" class="btn btn-success btn-circle.btn-sm " style="position: relative;left:880px;top:-27px;border-radius: 20px" >Add</button>
           
                       
                            <input type="text" name="quiz[]"  placeholder="Quiz" class="form-control"  style="position: relative;left:610px;width:120%;background-color: #90EE90"  id="quizz" />
                            <button type="button" name="add" id="addquiz" class="btn btn-success btn-circle.btn-sm "  style="position: relative;left:880px;top:-37px;border-radius: 20px;bottom: 30px;">Add</button></div>
                        </td>
              </tr>
            </table>
          </form>
    </div>
    <br><br>
<script>
$(document).ready(function()
{
    var i = 1;

    $("#addLession").click(function(){
      i++;
      $(this).parent().after('<tr id="row'+i+'" ><td><div><input type="text" placeholder="Lession '+ i+'" name="lession[]"  class="form-control" style="position: relative;left:573px;top:10px; width:140%;background-color:#add8e6" /><button type="button" id="removebtn" class="btn btn-danger btn-circle.btn-sm "  style="position: relative;left:880px;top:-27px;border-radius: 20px" >Del</button><input type="text" name="quiz[]"  placeholder="Quiz " class="form-control"  style="position: relative;left:610px;width:120%;background-color: #90EE90"  id="quizz" /><button type="button" name="add" id="addquizz" class="btn btn-success btn-circle.btn-sm "  style="position: relative;left:880px;top:-37px;border-radius: 20px;bottom: 30px;">Add</button></div></td></tr>'); 
        
        

    });
     
     $(document).on('click','#removebtn',function(){
        $(this).parent().remove();
      
    });

    $(document).on('click','#addquizz',function(){

        $(this).after('<div><input type="text" name="quiz[]" placeholder="Quiz"  class="form-control" style="position: relative;left:610px;width:120%;background-color: #90EE90;top:10px"/></div>');
    });


    $("#addquiz").click(function(){
        $(this).after('<div><input type="text" name="quiz[]"  placeholder="Quiz" class="form-control"  style="position: relative;left:610px;width:120%;background-color: #90EE90;top:10px"/></div>');
    });






});
</script>

</body>

</html>



<?php
if(isset($_POST['submit']))
{
	$course = $_POST['course'];
	$lession = $_POST['lession'];
	$quiz = $_POST['quiz'];
	$lession_name = "";
	foreach ($lession as $value) {
		$lession_name = $lession_name.''.$value.",";
	}
	$quiz_name = "";
	foreach ($quiz as $value) {
		$quiz_name = $quiz_name.''.$value.',';
	}
	include('dbconnection.php');
	$query1 = mysqli_query($con,"INSERT INTO `course_table`(`CourseName`) VALUES('$course')");
	$course_id = mysqli_insert_id($con);
	if(!empty($course_id))
	{
		$query2 = mysqli_query($con,"INSERT INTO `lession_table`(`Lession_title`,`CourseID`) VALUES('$lession_name','$course_id')");
		$lession_id = mysqli_insert_id($con);
			if(!empty($lession_id))
			{
				$query3 = mysqli_query($con,"INSERT INTO `quiz_table`(`Quiz_title`,`LessionID`) VALUES('$quiz_name','$lession_id')");
				if($query3 == true)
				{
					echo "<script>alert('Course Added Successfully');</script>";
					echo "<script>window.location='ViewQuiz.php'</script>";
				}
				else
				{
				echo "<script>alert('Course Added Successfully');</script>";	
				}
			}
			else
			{
				header('location:index.php');
			}
	}
	else
	{
		header('location:index.php');
	}

}
?>