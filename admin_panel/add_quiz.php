<?php
extract($_POST);
include "../class/users.php";
$quiz = new users;
$question = htmlentities($question);

$option1 = htmlentities($op1);
$option2 = htmlentities($op2);
$option3 = htmlentities($op3);
$option4 = htmlentities($op4);




$array=[$option1,$option2, $option3, $option4];
$answer = array_search($ans, $array);
$query="insert into questions value('','$question', '$option1' , '$option2', '$option3' , '$option4', '$ans','$cat' )";
if($quiz->add_quiz($query)) {
  
    $quiz->url("index.php?msg=run");
   
}



?>