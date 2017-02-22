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
					<label for="name">Enter your name:</label>
					<input class="name" type="text" id="name" name="name" value='<?=$form->prefill('name')?>'>
					<?php if(empty($username)):?><span class="asterisc"> Required*</span><?php endif?>
				</p>

				<p>
					<!-- Dropdown using presets to validate user and restrict inputs-->
					<label for="low">What is the least number of words you want to render? (Between 1-5)</label>
					<select id="low" name="low" value='<?=$form->prefill(' low ')?>'>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</p>

				<p>
					<!-- Using text input with numeric, required, and value validation-->
					<label for="high">What is the greatest number of words you want to render? (Between 6-10)</label>
					<input class="high" type="text" id="high" name="high"  value='<?=$form->prefill('high')?>'>
					<?php if(empty($totalwords)):?><span class="asterisc"> Required*</span><?php endif?>
				</p>

				<p>
					<label for="wordupcase">Convert all characters to uppercase:</label>
					<input type="checkbox" id="wordupcase" name="wordupcase" <?php if($form->isChosen('wordupcase')) echo 'CHECKED' ?>>
				</p>

				<p>
					<!-- Using HTML 5 number field for validation-->
					<label for="extrachar">How many numbers and symbols would you like to add to the password?</label>
					<input type="number" id="extrachar" name="extrachar" min="1" max="10" value='<?=$form->prefill('extrachar')?>'>
				</p>

			</fieldset>
			
				<br>
					<input type="submit" id="submit" name="submit" value="create">
				<br>
		</form>

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

		<?php if($password): ?>
		<div class='bottom'>
			<ul>
				<li>
					<?=$form->sanitize($username)?>
				</li>
				<li>
					<?=$form->sanitize($password)?>
				</li>
			</ul>
		</div>
		<?php endif?>
		
	</body>
</html>