<?php
	
	$title = $_GET['project'];
	
	include 'header.php'; 

	if (!$_GET['project']){
		echo '<script type="text/javascript">window.location = "projects.php"</script>';
	}
	
	$sql = mysql_query("SELECT * FROM projects WHERE name='{$_GET['project']}'");
	while ($row = mysql_fetch_array($sql)){

?>

<div id="main-menu">
    <ul>
		<li><a class="overview selected" href="/projects/redmine">Overview</a></li>
		<li><a class="download" href="/projects/redmine/wiki/Download">Download</a></li>
		<li><a class="activity" href="/projects/redmine/activity">Activity</a></li>
		<li><a class="roadmap" href="/projects/redmine/roadmap">Roadmap</a></li>
		<li><a class="issues" href="/issues.php?project=<?php echo $_GET['project'] ?>">Issues</a></li>
		<li><a class="news" href="/projects/redmine/news">News</a></li>
		<li><a class="wiki" href="/projects/redmine/wiki">Wiki</a></li>
		<li><a class="boards" href="/projects/redmine/boards">Forums</a></li>
		<li><a class="repository" href="/projects/redmine/repository">Repository</a></li>
	</ul>
</div>

<div id="content">
	<h2> Overview </h2>
	<div class="splitcontentleft">
	<p><?= $row['info'] ?></p>
	</div>
	<div class="splitcontentright">
	</div>
	<?php
	}
	?>
</div>

<?php

	include 'footer.php'; 

?>