<?php
include('layout/header.php');
?>
<link href="style/css/datepicker3.css" rel="stylesheet">
<link href="style/css/styles.css" rel="stylesheet">
<div class="container-fluid" style="width:70%;height:500px;">
<div class="panel panel-orange">
  <div class="panel-body"> 
    	<div class="row"> <!-- Row -->
          <div class="col-sm-6" > <!-- Places -->
          
          <form class="form-vertical" style="margin-left:40px; ">
  			<div class="form-group">
          		<div class="row"> <!-- From -->
                    <div class="input-group input-group-lg">
                    <label for="inputEmail3" class="col-sm-2 control-label">Departure</label>
                      <select class="form-control input-lg" style="min-width:250px;">...</select>
                    </div>
                </div> 
           
                <div class="row"> <!-- To -->
                    <div class="input-group input-group-lg">
                    <label for="inputEmail3" class="col-sm-2 control-label">Destination</label>
                      <select class="form-control input-lg" style="min-width:250px;max">...</select>
                    </div>
                </div> <!-- To -->
              </div>
           </form><!-- From -->
          </div> <!-- Places -->
          <div class="col-sm-6"> <!-- Date -->
                     <div class="panel panel-blue">
					
					<div class="panel-body">
						<div id="calendar"></div>
					</div>
				</div>
          </div> <!-- Date -->
        </div> <!-- Row -->
  </div>
</div>
</div>
	<script src="style/js/jquery-1.11.1.min.js"></script>
	<script src="style/js/bootstrap.min.js"></script>
<script src="style/js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	