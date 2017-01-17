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
		$stmt = $db->prepare('INSERT INTO ticket (TCID,SeatNumber,ReferenceNumber,PaymentDue,Price,TourID,PaymentType) VALUES (:TCID,:sNumber,:rNumber,:pDue,:price,:tID,:pType)');
		$stmt->execute(array('TCID' => $_POST['TCID'],   'sNumber' => $_POST['sNumber'], 'rNumber' => $_POST['rNumber'], 'pDue' => $_POST['pDue'], 'price' => $_POST['price'], 'tID' => $_POST['tID'], 'pType' => $_POST['pType'] ));
		$output = "Ticket added successfully!";
		
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
					<div class="panel-heading">Add Ticket</div>
					<div class="panel-body">
						
                        <form method="post">
                          <div class="form-group">
                            <label>TCID</label>
                            <input class="form-control" name="TCID" placeholder="TCID">
                          </div>
						  <div class="form-group">
                            <label>SeatNumber</label>
                            <input class="form-control" name="sNumber" placeholder="sNumber">
                          </div>
						  <div class="form-group">
                            <label>ReferenceNumber</label>
                            <input class="form-control" name="rNumber" placeholder="rNumber">
                          </div>
						  <div class="form-group">
                            <label>PaymentDue</label>
                            <input class="form-control" name="pDue" placeholder="pDue">
                          </div>
						  <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" name="price" placeholder="price">
                          </div>
						  <div class="form-group">
                            <label>TourID</label>
                            <input class="form-control" name="tID" placeholder="tID">
                          </div>
						  <div class="form-group">
                            <label>PaymentType</label>
                            <input class="form-control" name="pType" placeholder="pType">
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