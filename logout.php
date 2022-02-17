<?php 
/* we start the section, destroy the session and redirect to index.php */
session_start();
session_destroy();
header("location: index.php");
?>