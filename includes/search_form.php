<form name="search_form" method="post" action="search.php">
    <input class='form-control' placeholder="e.g. Aaron" name="search" type="text" size="40" maxlength="60"/><br/>
    <input class="btn btn-primary" type="submit" name="submit" value="Submit" />
</form>

<?php

	//display all musician
	$musicians = $db->query("SELECT * FROM musician ORDER BY musicianID DESC LIMIT 10");
?>
	<div class="page-section">
		<h3>10 most recently added Musicians</h3>
		<table class="">
		    <tr>
		        <th>Name</th>
		        <th>Phone No</th>
		        
		    </tr>
	<?php
			while($musician = $musicians->fetch_object()){		
	?>

				<tr class="targettablerow">
					<td><a href="musician.php?id=<?= $musician->musicianID ?>"><?=$musician->name?></a></td>
		    		<td><?=$musician->phoneNo?></td>
				</tr>

	<?php
			}
	?>

		</table>
	</div>