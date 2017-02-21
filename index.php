<?php require('passlogic.php'); ?>

<!DOCTYPE html>
<html>
<head>

	<title>Password Creator</title>
	<meta charset='utf-8'>

<link href="css/style.css" rel="stylesheet" type="text/css">

</head>
<body>
	<header>
    	<h1>Password Creator</h1>
	</header>
   
    <form method='GET' action='index.php'>
       <fieldset>
       <p>
          <label for="low">What is the least number of words you want to render? (Between 1-5)</label>
          <select id="low" name="low" value='<?=$form->prefill('low')?>'>
         	 <option value="1">1</option>
  			 <option value="2">2</option>
  			 <option value="3">3</option>
  			 <option value="4">4</option>
  			 <option value="5">5</option>
		</select>
       </p>
       
        <p>
          <label for="high">What is the greatest number of words you want to render? (Between 6-10)</label>
          <input type="text" id="high" name="high" value='<?=$form->prefill('high')?>'>
        </p>
		
		<p>
          <label for="wordupcase">Convert all characters to uppercase:</label>
          <input type="checkbox" id="wordupcase" name="wordupcase" <?php if($form->isChosen('wordupcase')) echo 'CHECKED' ?>>  
        </p>
        
        <p>
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
					<ul>
						<li><?=$error?></li>
					</ul>
				<?php endforeach; ?>
			</ul>
		</div>
        <?php endif?>

  	<?php if($password): ?>
		<div class='bottom'>
			<ul>
					<li><?=$password?></li>
			</ul>
		</div>
        <?php endif?>
       
        
   
</body>
</html>