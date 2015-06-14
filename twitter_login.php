<?php

session_start();
require("twitteroauth/twitteroauth.php");
$twitteroauth = new TwitterOAuth('4knQUzAlyIA0ewqKVRf27hKlu','UcsjqTKQs7jjxQj25Lxb0PCFh2NaAL10ttk7SkH1GLtH64EaGO');

$request_token = $twitteroauth->getRequestToken('http://vacxq.com/CoolzTweeting/twitter_oauth.php');

$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];


if($twitteroauth->http_code==200){
    $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
    header('Location: '. $url);
} 
else 
{
    die('Something wrong happened.');

}

?>