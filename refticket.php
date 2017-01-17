<?php
include('layout/header.php');
?>

<div class="panel panel-gray">
  <div class="panel-body"> 
    	<div class="row"> <!-- Row -->
          <div class="col-sm-12"> <!-- Places -->
          
          <form class="form-vertical"  method="post">
  			<div class="form-group">
          		<div class="row"> <!-- From -->
                
                    <div class="col-sm-6">
                    
                     <input type="text" name="ref" class="form-control input-lg" placeholder="Reference Number">
                     
                     </div>
                     <div class="col-sm-6">
                     <input type="submit" class="btn btn-primary btn-block btn-lg" value="Find" name="submit">
                     </div>
                </div> 
                </div>
          </form><!-- From -->
        </div> <!-- Row -->
  </div>
</div>
 <?php
   
   if(isset($_POST['submit']) && isset($_POST['ref']))
   {
	$stmt = $db->prepare('SELECT ticket.TCID as TCID,SeatNumber,tour.DepartureTime as DepartureTime,c1.Name As dep, c2.Name As arr, customer.Name as cName, customer.Surname as cSurname  
			FROM ticket 
			INNER JOIN tour ON tour.TourID = ticket.TourID 
			INNER JOIN customer ON customer.TCID = ticket.TCID
			INNER JOIN station s1 ON s1.StationID = DepartureStationID
			INNER JOIN station s2 ON s2.StationID = ArrivalStationID
			INNER JOIN city c1 ON c1.CityID = s1.CityID
			INNER JOIN city c2 ON c2.CityID = s2.CityID
			WHERE ReferenceNumber = :ref');
			$stmt->execute(array('ref' => $_POST['ref']));
			$row = $stmt->fetch();

		?>
 </div>
<div class="panel panel-white">
  <div class="panel-body"> 
   <form class="form-group-lg">
  
        <h2> Summary </h2>
  		<div class="row">
        
        	<div class="col-sm-3">
              			<p class="form-control-static input-lg"> Departure: <b><?php  echo $row['dep']; ?></b></p>		
            </div>
            <div class="col-sm-3">
              			<p class="form-control-static input-lg"> Destination: <b><?php  echo $row['arr']; ?></b></p>		
            </div>
            <div class="col-sm-3">
              			<p class="form-control-static input-lg"> Time: <b> <?php  echo $row['DepartureTime']; ?></b></p>		
            </div>
        </div>
        <h3> Passenger </h3>
        <div class="row">
        	<div class="col-sm-3">
              			<p class="form-control-static input-lg"><b>Name</b></p>		
            </div>
            <div class="col-sm-3">
              			<p class="form-control-static input-lg"><b>Surname</b></p>		
            </div>
            <div class="col-sm-3">
              			<p class="form-control-static input-lg"><b>TC ID</b></p>		
            </div>
            <div class="col-sm-3">
              			<p class="form-control-static input-lg"><b>Seat No</b></p>		
            </div>
        </div>
        <?php
		
		echo '<div class="row">
				<div class="col-sm-3">
							<p class="form-control-static input-lg">'.$row['cName'].'</p>		
				</div>
				<div class="col-sm-3">
							<p class="form-control-static input-lg">'.$row['cSurname'].'</p>		
				</div>
				<div class="col-sm-3">
							<p class="form-control-static input-lg">'.$row['TCID'].'</p>		
				</div>
				<div class="col-sm-3">
							<p class="form-control-static input-lg">'.$row['SeatNumber'].'</p>		
				</div>
			</div>';
		
		?>
        
   </form>            
  </div>
</div>
<?php
   }
?>