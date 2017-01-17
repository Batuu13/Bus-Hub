<?php
include('../config.php');
include('layout/header.php');
if( !$admin->is_logged_in() ){ header('Location: login.php'); }

if(isset($_GET['id']))
{
	$output = "";

		// db insert
		try{

		$stmt = $db->prepare('DELETE FROM tour WHERE TourID = :name');
		$stmt->execute(array('name' => $_GET['id']));
		$output = "Tour Deleted";
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
					<div class="panel-heading">Tours</div>
					<div class="panel-body">
						<!-- sadece buranin ici degisecek -->
                        <table class="table table-striped">
                         <thead>
                         <tr>
                            <td><b>#</b></td>
                            <td>From</td>
                            <td>To</td>
                            <td>Date</td>
                            <td>Time</td>
                            <td>Plate</td>
                            <td> </td>
                          </tr>
                         </thead>
                         <tbody>
                         <form action="get">
                         <?php
						 $sql = "SELECT *,c1.Name As dep, c2.Name As arr, b.Plate As Plate
						 FROM tour
						 INNER JOIN station s1 ON s1.StationID = tour.DepartureStationID
						 INNER JOIN station s2 ON s2.StationID = tour.ArrivalStationID
						 INNER JOIN city c1 ON c1.CityID = s1.CityID
						 INNER JOIN city c2 ON c2.CityID = s2.CityID
						 INNER JOIN bus b ON b.BusID = tour.BusID";
						 
						 
						 $stmt = $db->prepare($sql);
					     $stmt->execute();
						 $rows = $stmt->fetchAll();
						 foreach($rows as $row){
								 echo "<tr>".
								 "<td><b>".$row['TourID']."</b></td>".
								 "<td>".$row['dep']."</td>" .
								 "<td>".$row['arr']."</td>" .
								  "<td>".$row['TourDate']."</td>" .
								   "<td>".$row['DepartureTime']."</td>" .
								   "<td>".$row['Plate']."</td>".
								 
								 "<td><a class='btn btn-danger pull-right' href=tourList.php?id=".$row['TourID']."' >Delete</a></td>".
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
