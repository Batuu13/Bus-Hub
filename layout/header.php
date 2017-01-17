<?php
include('config.php');
$showModal = 0;
if(isset($_POST['login'])){

	$id = $_POST['id'];
	$password = $_POST['password'];
	
	if($user->login($id,$password)){ 

		header('Location: index.php');
		exit;
	
	} else {
		$error[] = 'Wrong username or password.';
		$showModal = 1;
	
		
		
	}
}
?>
<!doctype html>
<html>

<head>
<link href="style/css/datepicker3.css" rel="stylesheet">

<link href="style/css/bootstrap.css" rel="stylesheet">





<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"  id="success" aria-labelledby="success">
  <div class="modal-dialog modal-sm" role="document">
   
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">You have registered</h4>
      </div>
    <div class="modal-body">
        
    <p class="">
      <b>You successfully registered!<br> Now please login.</b>
      </p>
    </div>
  </div>
</div>
</div>
<!--Register Modal -->
            <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
              <form role="form" method="post" >
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Register</h4>
                  </div>
                  <div class="modal-body">
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Name" name="name" >
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Surname" name="surname" >
                                    </div>
                                    <div class="form-group">
                                         <select name="gender" class="form-control" >
                                         <option value="0">Male</option>
                                         <option value="1">Female</option>
                                         </select>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="TC ID" name="tcid" >
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="E-Mail" name="mail" >
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Phone Number" type="number" name="phone" >
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type"password" value="">
                                    </div>
                                    <div> 
                                    </div>
                                </fieldset>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="register" class="btn btn-primary btn-lg">Register</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!--/Register Modal -->
            <!--login Modal -->
             <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                <form role="form" method="post" >
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Login</h4>
                  </div>
                  <div class="modal-body">
                     
					<?php
					
                    //check for any errors
                    if(isset($error)){
                        foreach($error as $error){
                            echo '<p class="bg-danger">'.$error.'</p>';
                        }
                    }
                    ?>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="TC ID" name="id" >
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type"password" value="">
                                    </div>
                                    <div>
                                        
                                    </div>
                                    
                                   
                                </fieldset>
                            
                  </div>
                  <div class="modal-footer">

                    <input type="submit" name="login" class="btn btn-primary btn-lg" data-toggle='modal' data-target='#login' value="Login">
                  </div>
                  </form>
                </div>
              </div>
            </div> <!--/login Modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="style/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
   function loadModal(name){
        $('#' + name).modal('show');
    };
</script>	
<?php

if(isset($_POST['register'])){
	$pass = hash("sha512",$_POST['password']);
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$tc = $_POST['tcid'];
	$gender = $_POST['gender'];
	$phone = $_POST['phone'];
	$mail = $_POST['mail'];
	$cardid = $user->createTravelCard($tc);
	try{
		$stmt = $db->prepare('INSERT INTO customer (Name,Surname,TCID,Password,Gender,Phone,Mail,TravelCardID) VALUES (:name,:surname,:tc,:pass,:gender,:phone,:mail,:tcard)');
		$stmt->execute(array('name' => $name,'surname' => $surname,'tc' => $tc,'pass' => $pass,'gender' => $gender,'phone' => $phone,'mail' => $mail,'tcard' => $cardid));
		echo"<script>
		   loadModal('success');
		</script>";
		}catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    
	}
}	
	if($showModal === 1)
	{
		
		echo"<script>
   loadModal('login');
</script>";
		}






?>

<link href="style/css/styles.css" rel="stylesheet">
<meta charset="utf-8">
</head>
<body>
<div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            
            <a class="navbar-brand" href="index.php">Bus Project</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Home</a></li>
              
             
            </ul>
            <ul class="nav navbar-nav navbar-right">
            
              <?php
			   echo "<li><a href='refticket.php'>Ref Ticket</a></li>";	
			  if($user->is_logged_in())
			  {
				    echo "<li><a>Hello, " . $user->name . "</a></li>";
					echo "<li><a href='logout.php'>Logout</a></li>";	
					  
			  }else{
					
					echo "<li><a href='#' data-toggle='modal' data-target='#login'>Login</a></li>";	
					echo "<li><a href='#' data-toggle='modal' data-target='#register'>Register</a></li>";	
			  }
			 
				
			  ?>

              
            </ul>
            
            
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>


