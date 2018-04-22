<?php
require_once("functions.php");
$user = User::getInstance();
$user->userAuthenticate();
header("location:index.php");