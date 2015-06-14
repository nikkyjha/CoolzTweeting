<?php
session_start();
require("twitteroauth/twitteroauth.php");
echo "<h2> hello </h2>";
/*echo "<h2>Hello <?=(!empty($_SESSION['username']) ? '@' . $_SESSION['username'] : 'Guest'); ?></h2>";*/

if(!empty($_SESSION['username'])){
    $twitteroauth = new TwitterOAuth('4knQUzAlyIA0ewqKVRf27hKlu', 'UcsjqTKQs7jjxQj25Lxb0PCFh2NaAL10ttk7SkH1GLtH64EaGO', $_SESSION['oauth_token'], $_SESSION['oauth_secret']);
}

$home_timeline = $twitteroauth->get('statuses/home_timeline', array('count' => 200));

echo  "<style>
       body {background-color:lightgrey}
       </style><body>";
foreach ($home_timeline as $item)
{
  echo " " .$item->user->screen_name. "\r\n";
  echo " " .$item->text. "\r\n<br>";
}
echo "</body>";
?>