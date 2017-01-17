<?php
include('../config.php');
include('layout/header.php');
if( !$admin->is_logged_in() ){ header('Location: login.php'); }

if(isset($_GET['id']))
{
	$output = "";

	
	$tableName = NULL;
	$type = $_GET['type'];
	switch($type){
		case "driver":
			$tableName = "driver";
			break;
		case "host":
			$tableName = "host";
			break;
		case "stationer":
			$tableName = "stationer";
			break;
		
		}
	
		// db insert
		try{

		$stmt = $db->prepare('DELETE FROM '. $tableName .' WHERE StaffID = :name');
		$stmt->execute(array('name' => $_GET['id']));
		$output = "Staff Added";
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
					<div class="panel-heading">Staff</div>
					<div class="panel-body">
						<!-- sadece buranin ici degisecek -->
                        <h3> Drivers </h3>
                        <table class="table table-striped">
                         <thead>
                         <tr>
                            <td><b>#</b></td>
                            <td>Name</td>
                            <td>Age</td>
                            <td>License ID</td>
                            <td> </td>
                          </tr>
                         </thead>
                         <tbody>
                         <form action="get">
                         <?php
						 
						 $stmt = $db->prepare('SELECT * FROM driver');
					     $stmt->execute();
						 $rows = $stmt->fetchAll();
						 foreach($rows as $row){
								 echo "<tr>".
								 "<td><b>".$row['StaffID']."</b></td>".
								 "<td>".$row['Name']."</td>" .
								  "<td>".$row['Age']."</td>" .
								   "<td>".$row['LicenseID']."</td>" .
								 "<td><a class='btn btn-danger pull-right' href='staffList.php?id=".$row['StaffID']."&type=driver' >Delete</a></td>".
								 "</tr>";
						}
						 ?>
                         </form>
                         </tbody>
                        </table>
                       <!-- / sadece buranin ici degisecek --> 
                       
                       <!-- sadece buranin ici degisecek -->
                        <h3> Hosts</h3>
                        <table class="table table-striped">
                         <thead>
                         <tr>
                            <td><b>#</b></td>
                            <td>Name</td>
                            <td>Age</td>
                            <td> </td>
                          </tr>
                         </thead>
                         <tbody>
                         <form action="get">
                         <?php
						 
						 $stmt = $db->prepare('SELECT * FROM host');
					     $stmt->execute();
						 $rows = $stmt->fetchAll();
						 foreach($rows as $row){
								 echo "<tr>".
								 "<td><b>".$row['StaffID']."</b></td>".
								 "<td>".$row['Name']."</td>" .
								 "<td>".$row['Age']."</td>" .
								"<td><a class='btn btn-danger pull-right' href='staffList.php?id=".$row['StaffID']."&type=host' >Delete</a></td>".
								 "</tr>";
						}
						 ?>
                         </form>
                         </tbody>
                        </table>
                       <!-- / sadece buranin ici degisecek --> 
                       
                       <!-- sadece buranin ici degisecek -->
                        <h3> Stationers </h3>
                        <table class="table table-striped">
                         <thead>
                         <tr>
                            <td><b>#</b></td>
                            <td>Name</td>
                             <td>Age</td>
                            <td> </td>
                          </tr>
                         </thead>
                         <tbody>
                         <form action="get">
                         <?php
						 
						 $stmt = $db->prepare('SELECT * FROM stationer');
					     $stmt->execute();
						 $rows = $stmt->fetchAll();
						 foreach($rows as $row){
								 echo "<tr>".
								 "<td><b>".$row['StaffID']."</b></td>".
								 "<td>".$row['Name']."</td>" .
								  "<td>".$row['Age']."</td>" .
								"<td><a class='btn btn-danger pull-right' href='staffList.php?id=".$row['StaffID']."&type=stationer' >Delete</a></td>".
								 "</tr>";
						}
						 ?>
                         </form>
                         </tbody>
                        </table>
                       <!-- / sadece buranin ici degisecek --> 
                        
                      
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
