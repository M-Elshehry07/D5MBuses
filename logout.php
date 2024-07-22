<?php
session_destroy();
echo 'You have been logged out.';
header("test.html");
?>