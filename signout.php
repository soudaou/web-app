<?php

empty_array() = empty_session();

session_destroy();

unset($foo);
header("location:/index.php");
//exit();