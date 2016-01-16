<?php ?>
<link rel="stylesheet" type="text/css" href="libraries/css/reg-acc.css">
<script scr="libraries/js/regScript.js"></script>
<?php 

if(isset($_GET['password'])){
	if($_GET['password'] == 'recover'){
		echo '<form class="form" action="" method="POST">
				<ul>
					<li><input class="input" type="email" placeholder="email" name="email></li>
					<li><input type="submit" class="submit-button" value="RECOVER"></li>
				</ul>
			</form>';
	}
	else{
		echo '<form class="form" onSubmit="return isPassEqual()" action="" method="POST">
				<ul>
					<li><input class="input" type="password" placeholder="old password" name="old-password"> </li>
					<li><span id="pass-err"></span></li>		
					<li><input class="input" type="password" placeholder="new password" name="new-password" id="pass1"> </li>
					<li><input class="input" type="password" placeholder="new password" name="new-password" id="pass2"> </li>
					<li><input type="submit" class="submit-button" value="Confirm"></li>
				</ul>
			</form>';
	}
}
else{
	echo 'UPS! No page!';
}

?>



<!-- <form class="form" action="" method="POST">
	<ul>
		<li><input class="input" type="email" placeholder="email" name="name"> </li>
		<li><input type="submit" class="submit-button" value="RECOVER"></li>
	</ul> 
</form> -->

