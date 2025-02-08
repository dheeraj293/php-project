<?php
include("database.php");
session_destroy();
header("LOCATION: index.php");
