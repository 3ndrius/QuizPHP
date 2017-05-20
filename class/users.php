<?php
session_start();
class users {
    public $host = "localhost";
    public $username = "root";
    public $pass = "";
    public $db_name = "newquiz";
    public $conn;
    public $data;
    public $cat;
    public $qus;
    
//create costructor 
    public function __construct (){
        
       $this->conn =  new mysqli($this->host, $this->username, $this->pass, $this->db_name);
        
        if($this->conn->connect_errno) {
            die ("database connection failed - nie ma bazy ". $this->conn->connect_errno);
        }
        
    }//end of constructor
    
//create function signup
    public function signup($data) {
        
    $this->conn->query($data);
        return true;
        
    }//end of signup function
    
    
//create function sign in 
    public function signin($email,$pass) {
        
      $dbques =" SELECT email,pass from signup where email='$email' and pass='$pass'";
        
        $query = $this->conn->query($dbques);
        $query->fetch_array(MYSQLI_ASSOC);
        
        if ($query->num_rows>0) {
            $_SESSION['email']= $email;
            return true;
        }
        else {
            return false;
        }
        
    }// end of function sign in
    
    
    
//create function url    
    public function url($url) {
        
        header("Location:".$url);
    }//end of function url
    
 //start of function profile
    public function users_profile($email) {
        
       $dbques =" SELECT * from signup where email='$email' ";
        
        $query = $this->conn->query($dbques);
        $row = $query->fetch_array(MYSQLI_ASSOC);
        
        if ($query->num_rows>0) {
           
            $this->data[] = $row;
           
            
        }
        return $this->data;
       
    }//end of function profile
    
//start function category show 
    public function cat_shows() {
        
        $dbques =" SELECT * from category ";
        
        $query = $this->conn->query($dbques);
        
         while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
           
            $this->cat[] = $row;
           
            
        }
        return $this->cat;
         
    }// end of function category

// function start quiz show
    public function qus_show($qus) {
        
        
       $dbques =" SELECT * from questions where cat_id='$qus' ";
        
        $query = $this->conn->query($dbques);
        
         while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
           
            $this->qus[] = $row;
           
            
        }  
        return $this->qus;
    }// end of function quiz show
    
    
//start function check quiz
    public function answer($data) {
        
        $ans=implode("",$data);
        $right=0;
        $wrong=0;
        $no_answer = 0;
        $dbques =" SELECT id, ans from questions where cat_id='".$_SESSION['cat']."' ";
        $query = $this->conn->query($dbques);
        while ($question = $query->fetch_array(MYSQLI_ASSOC)) {
           
            if($question['ans'] == $_POST[$question['id']] ) {
                
                $right++;
            }
            elseif ($_POST[$question['id']]=="no_attempt") {
                $no_answer++;
            }
            else {
                $wrong++;
            }
        } 
        $array = array();
        $array['right']= $right;
        $array['wrong']= $wrong;
        $array['no_answer']= $no_answer;
        return $array;
     }// end of function answer
    
//start function add quiz
    function add_quiz($rec){
        $a=$this->conn->query($rec);
    }
    
    
//    public function cat_show() {
//        
//        
//    }
    
   
}// end of class users


new users;





?>