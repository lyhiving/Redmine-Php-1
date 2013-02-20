<?php

include 'header.php'; 

switch($_POST['req']){
	default:

?>
	<div id="content">
		<h2> New Project </h2>
		<form action="new-project.php" class="tabular" id="new_project" method="post"><div style="margin:0;padding:0;display:inline"><input name="authenticity_token" type="hidden" value="9AOUv207wqstsvk648O3XWc+jg64uIryqwIaJcnyJ2I="></div>
			<div class="box">
			
				<p><label for="project_name">Name</label><input id="name" name="name" size="60" type="text" value=""></p>
				
				
				<p>
					<label for="project_parent_id">Subproject of</label>
						<select id="project_parent_id" name="sub">
							<option value="0">None</option>
						</select>
				</p>
				
				
				<p><label for="project_description">Description</label><textarea class="tabular wiki-edit" cols="40" id="project_description" name="info" rows="5"></textarea></p>
				
				<p><label for="project_homepage">Homepage</label><input id="project_homepage" name="site" size="60" type="text" value=""></p>
				<p><label for="project_is_public">Public</label><input name="public" type="hidden" value="0"><input checked="checked" id="project_is_public" name="project[is_public]" type="checkbox" value="1"></p>
			</div>
			<input name="req" value="submit" type="hidden"/>
			<input name="commit" type="submit" value="Create"/>
			<input name="continue" type="submit" value="Create and continue"/>
	</div>
<?php
	
	break;

	case "submit":
	
//		$sql = mysql_query("INSERT INTO projects (name, sub, desc, site, public)
//					Values('$_POST[name]','$_POST[sub]','$_POST[desc]','$_POST[site]','$_POST[public]')");
					
		$sql="INSERT INTO projects (name, sub, info, site, public)
		VALUES
		('$_POST[name]','$_POST[sub]','$_POST[info]','$_POST[site]','$_POST[public]')";			

		if (!mysql_query($sql,$con)){
			echo "Error with MySQL Query: ".mysql_error();
		} else {
			echo 'it worked';
		}
	
	break;
		
}

include 'footer.php'; 

?>
