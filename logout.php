<?php
session_start();
require 'libs/functions.php';
logout();
header('Location: login.php');