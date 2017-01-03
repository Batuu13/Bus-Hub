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
		$stmt = $db->prepare('INSERT INTO bus (Plate,Capacity,BusType,Model) VALUES (:plate,:capacity,:BusType,:Model)');
		$stmt->execute(array('plate' => $_POST['plate'],   'capacity' => $_POST['capacity'], 'BusType' => $_POST['BType'], 'Model' => $_POST['Model'] ));
		$output = "Bus added successfully!";
		
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
					<div class="panel-heading">Add Bus</div>
					<div class="panel-body">
						
                        <form method="post">
                          <div class="form-group">
                            <label>Plate</label>
                            <input class="form-control" name="plate" placeholder="plate">
                          </div>
						  <div class="form-group">
                            <label>Capacity</label>
                            <input class="form-control" name="capacity" placeholder="capacity">
                          </div>
						  <div class="form-group">
                            <label>BusType</label>
                            <input class="form-control" name="BType" placeholder="BType">
                          </div>
						  <div class="form-group">
                            <label>Model</label>
                            <input class="form-control" name="Model" placeholder="Model">
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