<?php
				  if (isset($_GET['id']))
	{
			$messages_id = $_GET['id'];
			echo '<form action="deletetenant.php" method="post">';
			echo '<input name="groupid" type="hidden" value="'. $messages_id . '" />';
			echo 'Are you sure you want to remove this tenant?';
			echo '<div>'.'<input name="yes" type="submit" value="Yes" /><input name="no" type="submit" value="No" />'.'</div>';
			echo '</form>';
			
	}
			?>
			