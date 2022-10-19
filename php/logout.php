<?php

session_start();

unset($_SESSION['userId']);
unset($_SESSION['userStudId']);
unset($_SESSION['userName']);
unset($_SESSION['userLname']);
header("Location: ../?page=login");