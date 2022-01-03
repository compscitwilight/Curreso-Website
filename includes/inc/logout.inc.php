<?php

session_start();
session_unset();
session_destroy();

header("LOCATION: /pages/landing.php");
