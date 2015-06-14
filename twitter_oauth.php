<?php
session_start();
$conn = mysql_connect('localhost','vacxrphy_nikky','v8exqe0570');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
require("twitteroauth/twitteroauth.php");
if(!empty($_GET['oauth_verifier']) && !empty($_SESSION['oauth_token']) && !empty($_SESSION['oauth_token_secret'])){
   
   $twitteroauth = new TwitterOAuth('4knQUzAlyIA0ewqKVRf27hKlu', 'UcsjqTKQs7jjxQj25Lxb0PCFh2NaAL10ttk7SkH1GLtH64EaGO',          $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
   
   $access_token = $twitteroauth->getAccessToken($_GET['oauth_verifier']);
   
   $_SESSION['access_token'] = $access_token;
   
   $user_info = $twitteroauth->get('account/verify_credentials');
   
   //print_r($user_info);
} 
else {

    header('Location: twitter_login.php');
     }


mysql_select_db('vacxrphy_coolztweeting');


if(isset($user_info->error))
{
    header('Location: twitter_login.php');
} 
else 
{

       $query = mysql_query("SELECT * FROM users WHERE oauth_provider = 'twitter' AND oauth_uid = ". $user_info->id);
    $result = mysql_fetch_array($query);
}

if(empty($result))
{
        $query = mysql_query("INSERT INTO users (oauth_provider, oauth_uid, username, oauth_token, oauth_secret) VALUES ('twitter', {$user_info->id}, '{$user_info->screen_name}', '{$access_token['oauth_token']}', '{$access_token['oauth_token_secret']}')");
        $query = mysql_query("SELECT * FROM users WHERE id = " . mysql_insert_id());
        $result = mysql_fetch_array($query);
} 
else 
{
        
        $query = mysql_query("UPDATE users SET oauth_token = '{$access_token['oauth_token']}', oauth_secret = '{$access_token['oauth_token_secret']}' WHERE oauth_provider = 'twitter' AND oauth_uid = {$user_info->id}");
}
 
$_SESSION['id'] = $result['id'];
$_SESSION['username'] = $result['username'];
$_SESSION['oauth_uid'] = $result['oauth_uid'];
$_SESSION['oauth_provider'] = $result['oauth_provider'];
$_SESSION['oauth_token'] = $result['oauth_token'];
$_SESSION['oauth_secret'] = $result['oauth_secret'];
 
if(!empty($_SESSION['username']))
{
    
    header('Location: main.php');
}





?>