<?php require('passlogic.php');?>


<!DOCTYPE html>
<html>
	<head>
		<title>Password Creator</title>
		<meta charset='utf-8'>
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<header>	
			<h1>Password Creator - By: Anthony Rivard</h1>
		</header>

			<form method='GET' action='index.php'>
				<fieldset>
					<p>
						<!-- Making fake username to show sanitize function-->
						<label for="name">Please enter a username:</label>
						<input class="name" type="text" id="name" name="name" value='<?=$form->prefill('name')?>'>
							<?php if(empty($userName)):?><span class="asterisc"> Required*</span><?php endif?>
					</p>

					<p>
						<!-- Dropdown using presets to validate user and restrict inputs-->
						<label for="low">What is the least number of words you want to render? (Between 1-5)</label>
						<select id="low" name="low">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</p>

					<p>
						<!-- Using text input with numeric, required, and value validation-->
						<label for="high">What is the highest number of words you want to render? (Between 6-10)</label>
						<input class="high" type="text" id="high" name="high"  value='<?=$form->prefill('high')?>'>
							<?php if(empty($totalWords)):?><span class="asterisc"> Required*</span><?php endif?>
					</p>

					<p>
						<label for="wordUpCase">Convert all characters to uppercase:</label>
						<input type="checkbox" id="wordUpCase" name="wordUpCase" <?php if($form->isChosen('wordUpCase')) echo 'CHECKED' ?>>
					</p>

					<p>
						<!-- Using HTML 5 number field for validation-->
						<label for="extraChar">How many numbers and symbols would you like to add to the password?</label>
						<input type="number" id="extraChar" name="extraChar" min="1" max="10" value='<?=$form->prefill('extraChar')?>'>
					</p>
				</fieldset>
					<br>
						<input type="submit" id="submit" name="submit" value="create">
					<br>
			</form>

		<!-- PHP to display errors from Form.php-->
		<?php if($errors): ?>
			<div class='errors'>
				<ul>
					<?php foreach($errors as $error): ?>
						<li>
							<?=$error?>
						</li>
				</ul>	
				<?php endforeach;?>
			</div>
		<?php endif?>

		<!-- Display and sanitize username and passwords-->
		<?php if($password): ?>
			<div class='bottom'>
				<ul>
					<li>
						Username: <?=$form->sanitize($userName)?>
					</li>
					<li>
						Password: <?=$form->sanitize($password)?>
					</li>
				</ul>
			</div>
		<?php endif?>
		
	</body>
</html>