<?php
include('layout/header.php');
// Seat_jquery -> https://github.com/mateuszmarkowski/jQuery-Seat-Charts

if(isset($_POST['submit']))
{
	$ref = array();
	if(strlen($_POST['cardname']) < 5 || strlen($_POST['cardid']) < 10 )
	{
			$output = "Problem with the card! Purchase is not completed";
	}
	else
	{
		for($i = 0 ; $i < count($_POST['tc']) ; $i++)
		{
			$tc = $_POST['tc'][$i];
			$name = $_POST['name'][$i];
			$surname = $_POST['surname'][$i];
			$seat = $_POST['seat'][$i];
			$payment = date('yyyy-mm-dd');
			$price = $_POST['totalh'] / count($_POST['tc']);
			$tourid = $_POST['tourid'];
			$ptype = $_POST['ptype'];
			array_push($ref,strval(intval($tc) % 1000) . "". rand(100,999) . "" . $tourid);
			
			try{
				$stmt = $db->prepare('INSERT INTO ticket (TCID,SeatNumber,ReferenceNumber,PaymentDue,Price,TourID,PaymentType) VALUES (:TCID,:sNumber,:rNumber,:pDue,:price,:tID,:pType)');
				$stmt->execute(array('TCID' => intval($tc),   'sNumber' => intval($seat), 'rNumber' => $ref[$i], 'pDue' => $payment, 'price' => $price, 'tID' => $tourid, 'pType' => $ptype ));
				
				
				$stmt = $db->prepare('INSERT INTO customer (Name,Surname,TCID) VALUES (:Name,:Surname,:TCID)');
				$stmt->execute(array('Name' => $name,   'Surname' => $surname, 'TCID' => $tc));	
				$output = "Ticket added successfully!";
				
				}catch(PDOException $e) {
			//show error
			echo '<p class="bg-danger">'.$e->getMessage().'</p>';
			exit;
		
			}
		}
		
		if($_POST['ptype'] = 3)
		{
			$stmt = $db->prepare('INSERT INTO creditcard (CardName,CardNumber,TCID) VALUES (:CardName,:CardNumber,:TCID)');
			$stmt->execute(array('CardName' => $_POST['cardname'],   'CardNumber' => $_POST['cardid'], 'TCID' => $_POST['tc'][0]));	
		}
		$output = "Purchase is successfully completed";
		$success = 1;
		
		if($user->is_logged_in())
		{
			$stmt = $db->prepare('UPDATE travelcard SET Points = Points + :bonus WHERE TravelCardID = :cardid');
			$stmt->execute(array('bonus' => $_POST['cardname'],   'cardid' => $user->TravelCardID));	
		}
		
		
	}
}


?>
<style>                        
   .table-vcenter td {
   vertical-align: middle!important;
}
</style>
<link href="style/css/seat.css" rel="stylesheet">
<link href="style/css/seatstyle.css" rel="stylesheet" type="text/css" >


<div class="panel panel-white">
  <div class="panel-body"> 
   <form class="form-group-lg">
   <?php
	

		?>
        <h2> Summary </h2>
  		<div class="row">
        
        	<div class="col-sm-3">
              			<p class="form-control-static input-lg"> Departure: <b>Ankara</b></p>		
            </div>
            <div class="col-sm-3">
              			<p class="form-control-static input-lg"> Destination: <b>İzmir</b></p>		
            </div>
            <div class="col-sm-3">
              			<p class="form-control-static input-lg"> Time: <b>21:30</b></p>		
            </div>
        </div>
        <h3> Passengers </h3>
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
		
		for($i = 0 ; $i < count($_POST['tc']) ; $i++)
		{
			echo '<div class="row">
				<div class="col-sm-3">
							<p class="form-control-static input-lg">'.$_POST['name'][$i].'</p>		
				</div>
				<div class="col-sm-3">
							<p class="form-control-static input-lg">'.$_POST['surname'][$i].'</p>		
				</div>
				<div class="col-sm-3">
							<p class="form-control-static input-lg">'.$_POST['tc'][$i].'</p>		
				</div>
				<div class="col-sm-3">
							<p class="form-control-static input-lg">'.$_POST['seat'][$i].'</p>		
				</div>
			</div>';
		}
		?>
        
   </form>            
  </div>
</div>
  
  	
    <div class="panel panel-default">
      <div class="panel-body">
      
      <?php
	  if(isset($success) && $success = 1)
	  {
		  echo '<div class="alert alert-success" role="alert">' . $output . '. Your reference numbers: <b>'. implode(", ",$ref) .'</b></div>';
		}
		else
		{
			if(isset($output))
			{
				echo '<div class="alert alert-danger" role="alert">' . $output . '</div>';
			}
	  ?>
      
      			<div class="row"> 
                
     			<div class="col-sm-5" id="login">
					
					<?php
					//TODO do login
					?>
				</div>
                <div class="col-sm-7">
                     <form class="form-horizontal" method="post">
                      <?php
		
					for($i = 0 ; $i < count($_POST['tc']) ; $i++)
					{
						echo '
						<input type="hidden" name="name[]" value="'.$_POST['name'][$i].'">
						
						<input type="hidden" name="surname[]" value="'.$_POST['surname'][$i].'">
						<input type="hidden" name="tc[]" value="'.$_POST['tc'][$i].'">
						<input type="hidden" name="seat[]" value="'.$_POST['seat'][$i].'">
						';
					}
					echo '<input type="hidden" name="totalh" value="'.$_POST['totalh'].'">';
					echo '<input type="hidden" name="tourid" value="'.$_POST['tourid'].'">';
					?>
                     
                     
                     
                     
                     <h2> Total : <?php echo $_POST['totalh'] ;?> </h2>
                      <div class="form-group ">
                        <label for="inputEmail3" class="col-sm-4 control-label">Payment Type</label>
                        <div class="col-sm-6 radio">
                          <label for="inputEmail3" class=""><input type="radio" class="" id="inputEmail3" checked name="ptype" value="3"> Credit Card </label>
                        </div>
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-4 control-label">Credit Card Holder's Name</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="cardname" id="inputEmail3" placeholder="Full Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label">Credit Card Number</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="cardid"  id="inputPassword3">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-4">
                          <button type="submit" name="submit" class="btn btn-warning btn-block">Pay</button>
                        </div>
                      </div>
                    </form>
                 </div>
                </div>
                
			<?php
		}
			?>

      </div>
    </div>
	
 </div> <!-- container -->