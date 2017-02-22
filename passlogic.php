<?php

require('Form.php');
require('Tools.php');

use DWA\Form;
use DWA\Tools;

# Create arrays and extract files
$numsym=file('numsym.txt');
$words = file("wordsEn.txt");
$form = new DWA\Form($_GET);
$errors = [];


# Variables 
$password = "";

# password
if ($_GET) {
	$totalwords = rand(intval($_GET["low"]), intval($_GET["high"]));
	$totalnumsym = intval($_GET["extrachar"]);
	$username = $_GET["name"];
	
if($form->isSubmitted()){
	$errors = $form->validate([
		'high' => 'required|numeric|min:5|max:11',
		'name' => 'required|alpha'
	]);
}
	
	
	# create password
	if(empty($errors)) {
		$rwords = "";
		for ($i = 1; $i <= $totalwords; $i++) {
	    	$rkeys = array_rand($words, 1);
	    	$rwords .= $words[$rkeys]. " ";
		}
	
	$password = $rwords;
		
		if (isset($_GET["extrachar"])) {
			for ($i = 1; $i <= $totalnumsym; $i++) {
		    	$rkeys = array_rand($numsym, 1);
		    	$password .= $numsym[$rkeys];
			}
		}

		if (isset($_GET["wordupcase"])) {
			$password = strtoupper($password);
		}
	}
}