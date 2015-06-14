<?PHP

session_start();
session_destroy();
header('Location:front.php?success=1');

?>