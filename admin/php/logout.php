<?php

session_start();
session_destroy();

unset($_SESSION['userName']);
unset($_SESSION['userId']);
unset($_SESSION['userType']);

header("Location: ../login.php");