<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle_def.css">
</head>
<body>
<div id="wrap">
	<div id="first"></div>
    <div id="second"> 
                           <?php
                           if ( isset($_GET['success']) && $_GET['success'] == 1 )
                           {
                                echo "<script> window.alert('you are successfully logged out');</script>";
                           }
                           ?>
                           <h1 class="h1-with-icon">CoolzTweeting</h1>
                           <h2> helps to get rid of embarassing tweets....</h2>
                           
    </div>
    <div id="third">
	       <div style="text-align:center; margin-top: 200px;" id="but12"> 
		       <form action="twitter_login.php"> 
		       <input type="submit" class="styled-button-1" value="Log in with twitter" align="center" /> 
		       </form> 
               </div>
    </div>
</div>
</body>
</html>