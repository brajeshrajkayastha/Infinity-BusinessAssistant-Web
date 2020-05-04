
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<div class="table-responsive">
					 <table class="table">
						 <caption>Current Events</caption>
						 <thead>
							 <tr>
							 <th>Name</th>
							 <th>Date&time</th>
							 <th>Place</th>
							 <th>Info</th>
							 </tr>
						 </thead>
						 <tbody>
						 	<?php
						 		$events = $GLOBALS['database']->SELECT_STMT("events");
						 		foreach ($events as $row) {
						 			echo "<tr>";
						 			echo "<td>".$row["EVENTNAME"]."</td>";
						 			echo "<td>".$row["DATETIME"]."</td>";
						 			echo "<td>".$row["PLACE"]."</td>";
						 			echo "<td>".$row["INFO"]."</td>";
						 		}
						 	?>
						 </tbody>
					 </table>
				</div>
			</div>
			<div class="col-md-1"></div>	
		</div>