<?php





function redirect($location) {

header("Location: {$location}");

}

function scoreTest() {

	//ref: https://css-tricks.com/building-a-simple-quiz/
    //Holds the answers from the test page within these variables (also containing the answers "id").
    $answer1 = $_POST['question-1-answers'];
    $answer2 = $_POST['question-2-answers'];
    $answer3 = $_POST['question-3-answers'];
    $answer4 = $_POST['question-4-answers'];
    $answer5 = $_POST['question-5-answers'];
    
    //Creates a variable and sets the value to 0.
    $totalCorrect = 0;
    
    //If the "id" of the answer is matches "A", for example, then increment 
    //the total score by 1. This happens evertime the question is asked.
    if ($answer1 == "A") { $totalCorrect++; }
    if ($answer2 == "C") { $totalCorrect++; }
    if ($answer3 == "B") { $totalCorrect++; }
    if ($answer4 == "A") { $totalCorrect++; }
    if ($answer5 == "C") { $totalCorrect++; }

}

?>