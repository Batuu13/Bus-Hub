<?php
include('../config.php');
include('layout/header.php');
if( !$admin->is_logged_in() ){ header('Location: login.php'); }
if(isset($_POST['submit']))
{
	$output = "";
	$error = 0

	
		// db insert
		try{
		$stmt = $db->prepare('INSERT INTO users (Name,Surname,Gender,UserType,Password) VALUES (:name,:surname,:gender,:uType,:pass)');
		$stmt->execute(array('name' => $_POST['name'],   'surname' => $_POST['surname'], 'gender' => $_POST['gender'], 'uType' => $_POST['uType'], 'pass' => $_POST['pass']));
		$output = "User added successfully!";
		
		}catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;

	}
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<?php
		if(isset($_POST['submit']))
		{
			if($error == 1)
			{
				echo '<div class="alert alert-danger" role="alert">'.$output.'</div>';
			}
			else
			{
				echo '<div class="alert alert-success" role="alert">'.$output.'</div>';
			}
		}
		?>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Add User</div>
					<div class="panel-body">
						
                        <form method="post">
                          <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="name">
                          </div>
						  <div class="form-group">
                            <label>Surname</label>
                            <input class="form-control" name="surname" placeholder="surname">
                          </div>
						  <div class="form-group">
                            <label>Gender</label>
                            <input class="form-control" name="gender" placeholder="gender">
                          </div>
						  <div class="form-group">
                            <label>UserType</label>
                            <input class="form-control" name="uType" placeholder="uType">
                          </div>
						   <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="pass" placeholder="pass">
                          </div>
                          <button type="submit" class="btn btn-default" name="submit">Submit</button>
                        </form>
                        
					</div>
				</div>
			</div>
		</div><!--/.row-->
			
            
            
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script src="../style/js/jquery-1.11.1.min.js"></script>
	<script src="../style/js/bootstrap.min.js"></script>	
</body>

</html>