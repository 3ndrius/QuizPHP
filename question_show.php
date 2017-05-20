<?php
include("class/users.php");

$qus = new users;
$cat = $_POST['cat'];

$qus->qus_show($cat);
$_SESSION['cat']=$cat;
//echo"<pre>";
//print_r($qus->qus);


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript"> 
     function timeOut() {
        var hours = Math.floor(timeLeft/3600);
        var minute=Math.floor((timeLeft-(hours*60*60)-30)/60); 
         
        var second=timeLeft%60;
        var hrs = checkTime(hours);
        var mint = checkTime(minute); 
        var sec = checkTime(second); 
         
         if(timeLeft<=0) {
             clearTimeout(tm);
             document.getElementById("form2").submit();
         }
         else {
             
//             if(minute<10){
//                 minute="0"+minute;
//            }
//             if(second<10) {
//                 second="0"+second;
//             }
             document.getElementById("form1").innerHTML=hrs+":"+mint+":"+sec;
         }
         timeLeft--;
         var tm =setTimeout(function(){timeOut()}, 1000)
     }
      function checkTime(msg){
          
          if(msg<10){
              msg="0"+msg;
          }
          return msg;
      }
    
     
</script>
  
</head>
<body onload="timeOut()">

<div class="container">
 <div class="col-sm-2"></div>
 <div class="col-sm-8">
  <center><h2>Online quiz</h2></center>
  
  <div class="cont" style="float:right">
  <div class="1" style="float:left">Time Left:&nbsp;&nbsp; </div>
  <div id="form1" style="float:left"> Time out :
 
<script type="text/javascript"> 
     
    var timeLeft=60*60;
    
</script>
</div>
</div>
  
  
  <form action="answer.php" method="post" id="form2">
  <?php 
     $i=1;
    foreach ($qus->qus as $question) {
 ?>
             
  <table class="table table-bordered">
    <thead >
      <tr class="danger">
        <th><?php echo " $i ";  echo $question['question']; ?></th>
      </tr>
    </thead>
    <tbody>
    <?php  if( isset($question['ans1'])) { ?>
     <span> <tr class="active">
         <th>&nbsp; 1 &nbsp;<input type="radio" value ="0" name="<?php echo $question['id']; ?>"><?php  echo "  ". $question['ans1']; ?></th>
      </tr></span>
      <?php } ?>
      
       <?php  if( isset($question['ans2'])) { ?>
      <tr class="active">
         <th > &nbsp; 2 &nbsp;<input type="radio" value="1" name="<?php echo $question['id']; ?>"> <?php  echo "  ".$question['ans2']; ?></th>
      </tr>
       <?php } ?>
       
       <?php  if( isset($question['ans3'])) { ?>
       <tr class="active">
         <th>&nbsp; 3 &nbsp;<input type="radio" value="2" name="<?php echo $question['id']; ?>">  <?php  echo "  ". $question['ans3']; ?></th>
      </tr >
       <?php } ?>
      
       <?php  if( isset($question['ans1'])) { ?>
       <tr class="active">
         <th> &nbsp; 4 &nbsp;<input type="radio" value ="3" name="<?php echo $question['id']; ?>"> <?php  echo "  ".$question['ans4']; ?></th>
      </tr>
   <?php } ?>
   
    <tr class="active">
         <th> <input type="radio" checked="checked" style="display:none" value="no_attempt" name="<?php echo $question['id']; ?>">  </th>
      </tr>
  
   
    </tbody>
    
  </table>
  <?php $i++; } ?>
  <center>  <input type="submit" value="Check" class="btn btn-success" >
</center>
    </form>
  </div>
  <div class="col-sm-2"></div>
</div>

</body>
</html>
