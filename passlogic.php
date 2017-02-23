<?php

require('Form.php');
require('Tools.php');

use DWA\Form;
use DWA\Tools;

$numSym=file('numsym.txt');
$words = file("wordsEn.txt");
$form = new DWA\Form($_GET);
$errors = [];
$password = "";

# Set values from GET
if ($_GET) {
	$totalWords = rand(intval($_GET["low"]), intval($_GET["high"]));
	$totalNumSym = intval($_GET["extraChar"]);
	$userName = $_GET["name"]."@csci15.test";


	# Check for errors and submitted with Form.php
	if($form->isSubmitted()){
		$errors = $form->validate([
			'high' => 'required|numeric|min:5|max:11',
			'name' => 'required|alpha'
			]);
		}
	
	# create password from inputs
	if(empty($errors)) {
		$rWords = "";
		for ($i = 1; $i <= $totalWords; $i++) {
	    	$rKeys = array_rand($words, 1);
	    	$rWords .= $words[$rKeys]. " ";
		}
	
		$password = $rWords;
		
		if (isset($_GET["extraChar"])) {
			for ($i = 1; $i <= $totalNumSym; $i++) {
		    	$rKeys = array_rand($numSym, 1);
		    	$password .= $numSym[$rKeys];
			}
		}

		if (isset($_GET["wordUpCase"])) {
			$password = strtoupper($password);
		}
	}
}