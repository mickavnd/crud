<?php
session_start();
//suprime une variable
unset($_SESSION["user"]);

header("Location: index.php");