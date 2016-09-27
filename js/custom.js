//custom object that just holds all the information about our sql/php query in javascript
function test() {  
	var questions;
	var answers;
	var hints; 
	
	this.init = function() {
        this.questions = new Array();
		this.answers = new Array();
		this.hints = new Array();
    };
	
} 

var questionIndex = 0;		//stores our position within the questions array
var testData = new test();	//create our oubject that holding our query data
testData.init();			//initialize our arrays, can also be used to reset them obv.

//the elements we are constantly manipulating
var hPanel = document.getElementById("hPanel");		
var qPanel = document.getElementById("qPanel");		
var aPanel = document.getElementById("aPanel");
var hint = document.getElementById("hint");
var remove = document.getElementById("remove");	

function newQuestion(){  
	//alert("New Question Called " + testData.questions.length + " " + questionIndex);
	
	showQuestion();	//disables answers panel, and enables questions panel
	hideHint();		//hide hint section
	
	if(checkEnd()){	//they have removed all questions and need to refresh the page
		//if at end of array this reshuffles them and returns false
		alert("All questions removed");
		return;
	}	
	
	if(!removeCheck()){	//if we removed last question, content is already assigned and we dont increment
	
		questionIndex++;
		
		if(checkEnd()){	//they have removed all questions and need to refresh the page
			alert("All questions removed");
			return;
		}
		if(questionIndex == -1){//then we reshuffled our arrays, set index to zero
			questionIndex = 0;
			}
			
		assignContent();//write our content to the appropriate containers			
	}
		
}

function checkEnd(){
	
	if(questionIndex > (testData.questions.length - 1)){
		//so we have viewed all the questions, quiz is either over, or we need to reshuffle array and start over
		if(testData.questions.length == 0){
			qPanel.innerHTML = "Well done.  Refresh to start over.";
			showAnswer();
			return true;
		}
		//alert("Shuffling our arrays starting over");
		initQuestions();		//shuffle our arrays and reassign them	
		questionIndex--;		//the main loop will increment, so this will counter it to remain in same index location
		return false;
	}
	
}

function assignContent(){
	//alert("Showing element " + questionIndex + " " + testData.questions[questionIndex]);
	qPanel.innerHTML = convert(testData.questions[questionIndex]);
	aPanel.innerHTML = convert(testData.answers[questionIndex]);
	hPanel.innerHTML = convert(testData.hints[questionIndex]);
}

function shuffleArrays(q, a, h) {
  var currentIndex = q.length, temporaryValue, randomIndex;

  // While there remain elements to shuffle...
  
  while (0 !== currentIndex) {

    // Pick a remaining element...
	
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;

    // And swap it with the current element, for each of our three arrays, since these arrays are parrallel
	//we need to make sure they are all randomized the same
    temporaryValue = q[currentIndex];
    q[currentIndex] = q[randomIndex];
    q[randomIndex] = temporaryValue;
	
	temporaryValue = a[currentIndex];
    a[currentIndex] = a[randomIndex];
    a[randomIndex] = temporaryValue;
	
	temporaryValue = h[currentIndex];
    h[currentIndex] = h[randomIndex];
    h[randomIndex] = temporaryValue;
	
	}
  
	//return a anonymous object that has our three shuffled arrays in it
	return {a : a, q : q, h: h}
	// return array;
}


function initQuestions(){
	
	var sArrays = shuffleArrays(testData.questions, testData.answers, testData.hints);
	//assign our shuffled data to our original test object
	testData.questions = sArrays.q;	
	testData.answers = sArrays.a;
	testData.hints = sArrays.h;
	
	//alert("Before shave " +  testData.questions.length);
	//shaveArray();
	//alert("After shave " +  testData.questions.length);
	
	questionIndex = 0;		//restart our array index
}

function hideHint(){	
	hPanel.style.display = "none";
	hint.innerHTML = "Show Hint";
}

function removeCheck(){	
	//now if the remove checkbox has been clicked, then we need to remove this last quetion
	
	if(remove.checked){ 
		//alert("Getting removed before " +  (questionIndex) + " Q: " + testData.questions[questionIndex]);
		testData.questions.splice((questionIndex), 1);
		testData.answers.splice((questionIndex), 1);
		testData.hints.splice((questionIndex), 1);
		remove.checked = false;		
		
		//we also need to reassign the text to our current value (same index, different element from removal)
		if(checkEnd()){	//we are done with questions they need to refresh the page			
			return true;
			}
		//then we initialized questions by reshuffling them and resetting index, now make it show up	
		assignContent();
		//alert("Getting removed after  " +  questionIndex + " Q: " + testData.questions[questionIndex] );
		return true;
	}
	
	return false;
}

function shaveArray(){//for debugging
	if(testData.questions.length > 5){
		testData.questions.length = 5;
		testData.answers.length = 5;
		testData.hints.length = 5;
	}
}

function showAnswer(){
	
	if(testData.questions.length == 0){
		return;
	}
	//then show our answer panel and disable the question Panel
	aPanel.style.display = "block";
	qPanel.style.display = "none";	
}

function showQuestion(){
	qPanel.style.display = "block";
	aPanel.style.display = "none";
}

function toggleHint(){
	
	//swap the text on the control from show to hide and vice versa, and toggle visibility
	if(hPanel.style.display == "none"){
		hPanel.style.display = "block";
		hint.innerHTML = "Hide Hint";
	}
	else{
		hPanel.style.display = "none";
		hint.innerHTML = "Show Hint";
	}
}

// Returns a random integer between min (included) and max (included)
function getRandomIntInclusive(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function convert(str){	
	if(str == null){
		return "";
	}
    str = str.replace(/&/g, "&amp;");
    str = str.replace(/>/g, "&gt;");
    str = str.replace(/</g, "&lt;");
    str = str.replace(/"/g, "&quot;");
    str = str.replace(/'/g, "&#039;");
	
    return str;
}