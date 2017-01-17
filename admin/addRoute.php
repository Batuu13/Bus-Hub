<?php
include('../config.php');
include('layout/header.php');
if( !$admin->is_logged_in() ){ header('Location: login.php'); }
if(isset($_POST['submit']))
{
	$output = "";
	$error = 0;

	
		// db insert
		try{
		$stmt = $db->prepare('INSERT INTO route (StationID,StationOrder) VALUES (:sID,:sOrder)');
		$stmt->execute(array('sID' => $_POST['sID'],   'sOrder' => $_POST['sOrder']));
		$output = "Route added successfully!";
		
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
					<div class="panel-heading">Add Route</div>
					<div class="panel-body">
						
                        <form method="post">
                          <div class="form-group">
                            <label>StationID</label>
                            <input class="form-control" name="sID" placeholder="sID">
                          </div>
						  <div class="form-group">
                            <label>StationOrder</label>
                            <input class="form-control" name="sOrder" placeholder="sOrder">
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