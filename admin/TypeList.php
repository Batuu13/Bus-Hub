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
		case "model":
			$tableName = "model";
			break;
		case "bus":
			$tableName = "bustype";
			break;
		case "payment":
			$tableName = "paymenttype";
			break;
		case "user":
			$tableName = "usertype";
			break;
		}
	
		// db insert
		try{

		$stmt = $db->prepare('DELETE FROM '. $tableName .' WHERE TypeID = :name');
		$stmt->execute(array('name' => $_GET['id']));
		$output = "Model Added";
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
					<div class="panel-heading">Types</div>
					<div class="panel-body">
						<!-- sadece buranin ici degisecek -->
                        <h3> Bus Models </h3>
                        <table class="table table-striped">
                         <thead>
                         <tr>
                            <td><b>#</b></td>
                            <td>Model Name</td>
                            <td> </td>
                          </tr>
                         </thead>
                         <tbody>
                         <form action="get">
                         <?php
						 
						 $stmt = $db->prepare('SELECT * FROM model');
					     $stmt->execute();
						 $rows = $stmt->fetchAll();
						 foreach($rows as $row){
								 echo "<tr>".
								 "<td><b>".$row['TypeID']."</b></td>".
								 "<td>".$row['Name']."</td>" .
								 "<td><a class='btn btn-danger pull-right' href='TypeList.php?id=".$row['TypeID']."&type=model' >Delete</a></td>".
								 "</tr>";
						}
						 ?>
                         </form>
                         </tbody>
                        </table>
                       <!-- / sadece buranin ici degisecek --> 
                       
                       <!-- sadece buranin ici degisecek -->
                        <h3> Payment Types</h3>
                        <table class="table table-striped">
                         <thead>
                         <tr>
                            <td><b>#</b></td>
                            <td>Payment Name</td>
                            <td> </td>
                          </tr>
                         </thead>
                         <tbody>
                         <form action="get">
                         <?php
						 
						 $stmt = $db->prepare('SELECT * FROM paymenttype');
					     $stmt->execute();
						 $rows = $stmt->fetchAll();
						 foreach($rows as $row){
								 echo "<tr>".
								 "<td><b>".$row['TypeID']."</b></td>".
								 "<td>".$row['Name']."</td>" .
								"<td><a class='btn btn-danger pull-right' href='TypeList.php?id=".$row['TypeID']."&type=payment' >Delete</a></td>".
								 "</tr>";
						}
						 ?>
                         </form>
                         </tbody>
                        </table>
                       <!-- / sadece buranin ici degisecek --> 
                       
                       <!-- sadece buranin ici degisecek -->
                        <h3> Bus Type </h3>
                        <table class="table table-striped">
                         <thead>
                         <tr>
                            <td><b>#</b></td>
                            <td>Bus Type</td>
                            <td> </td>
                          </tr>
                         </thead>
                         <tbody>
                         <form action="get">
                         <?php
						 
						 $stmt = $db->prepare('SELECT * FROM bustype');
					     $stmt->execute();
						 $rows = $stmt->fetchAll();
						 foreach($rows as $row){
								 echo "<tr>".
								 "<td><b>".$row['TypeID']."</b></td>".
								 "<td>".$row['Name']."</td>" .
								"<td><a class='btn btn-danger pull-right' href='TypeList.php?id=".$row['TypeID']."&type=bus' >Delete</a></td>".
								 "</tr>";
						}
						 ?>
                         </form>
                         </tbody>
                        </table>
                       <!-- / sadece buranin ici degisecek --> 
                        
                       <!-- sadece buranin ici degisecek -->
                        <h3> User Type </h3>
                        <table class="table table-striped">
                         <thead>
                         <tr>
                            <td><b>#</b></td>
                            <td>User Type</td>
                            <td> </td>
                          </tr>
                         </thead>
                         <tbody>
                         <form action="get">
                         <?php
						 
						 $stmt = $db->prepare('SELECT * FROM usertype');
					     $stmt->execute();
						 $rows = $stmt->fetchAll();
						 foreach($rows as $row){
								 echo "<tr>".
								 "<td><b>".$row['TypeID']."</b></td>".
								 "<td>".$row['Name']."</td>" .
								"<td><a class='btn btn-danger pull-right' href='TypeList.php?id=".$row['TypeID']."&type=user' >Delete</a></td>".
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
