<?php

$subjectPrefix = 'Portfolio';
$emailTo = 'contact@claybinion.com';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = stripslashes(trim($_POST['contactName']));
    $email   = stripslashes(trim($_POST['contactEmail']));
    $subject = " Contact Form";
    $message = stripslashes(trim($_POST['contactMessage']));
    $pattern  = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';

    $emailIsValid = preg_match('/^[^0-9][A-z0-9._%+-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', $email);

    if($name && $email && $emailIsValid && $subject && $message){
        $subject = "$subjectPrefix $subject";
        $body = "Name: $name <br /> Email: $email <br /> Message: $message";

        $headers  = 'MIME-Version: 1.1' . PHP_EOL;
        $headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
        $headers .= "From: $name <$email>" . PHP_EOL;
        $headers .= "Return-Path: $emailTo" . PHP_EOL;
        $headers .= "Reply-To: $email" . PHP_EOL;
        $headers .= "X-Mailer: PHP/". phpversion() . PHP_EOL;

        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?>
<!DOCTYPE html>
<!-- saved from url=(0050) -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The Portfolio of Clay Binion">
    <meta name="author" content="Clay Binion">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <title>Clay Binion - Contact Me</title>

    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
      <!-- Main custom CSS  -->
      <link href="css/main.css" rel="stylesheet">  

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- ReCaptcha JS -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

  </head>

  <body>

    <div class="container" id="contactCont">
      <header class="header">
       
        <nav class="navbar" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
             <h3><a href="..">Clay Binion</a></h3>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li role="presentation"><a href="..">About</a></li>
          <!--<li role="presentation"><a href="../work.html">Work</a></li>-->
              <li role="presentation" class="active"><a href="../contact">
                <span class="sr-only">(current)</span>Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
        </nav>

      </header>

      <article class="row">
        <div class="col-lg-3"></div>
        
         <?php if(isset($emailSent) && $emailSent): ?>
        <div class="col-lg-6">
            <div class="alert alert-success text-center">I will be in contact with you shortly. <br /> Thank you for the interest.</div>
        </div>
    	<?php else: ?>
        <?php if(isset($hasError) && $hasError): ?>
        <div class="col-lg-6">
            <div class="alert alert-danger text-center">Something has gone wrong. Please try again soon.</div>
        </div>
        <?php endif; ?>

        <div class="col-lg-6" id="contact">
          <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" role="form" method="post">
            
            <ul>
              <li><label for="contactName">Name:</label> 
                  <input id="contactName"
                         name="contactName" 
                         type="text" 
                         placeholder="Type your name here." />

              </li>
              <li><label for="contactEmail">Email:</label> 
                  <input id="contactEmail"
                         name="contactEmail"
                         type="email" 
                         placeholder="Type your email here." />
              
              </li>
              <li><label for="contactMessage">Message:</label> 
                  <textarea id="contactMessage"
                            name="contactMessage" 
                            placeholder="Type your message here."></textarea>
              </li>
              <!--<li>
                <?php
                  require_once('recaptchalib.php');
                  $publickey = "6Lf4iP8SAAAAAMXZfK01ePt-204We2Jnmg7LZXt8"; // you got this from the signup page
                  echo recaptcha_get_html($publickey);
                ?>
              </li>-->  
              <li><button class="btn btn-default"
                          name="contactSubmit" 
                          type="submit"
                          value="Submit" />
                      Submit
                  </button>
              </li>
            </ul>
        </div>
        <?php endif; ?>
        <div class="col-lg-3"></div>
      </article>

      <footer>
        <p>
          Find me <strong>on</strong>
            <a href="https://github.com/claybinion" target="_blank">Github</a>
            <!--<a href="https://twitter.com/claybinion" target="_blank">Twitter</a>-->
        </p>
      </footer>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-57458005-1', 'auto');
      ga('send', 'pageview');

    </script>

</body></html>