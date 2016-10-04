<?php
// Start the session to save question data 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Small site for testing my knowledge, and an excuse to work with databases.">
    <meta name="author" content="Robert Petersen">

    <title>Send me new questions!</title>

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
            <li class="active" id="html5"><a href="#">Html5</a></li>
            <li><a href="#">Css</a></li>
            <li><a href="#">JavaScript</a></li>
          </ul>
        </nav>
	<!--	
	<nav>	
		<div class="row padTop">
		   <div class="col-sm-4 col-xs-4 text-center navTextTest">
		   
				<a href="javascript:showData('Html5');" id="focusOnStart">Html5</a>  
				
				<script type="text/javaScript">
					document.getElementById('focusOnStart').focus();		
				</script>
				
		   </div>
		   <div class="col-sm-4 col-xs-4 text-center navTextTest">
				  <a href="javascript:showData('CSS3');">CSS3</a>    
		   </div>
		   <div class="col-sm-4 col-xs-4 text-center navTextTest">
				  <a href="javascript:showData('JavaScript');">JavaScript</a>     
		   </div>
		   
		</div>	
	</nav>
	-->
	
    <!-- Header 
    <header>
            <div class="row hugeHeight"><!-- style="minHeight: 400px"
                <div class="col-lg-12 padTop  padBottom marginBottom hugeHeight">
					
                </div>
            </div>
    </header>
	-->
    <!-- Section containing the Web Design work -->
	
	<hr class="iconHr">  <!-- just a gray line divider between sections  -->
	
	<!-- would like to use sections, but validation throws a warning since using an image to label the section instead of and h tag -->
    <section class="portfolio">
	
		<div>
		
            <div class="row center marginSides">
				<div class="col-sm-1">
				</div>
				
                <div id="qPanel" class="col-sm-10 qPanel padTopLarge padSides largeFont padBottom">
					
					
					<?php
					
						/*var javaScriptVar = "<?php echo $someVar; ?>";*/
						
						//connect to our database
						mysql_connect('localhost',"rpeterse_2101","Pickle2101");
						@mysql_select_db('rpeterse_tests') or die( "Unable to select database");
						
						//select from our database our questions, we select the whole thiing since need its length
						$query = 'SELECT Question FROM Questions WHERE CategoryId = 1';
						$result = mysql_query($query);						
						$num = mysql_numrows($result);
						
						if (!$result) {
							die('Could not query:' . mysql_error());
						}
						
						$randomNumber = (mt_rand(0,$num));
						$_SESSION["rand"] = $randomNumber;
						
						
						echo htmlentities(mysql_result($result, $randomNumber)) . ' index: ' , $randomNumber;
						
					
					?>
					
                </div>
				
				<div class="col-sm-1">
				</div>
			</div>
			<div class="row">
                <div id="aPanel" class="col-sm-12 text-center qPanel padTopLarge padSides largeFont padBottom">
                    
					<?php
					
						/*var javaScriptVar = "<?php echo $someVar; ?>";*/
						
						//connect to server and get answer
						mysql_connect('localhost',"rpeterse_2101","Pickle2101");
						@mysql_select_db('rpeterse_tests') or die( "Unable to select database");
						
						$query = 'SELECT Answer FROM Questions';
						$result = mysql_query($query);						
						$num = mysql_numrows($result);
						
						if (!$result) {
							die('Could not query:' . mysql_error());
						}
						
						echo htmlentities(mysql_result($result, $_SESSION["rand"]));
					
					
					?>
                </div>
				
				
            </div>
			
			<div class="row">
                <div id="hPanel" class="col-sm-12 text-center qPanel">
                    
					<?php
					
						/*var javaScriptVar = "<?php echo $someVar; ?>";*/
						
						//connect to server and get answer
						mysql_connect('localhost',"rpeterse_2101","Pickle2101");
						@mysql_select_db('rpeterse_tests') or die( "Unable to select database");
						
						$query = 'SELECT Hint FROM Questions';
						$result = mysql_query($query);						
						$num = mysql_numrows($result);
						
						if (!$result) {
							die('Could not query:' . mysql_error());
						}
						
						echo htmlentities(mysql_result($result, $_SESSION["rand"]));
					
					
					?>
                </div>
				
				
            </div>
			<div class="row">
				<div class="padTop padBottomXL centerLabel">
				
					<div class="col-sm-4 padTop">
						<form id="formMain" method="POST" name="go" action="" novalidate>
						<button id="showQuestion" class="myButton" type="submit">Next Question</button>
						<!--<a href="#" class="myButton">Next Question</a>-->
						
						</form>
					</div>	
					<div class="col-sm-4 padTop" id="showHint">					
						<!-- so weird, needs to be of type button not to subbmit if within form-->	
						<a href="#" id="hint" onclick="return toggleHint();">Show Hint</a>
						<!--<p><strong><em>Show Hint</em></strong></p>-->
						<!--<button id="showHint" type="button" class="myButton"  onClick="showAnswer()">Show Hint</button>-->
					</div>
					<div class="col-sm-4 padTop">					
						<!-- so weird, needs to be of type button not to subbmit if within form-->						
						<button id="showAnswer" type="button" class="myButton"  onClick="showAnswer()">Show Answer</button>
					</div>
					
				</div>
			<div>
				
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
                    <div class="footer-col col-md-4">
                        <h3>Contact</h3>
						<p>lastresortname@hotmail.com</p>
						<p>608-295-8536</p>
                    </div>
                    <div class="footer-col col-md-4">
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
                    <div class="footer-col col-md-4">
                        <h3>Resume</h3>
                        <p>I also have a PDF resume, for anyone interested.  Nothing to hide, click <a href="http://rpetersen4.btcwsd.com/Portfolio/downloads/RobertPetersenResume.pdf">here!</a> to download.</p>
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
	
	<script type="text/javaScript">
		document.getElementById('html5').focus();		
	</script>
	
	
	
    

</body>

</html>
