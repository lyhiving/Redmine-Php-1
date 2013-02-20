<?php

	include 'header.php'; 

?>

<div id="content">
	<div class="contextual">
		<a class="icon icon-add" href="new-project.php">New project</a> |
		<a href="/redmine/issues">View all issues</a> |
		<a href="/redmine/time_entries">Overall spent time</a> |
		<a href="/redmine/activity">Overall activity</a>
	</div>
	<h2> Projects </h2>
	<ul>
	<?php
	$sql = mysql_query("SELECT * FROM projects");
	while ($row = mysql_fetch_array($sql)){
		echo '
		<li class="root">
			<div class="root">
				<a href="project.php?project='. $row['name'] .'" class="project my-project">'. $row['name'] .'</a>
			</div>
		</li>
		';
	}
	?>
	</ul>
</div>

<?php

	include 'footer.php'; 

?>