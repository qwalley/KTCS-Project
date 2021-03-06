<!-- filename: pickup_view.php -->
<!-- authors: Will Alley -->
<style>
.form-heading {
	margin-bottom: 40px;
}
</style>
<div class="row">
	<div class="col-md-12">
		<h2 class="page-header">Pickup a Car:</h2>
		<?php 
			if (isset($_SESSION['user_info'])) {
				$user_info = $_SESSION['user_info'];
			}
		?>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<?php
			if ($user_info['pickup'] != '') {
				$car = $user_info['pickup'];
				echo '<h4>You reserved the '.$car['make'].' '.$car['model'].'</h4>';
			}
		?>
		<h3 class="page-header">Helpful Pickup Tips:</h3>
		<ul>
		<li>Make note of much much gas there is! You're required to leave as much gas in the car as when you found it.</li>
		<li>Check for damage! You're required to report the status of the car, so check for small scratches and dents.</li>
		<li>Check the back seat before you get in! Anyone could be laying in wait for you...</li>
		<li>Write down your access code! You won't be able to enter the car without it.</li>
		</ul>
	</div>
	<div class="col-md-6">
		<?php
			$leftPanel = 'Whoops!';
			if ($valid == 0 && $success == 0) {
				$leftPanel = '<h4 class="form-heading">Record the state of the vehicle:</h4>
							<form method="post" action="?controller=pages&action=pickup">
								<div class="form-group">
									<label for="l1">Odometer Reading:</label>
									<span class="error">'.$odometer_failed.'</span>
									<input type="number" name="odometer" class="form-control" id="l1">
								</div>
								<div class="form-group">
									<label for="l2">Status of vehicle:</label>
									<span class="error">'.$status_failed.'</span>
									<input type="text" name="status" class="form-control" id="l2">
								</div>
								<button type="submit" class="btn btn-default">Pickup!</button>
							</form>';
			}
			else if ($valid == 1 && $success == 0) {
				$leftPanel = '<p>there was a problem with the query</p>';
			}
			else if ($valid == 1 && $success == 1) {
				$leftPanel = '<h3>Pickup successful!</h3><br><h4>Drive safe out there!</h4>';
			}
			echo $leftPanel;
		?>
	</div>
</div>