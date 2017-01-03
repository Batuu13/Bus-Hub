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
		$stmt = $db->prepare('INSERT INTO ticket (TourDate,DepartureTime,DepartureStationID,ArrivalStationID,RouteID,BusID) VALUES (:tDate,:dtime,:dstatID,:astatID,:rID,:bID)');
		$stmt->execute(array('tDate' => $_POST['tDate'],   'dtime' => $_POST['dtime'], 'dstatID' => $_POST['dstatID'], 'astatID' => $_POST['astatID'], 'rID' => $_POST['rID'], 'bID' => $_POST['bID'] ));
		$output = "Tour added successfully!";
		
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
					<div class="panel-heading">Add Tour</div>
					<div class="panel-body">
						
                        <form method="post">
                          <div class="form-group">
                            <label>TourDate</label>
                            <input class="form-control" name="tDate" placeholder="tDate">
                          </div>
						  <div class="form-group">
                            <label>DepartureTime</label>
                            <input class="form-control" name="dtime" placeholder="dtime">
                          </div>
						  <div class="form-group">
                            <label>DepartureStationID</label>
                            <input class="form-control" name="dstatID" placeholder="dstatID">
                          </div>
						  <div class="form-group">
                            <label>ArrivalStationID</label>
                            <input class="form-control" name="astatID" placeholder="astatID">
                          </div>
						  <div class="form-group">
                            <label>RouteID</label>
                            <input class="form-control" name="rID" placeholder="rID">
                          </div>
						  <div class="form-group">
                            <label>BusID</label>
                            <input class="form-control" name="bID" placeholder="bID">
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