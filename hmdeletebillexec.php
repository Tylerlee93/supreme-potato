<?php
				  if (isset($_GET['id']))
	{
			$messages_id = $_GET['id'];
			echo '<form action="hmdeletebill.php" method="post">';
			echo '<input name="groupid" type="hidden" value="'. $messages_id . '" />';
			echo '<input type="hidden" class="ed" name="group" value="'. $_COOKIE['b'] .'" readonly>';
			
			echo 'Are you sure you want to delete this bill?';
			echo '<div>'.'<input name="yes" type="submit" value="Yes" /><input name="no" type="submit" value="No" />'.'</div>';
			echo '</form>';
			
	}
			?>
			