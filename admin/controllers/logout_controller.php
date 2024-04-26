<?php

setcookie("admin_email", "", time() - 3600, "/");

session_start();
session_unset();
session_destroy();

header("Location: ../views/login_view.php");
