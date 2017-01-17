<?php
include('layout/header.php');
include('classes/seat.php');
// Seat_jquery -> https://github.com/mateuszmarkowski/jQuery-Seat-Charts

if(isset($_GET['tourID']))
{
	
	$sql = "SELECT TourDate,c1.Name As dep, c2.Name As arr, Price, b.BusType As busType
						 FROM tour
						 INNER JOIN station s1 ON s1.StationID = tour.DepartureStationID
						 INNER JOIN station s2 ON s2.StationID = tour.ArrivalStationID
						 INNER JOIN city c1 ON c1.CityID = s1.CityID
						 INNER JOIN city c2 ON c2.CityID = s2.CityID
						 INNER JOIN bus b ON b.BusID = tour.BusID
						 WHERE tour.TourID = :id";
						 
						 $stmt = $db->prepare($sql);
                                $stmt->execute(array('id' => $_GET['tourID']));
                                $tour = $stmt->fetch();
	$sql2 = "SELECT SeatNumber
						 FROM ticket
						 WHERE TourID = :id";
						 
						 $stmt = $db->prepare($sql2);
                                $stmt->execute(array('id' => $_GET['tourID']));
                                $seats = $stmt->fetchAll();											
        $seatstr = "";
		
		foreach($seats as $seat)
			{
				$s = Seat::GetCoor($tour['busType'],$seat['SeatNumber']);	
				$seatstr .= "'" . $s . "',";
			}
		$seatstr = rtrim($seatstr, ",");
		
		if($tour['busType'] == 1)
		{
			
			
			
			$map = "[
						'e_ee_',
						'e_ee_',
						'e_ee_',
						'e_ee_',
						'e____',
						'e_ee_',
						'e_ee_',
						'e_ee_',
						'eeee_',
					]";
		}
		else // If more bus type added, change this.
		{
			$map = "[
						'ee_ee',
						'ee_ee',
						'ee_ee',
						'ee_ee',
						'ee___',
						'ee_ee',
						'ee_ee',
						'ee_ee',
						'eeeee',
					]";
		}
		
		                        
}
else
{
 header('Location: index.php');	
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
  		<div class="row">
        	<div class="col-sm-3">
             <div class="form-group ">
             
                        <label for="exampleInputName2"><h3>Departure</h3></label>
              
               		<h3><?php echo $tour['dep']; ?> </h3>
                       
             </div>
            </div>
            <div class="col-sm-3">
             <div class="form-group">
                  
                            <label for="exampleInputName2"><h3>Destination</h3></label>
           
                 <h3><?php echo $tour['arr']; ?> </h3>
                            
                 
             </div>
            </div>
            <div class="col-sm-3" >
             <div class="form-group">
              
             <label for="exampleInputName2"><h3>Date</h3></label>
                      <h3><?php echo $tour['TourDate']; ?> </h3>
             </div>
            </div>
            <div class="col-sm-3" >
            <div class="form-group" align="left">
			    <br><br><br>
            
            </div>
            </div>
        </div>
   </form>            
  </div>
</div>
<div class="panel panel-white">
  <div class="panel-body"> 
  
  	<?php
	/*	 $stmt = $db->prepare('SELECT * 
		 FROM tour 
		 INNER JOIN station froms ON (froms.StationID == tour.DepatureStationID)
		 INNER JOIN station tos ON (tos.StationID == tour.ArrivalStationID)
		 INNER JOIN bus ON (bus.BusID == tour.BusID)
		 '); 
                                $stmt->execute();
                                $tours = $stmt->fetchAll();
                                
                                foreach ($tours as $tour)
                                {
									
                                }
								*/
	?>
    <div class="panel panel-default">
      <div class="panel-body">
      			<div class="row">
     			<div class="col-sm-4" id="seat-map" style="width: 270px;">
					<div class="front-indicator">Front</div>
					
				</div>
                <div class="col-sm-9">
                <form id="passengers" method="post" action="purchase.php">
                    <div class="row">
                      <div class="col-sm-2" align="center" >
                         <h4>Seat #</h4>
                        </div>
                        <div class="col-sm-2">
                         <label for="exampleInputName2"><h4>TC ID</h4></label>
                        </div>
                         <div class="col-sm-3">
                         <label for="exampleInputName2"><h4>Name</h4></label>
                        </div>
                        <div class="col-sm-3">
                         <label for="exampleInputName2"><h4>Surname</h4></label>
                        </div>
                        <div class="col-sm-2">
                         <h4>Price</h4>
                        </div> 
                      </div> 
                      <div id="newrows" style="min-height:50px;">
                      </div>
                      <hr> 
                      <div class="row ">
                      <div class="col-sm-3 col-md-offset-6" align="right">
                      <input type="hidden" name="totalh" id="totalh">
                      <input type="hidden" name="tourid" value="<?php echo $_GET['tourID']; ?>">
                          <p class="form-control-static input-lg">  <b>Total Cost: <span id="total">0</span></b></p>		
                          </div>
                          <div class="col-sm-3" id="test">
                            <button type="submit" class="btn btn-warning btn-lg btn-block">Purchase!</button>		
                          </div>
                      </div>              
                  </form>
                 </div>
                </div>
                
				<div class="booking-details" style="width:200px;">
                <div id="legend"></div>
					
					
					
				</div>

      </div>
    </div>
</div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

	<script src="style/js/seat.js"></script>

	<script>
	var firstSeatLabel = 1;
		
			$(document).ready(function() {
				var $cart = $('#selected-seats'),
					$passengers = $('#newrows'),
					$counter = $('#counter'),
					$totalh = $('#totalh'),
					$total = $('#total'),
					sc = $('#seat-map').seatCharts({
					map: 
						<?php echo $map; ?>
					,
					seats: {
						f: {
							price   : 100,
							classes : 'first-class', //your custom CSS class
							category: 'First Class'
						},
						e: {
							price   : <?php echo $tour['Price']; ?>,
							classes : 'economy-class', //your custom CSS class
							category: 'Economy Class'
						}					
					
					},
					naming : {
						top : false,
						getLabel : function (character, row, column) {
							return firstSeatLabel++;
						},
					},
					legend : {
						node : $('#legend'),
					    items : [
							[ 'f', 'available',   'First Class' ],
							[ 'e', 'available',   'Economy Class'],
							[ 'f', 'unavailable', 'Already Booked']
					    ]					
					},
					click: function () {
						
						if (this.status() == 'available') {
							//let's create a new <li> which we'll add to the cart items
							$("<div class='row' id='seat-"+ this.settings.id + "'>" + 
                      "<div class='form-group col-sm-2' align='center' >" + 
                         "<p class='form-control-static' style='font-size:20px;'><b>"+this.settings.label+"</b></p> " + 
						 "<input type='hidden' name='seat[]' value='"+this.settings.label+"'>"+
                        "</div> " + 
                        "<div class='form-group col-sm-2'> " + 
                       "   <input type='text' name='tc[]' class='form-control'> " + 
                       " </div> " + 
                       "  <div class='form-group col-sm-3'> " + 
                       "   <input type='text' name='name[]' class='form-control'> " + 
                       " </div> " + 
                     "   <div class='form-group col-sm-3'> " + 
                     "     <input type='text' name='surname[]' class='form-control'> " + 
                     "   </div> " + 
                     "   <div class='form-group col-sm-2'> " + 
                     "    <p class='form-control-static' style='font-size:20px;'><b>"+this.data().price+" TL</b></p>  " + 
                     "   </div>  " + 
                     " </div>").appendTo($passengers);
						
							
							$('<li>'+this.data().category+' Seat # '+this.settings.label+': <b>$'+this.data().price+'</b> <a href="#" class="cancel-cart-item">[cancel]</a></li>')
								.attr('id', 'cart-item-'+this.settings.id)
								.data('seatId', this.settings.id)
								.appendTo($cart);
							
							/*
							 * Lets update the counter and total
							 *
							 * .find function will not find the current seat, because it will change its stauts only after return
							 * 'selected'. This is why we have to add 1 to the length and the current seat price to the total.
							 */
							$counter.text(sc.find('selected').length+1);
							$total.text(recalculateTotal(sc)+this.data().price);
							document.getElementById("totalh").value = $total.text();
							return 'selected';
						} else if (this.status() == 'selected') {
							//update the counter
							$counter.text(sc.find('selected').length-1);
							//and total
							$total.text(recalculateTotal(sc)-this.data().price);
							
							//remove the item from our cart
							$('#cart-item-'+this.settings.id).remove();
							$('#seat-'+this.settings.id).remove();
							
							//seat has been vacated
							return 'available';
						} else if (this.status() == 'unavailable') {
							//seat has been already booked
							return 'unavailable';
						} else {
							return this.style();
						}
					}
				});

				//this will handle "[cancel]" link clicks
				$('#selected-seats').on('click', '.cancel-cart-item', function () {
					//let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
					sc.get($(this).parents('li:first').data('seatId')).click();
				});

				//let's pretend some seats have already been booked
				sc.get([<?php echo $seatstr; ?>]).status('unavailable');
		
		});

		function recalculateTotal(sc) {
			var total = 0;
		
			//basically find every selected seat and sum its price
			sc.find('selected').each(function () {
				total += this.data().price;
			});
			
			return total;
		}
		

	</script>	
 </div> <!-- container -->