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
		$stmt = $db->prepare('INSERT INTO creditcard (CardName,CardNumber,ExpirationDate,SecurityNumber,TCID) VALUES (:cName,:cNum,:eDate,:TCID)');
		$stmt->execute(array('cName' => $_POST['cName'],   'cNum' => $_POST['cNum'], 'eDate' => $_POST['eDate'], 'TCID' => $_POST['TCID'] ));
		$output = "Credit Card added successfully!";
		
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
					<div class="panel-heading">Add Credit Card</div>
					<div class="panel-body">
						
                        <form method="post">
                          <div class="form-group">
                            <label>Card Name</label>
                            <input class="form-control" name="cName" placeholder="cName">
                          </div>
						  <div class="form-group">
                            <label>Card Number</label>
                            <input class="form-control" name="cNum" placeholder="cNum">
                          </div>
						  <div class="form-group">
                            <label>Expiration Date</label>
                            <input class="form-control" name="eDate" placeholder="eDate">
                          </div>
						  <div class="form-group">
                            <label>Security Number</label>
                            <input class="form-control" name="secNum" placeholder="secNum">
                          </div>
						  <div class="form-group">
                            <label>TCID</label>
                            <input class="form-control" name="TCID" placeholder="TCID">
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