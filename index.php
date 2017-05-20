<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
</head>
<body>
<br>
<br>
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="panel panel-danger">
    <div class="panel-heading"> QUIZ </div>
    <div class="panel-body"> PHP</div>
</div>
</div>
</div>
</div>

<br>


<div class="container">
<div class="row">
 <div class="col-sm-6"> 
  
   <div class="panel panel-info">
    <div class="panel-heading"> <h2>Login Form</h2> </div>
    <div class="panel-body">
    <?php  
        if (isset($_GET['run']) and $_GET['run']== "failed") {
            
            echo "Your email or password is not correct ! ";
        }
         ?>
    
  <form method="post" action="signin_sub.php" >
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name = "e" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name = "p" placeholder="Enter password">
    </div>
    
    <button type="submit" class="btn btn-danger">Submit</button>
  </form>
  </div>
  </div>
  </div>
  
  <div class="col-sm-6"> 
  
  <div class="panel panel-info">
    <div class="panel-heading"> <h2>Signup Form</h2> </div>
    <div class="panel-body">
    <?php  if (isset($_GET['run']) and $_GET['run']=="success"){ 
        echo "Registration successfully ! ";
        }
    ?>
    
  <form  method="post" action="signup_sub.php" enctype="multipart/form-data" >
  
   
    <div class="form-group">
     
      <label for="name">Name</label>
      <input type="text" class="form-control" name="n" id="name" placeholder="Enter name">
    </div>
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="e" id="email" placeholder="Enter email">
    </div>
    
   <div class="form-group">
		<label for="pwd">Password: </label>
		 <input type="password" class="form-control" name="p" id="pwd" >
		 </div>
    
    <div class="form-group">
	 <label for="pwd">Upload your iamge</label>
	<input type="file" class="form-control" name="img" >
</div>
    
    <button type="submit" class="btn btn-danger">Submit</button>
  </form>
  </div>
  </div>
  </div>
</div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
