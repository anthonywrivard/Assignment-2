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
          <label for="low">What is the least number of works you want to render?</label>
          <select id="low" name="low">
         	 <option value="1">1</option>
  			 <option value="2">2</option>
  			 <option value="3">3</option>
  			 <option value="4">4</option>
		</select>
       </p>
       
        <p>
          <label for="high">What is the greatest number of works you want to render?</label>
          <select id="high" name="high">
             <option value="5">5</option>
  			 <option value="6">6</option>
  			 <option value="7">7</option>
  			 <option value="8">8</option>
			</select>
        </p>
		
		<p>
          <label for="wordupcase">Convert all characters to uppercase:</label>
          <input type="checkbox" id="wordupcase" name="wordupcase">  
        </p>
        
        <p>
          <label for="extrachar">How many numbers and symbols would you like to add to the password?</label>
          <input type="number" id="extrachar" name="extrachar" min="1" max="10">
        </p>
        </fieldset>
        
        <input type="submit" id="submit" name="submit" value="create">
        
        <p class="bottom">
        	<?php echo $password;?>
      	</p>
        
    </form>
</body>
</html>