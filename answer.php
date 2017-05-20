<?php
include("class/users.php");

$ans = new users;
$answer = $ans->answer($_POST);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
 <center>
                <h2> Right answers: <?php echo $answer['right']; ?></h2>
                <h2> Wrong answers: <?php echo $answer['wrong']; ?></h2>
                <h2> No attempts : <?php echo $answer['no_answer']; ?></h2>
                </center>
  
  <?php $total_qus= $answer['right']+$answer['wrong']+$answer['no_answer']; 
        $attempt_qus =  $answer['right']+$answer['wrong'];
        $right = $total_qus - ($answer['wrong']+ $answer['no_answer']);
        $wrong = $total_qus - ($answer['right']+ $answer['no_answer']);
        $no_answer = $total_qus -($answer['wrong']+ $answer['right']);
    ?>
  
  
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
            
            
           <center> <h2>Your quiz result </h2></center>
            <table class="table table-bordered">
            <thead >
                  <tr class="danger">
                <th>Total number of Question</th> <th><?php echo $total_qus; ?></th>
                  </tr>
            </thead>
            <tbody>
   
            <tr class="active">
                         <th>Attempts </th>
                         <th><?php echo $attempt_qus; ?> </th>
            </tr>
             <tr class="active">
                         <th>Right answer</th>
                         <th><?php echo $right; ?> </th>
            </tr>
            
             <tr class="active">
                         <th>Wrong answer </th>
                         <th><?php echo $wrong; ?> </th>
            </tr>
            
              <tr class="active">
                         <th>No answer </th>
                         <th><?php echo $no_answer; ?> </th>
            </tr>
            
             <tr class="active">
                         <th>Total score [%] </th>
                         <th><?php 
                             $per = ($right*100)/$total_qus;
                             $per1 = round($per);
                             echo $per1." [ % ]"
                             
                             ?> </th>
            </tr>
             
              </tbody>
            </table>
            
    
            
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
       
   
  
</html>