<?php
session_start();
session_destroy();
header("Location: author.php");
exit;

