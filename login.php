<!DOCTYPE html>
<html>
<head>
<title>Voting System</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style_r.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
</head>
<body>
  <?php 
        include_once('db.php');
    ?>
   <header>
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form action="login.php" method="POST" target="_self">
                        <h2>Login</h2>
                        <p>Almost Done! Just login to the OnlineVoting System!</p>
                        <div class="form">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input type="text" placeholder="Email" class="" id="email" name="email">
                                <input type="password" placeholder="Password" class="" id="pass" name="pass">
                                <input type="submit" name="login" value="Login">
                                <h3><input type="checkbox" name="" value="" checked>Remember Me</h3>
                                <a class="pass" href="#">Forgot Password?</a>
                                <!--<h5>Login with your Facebok or Twitter acoount</h5>
                                <div class="social">
                                    <div class="col-md-12">
                                        <ul>
                                            <li><a class="bg_fb" href="https://www.facebook.com"><i class="fa fa-facebook-f"></i>Login with Facebook</a></li>
                                            <li><a class="bg_tw" href="#"><i class="fa fa-twitter"></i>Login with Twitter</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sign">
                                    <div class="col-md-12">
                                        <h3>Want New Account?</h3>
                                        <a href="#">Sign Up</a>
                                    </div>-->
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
    </header>
    <script src="js/jquery-1.12.4.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>

</body>
</html>