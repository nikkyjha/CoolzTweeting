<?php session_start(); 
$_SESSION['tweets']=0;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle1.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<div id="wrap">
	<div id="first">
           <h2 class="h2-with-icon">CoolzTweeting</h2>
             <div style="text-align:center; margin-top: 300px;" id="but12"> 
		   <form action="main.php"> 
		   <input type="submit" class="styled-button-1" name ="show" value="show recent 200 tweets" align="center" /> 
		   </form> 
                    <a href = logout.php>Log out</a>
                </div>
          
        
        </div>
        <div id="second"> 
               
             
                <div class="topcorner";> 
                  <?php
                    $user=$_SESSION['username'];
                    echo "welcome   ".$user;
                  ?>         
                </div>
            
         </div>
        <div id="third">
                     
                   <?php
                      if (isset($_GET['show']) )
                      {
                         echo '<div id="box">';
                            require("twitteroauth/twitteroauth.php");


                              if(!empty($_SESSION['username']))
                               {
                                  $twitteroauth = new TwitterOAuth('4knQUzAlyIA0ewqKVRf27hKlu',                              'UcsjqTKQs7jjxQj25Lxb0PCFh2NaAL10ttk7SkH1GLtH64EaGO', $_SESSION['oauth_token'], $_SESSION['oauth_secret']);
                               }

                               $home_timeline = $twitteroauth->get('statuses/home_timeline', array('count' => 200));
                               foreach ($home_timeline as $item)
                               {
                                     echo " " .$item->user->screen_name. "\r\n";
                                     echo " " .$item->text. "\r\n<br>";
                                     echo "<br>";
                                     echo "<br>";

                                }
                               
                         echo '</div>';
                       }
                     ?>

        </div>
         
</div>

                           


</body>
</html>