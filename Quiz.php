<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP Form Quiz</title>
</head>
<body>
	<?php 
		// associative array of the questions and answers
		$StateCapitals = array(
			"Connecticut" => "Hartford",
			"Maine" => "Augusta",
			"Massachusetts" => "Boston",
			"New Hampshire" => "Concord",
			"Rhode Island" => "Providence",
			"Vermont" => "Montpelier");

		// determine if the submit button was clicked
		if(isset($_POST["submit"])) {
			// create an array out of the array of the user-submitted data
			$Answers = $_POST["answers"]
			$Score = 0;
			$questions = count($Answers);
			if(is_array($Answers)){
				// we checked $Answers and it is an array
				foreach($Answers as $State => $Response) {
					$Response = stripslashes($Response);
					// check this response to see if it was left empty
					if(strlen($Response) > 0){
						// we have an attempt at an answer
						if(strcasecmp($StateCapital[$State], $Response == 0)) {
							echo "<p>Correct! The capital of $State" . $StateCapital[$State] . ".</p>\n";
							++$Score;
						}
						else {
							// we have an incorrect answer
							echo"<p>Sorry, the capital of $State is not $Response.</p>\n";
						}
						else {
							//answer was empty
							echo "<p>You did not enter a value for the capital of $State!</p>\n";
						}
					}

				} // end of foreach loops
			}
			$Percent = $Score / $Questions * 100;
			echo "<p>You Got a score of $Score!</p>\n";
			echo"<p><a href = 'Quiz.php'>Try Again?</a></p>\n";
		}
		else {
			echo "form action='Quiz.php' method='POST'>\n";
			foreach($StateCapitals as $State => $Response) {
				echo "The capital of $State is: <input type='text' name='answers[" . $State . "]' /><br />\n";
			}
			echo "<input type='submit' name='submit' value='Check Answers' />";
			echo "<input type='reset' name='reset' value='Reset Form' />";
			echo "</form>\n";
		}
	?>
</body>
</html>