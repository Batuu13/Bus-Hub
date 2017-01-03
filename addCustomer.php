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
		$stmt = $db->prepare('INSERT INTO customer (Name,Surname,Password,Phone,Mail,Gender,TCID,TravelCardID) VALUES (:name,:surname,:pass,:phone,:mail,:gender,:TCID,:travelID)');
		$stmt->execute(array('name' => $_POST['name'],   'surname' => $_POST['surname'], 'pass' => $_POST['pass'], 'phone' => $_POST['phone'], 'mail' => $_POST['mail'], 'gender' => $_POST['gender'], 'TCID' => $_POST['TCID'], 'travelID' => $_POST['travelID'] ));
		$output = "Customer added successfully!";
		
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
					<div class="panel-heading">Add Customer</div>
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
                            <label>Password</label>
                            <input class="form-control" name="pass" placeholder="pass">
                          </div>
						  <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name="phone" placeholder="phone">
                          </div>
						  <div class="form-group">
                            <label>e-mail</label>
                            <input class="form-control" name="mail" placeholder="mail">
                          </div>
						  <div class="form-group">
                            <label>Gender</label>
                            <input class="form-control" name="gender" placeholder="gender">
                          </div>
						  <div class="form-group">
                            <label>TCID</label>
                            <input class="form-control" name="TCID" placeholder="TCID">
                          </div>
						  <div class="form-group">
                            <label>TravelCard ID</label>
                            <input class="form-control" name="travelID" placeholder="travelID">
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