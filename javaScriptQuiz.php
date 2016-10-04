<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Small site for testing my knowledge and an excuse to work with databases.">
    <meta name="author" content="Robert Petersen">

	<link rel='shortcut icon' href='favicon.ico' type='image/x-icon'/ >
	
    <title>JavaScript Refresher</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

	
	<!--our custom functions-->
	<script src="js/custom.js"></script>
	
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>

<body id="page-top" class="index">

		<nav>
          <ul class="nav nav-justified ">
            <li id="html5"><a href="htmlQuiz.php"><img src="img/htmlNav.png" class="navImg"></a></li>
            <li id="css" ><a href="cssQuiz.php"><img src="img/cssNav.png" class="navImg"></a></li>
            <li class="active" id="js" ><a href="javaScriptQuiz.php"><img src="img/jsNav.png" class="navImg"></a></li>
          </ul>
        </nav>
	
	
	<hr class="iconHr">  <!-- just a gray line divider between sections  -->
	
	<!-- would like to use sections, but validation throws a warning since using an image to label the section instead of and h tag -->
    <section class="portfolio">
				
		<div>
		
            <div class="row center marginSides">
				<div class="col-sm-1">
				</div>
				
                <div id="qPanel" class="col-sm-10 qPanel padTopLarge padSides largeFont padBottom">
					
                </div>
				
				<div class="col-sm-1">
				</div>
			</div>
			<div class="row">
                <div id="aPanel" class="col-sm-12 text-center qPanel padTopLarge padSides largeFont padBottom">
                    
					
                </div>
				
				
            </div>
			
			<div class="row">
                <div id="hPanel" class="col-sm-12 text-center qPanel">
                    
					
                </div>
				
				
            </div>
			<div class="row">
				<div class="centerLabel marginSides padBottom"> <!--padTop padBottomXL -->
					<!--
					<div class="col-sm-4 padTop">
						<form id="formMain" method="POST" name="go" action="" novalidate>
						<button id="showQuestion" class="myButton" type="submit">Next Question</button>
						
						</form>
					</div>	
					-->
					
					<div class="col-xs-4 padTop">
						<button id="showQuestion" class="myButton" onClick="newQuestion()">Next Question</button>
						
					</div>
					
					<div class="col-xs-4 padTop" id="showHint">					
						<!-- so weird, needs to be of type button not to subbmit if within form-->	
						<a href="#" id="hint" onclick="toggleHint();return false;">Show Hint</a>
						<div class="rHolder">
							<label for="remove" id="rLabel">Remove</label>
							<input id="remove" class="qCheck" type="checkbox" name="remove" >
						</div>
						<!--<p><strong><em>Show Hint</em></strong></p>-->
						<!--<button id="showHint" type="button" class="myButton"  onClick="showAnswer()">Show Hint</button>-->
					</div>
					<div class="col-xs-4 padTop">					
						<!-- so weird, needs to be of type button not to subbmit if within form-->						
						<button id="showAnswer" type="button" class="myButton"  onClick="showAnswer()">Show Answer</button>
					</div>
					
				</div>
			</div>
				
        </div>
    </section>
	
	<hr class="iconHr">  <!-- just a gray line divider between sections  -->
    <!-- Contact Section -->
	
	
    <section id="contact">
        <div class="container">
		
			<div class="row">
                <div class="col-lg-12">
                    <div class="circle">
						<img class="iconSize" src="img/mail.png" alt="">
					</div>
                </div>
            </div>
			
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <h1 class="center">Send Me Questions*</h1>
						</br>
						<div class="row control-group hideThis">
                            <div class="form-group col-md-2 col-sm-2 col-xs-12">
                                <label  for="name">Name:</label>
                            </div>
							<div class="form-group col-md-10  col-sm-10 col-xs-12">
                                <input type="text" class="form-control" value="Testing" placeholder="Name" id="name" data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-md-2 col-sm-2 col-xs-12">
                                <label for="email">Email:</label>
                            </div>
							<div class="form-group col-md-10  col-sm-10 col-xs-12">
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
						<div class="row control-group hideThis">
                            <div class="form-group col-md-2 col-sm-2 col-xs-12">
                                <label for="phone">Phone:</label>
                            </div>
							<div class="form-group col-md-10  col-sm-10 col-xs-12">
                                <input type="tel" class="form-control" value="6082958536" placeholder="Phone Number" id="phone" data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
							<div class="form-group col-xs-12 center">
								<label for="message" class="centerLabel">Message:</label>
							</div>
							<div class="form-group col-xs-12">
								<textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
								<p class="help-block text-danger"></p>
							</div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg center">Send</button>
                            </div>
                        </div>
						<p class="center">*I'm looking for questions to test myself and stay current.  I have them pulled from a database that has the question, answer, hints, category (Html5, Css, etc), and will eventually have subcategories and skill levels (beginner, advanced, etc.).</p>
						
                    </form>
                </div>
            </div>
        </div>
    </section>
	
	
	<hr class="iconHr"> 
	
    <!-- Footer -->
	
	
    <footer class="text-center">
        <div class="footer-above sideBorder">
		
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-6">
                        <h3>Contact</h3>
						<p>lastresortname@hotmail.com</p>
                    </div>
                    <div class="footer-col col-md-6">
                        <h3>Get Social</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/bob.petersen.33" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="footer-below sideBorder ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <small>Copyright &copy; Robert Petersen 2016</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>

	
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>
	
	<!--our custom functions-->
	<script src="js/custom.js"></script>
	
	
	<script type="text/javascript">
		
		
		<?php	
		
			$questions = array(); 
			$answers = array();
			$hints = array();
			
			mysql_connect('localhost',"rpeterse_2101","Pickle2101");
			@mysql_select_db('rpeterse_tests') or die( "Unable to select database");
			$query = 'SELECT Question, Answer, Hint FROM JavaScript';
			$result = mysql_query($query);	

			if (!$result) {
				die('Could not query:' . mysql_error());
				}	
				
			$num = mysql_numrows($result);
			//take our query result and add to an array
			for ($x = 0; $x < $num; $x++) {
				$questions[] = mysql_result($result, $x, 0);
				$answers[] = mysql_result($result, $x, 1);
				$hints[] = mysql_result($result, $x, 2);
			} 
			$questions = json_encode($questions);
			$answers = json_encode($answers);
			$hints = json_encode($hints);
		?>
		//global class and vars from code-behind custom.js
		//maxQuestions = <?php echo $num; ?>;
		//add the array to our js object, this way we dont have to reload the page or use ajax
		testData.questions = <?php echo $questions; ?>;
		testData.answers = <?php echo $answers; ?>;
		testData.hints = <?php echo $hints; ?>;
		
		//shaveArray();
		initQuestions();
		assignContent();
		
		//newQuestion(true);
		
	</script>
	
	
	
    

</body>

</html>
