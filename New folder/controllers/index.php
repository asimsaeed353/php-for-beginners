<?php

$heading = "Dashboard";

/*

// with echo, you can only pass strings to be visible on the web page.
// to dump object/array onto web page, you can use 'var_dump()

//var_dump(['hello yar me array hoon']);

// you can use superglobals to print the information about GET or POST request.
// wrap it in <pre> tag for original formatting

echo "<pre>";
var_dump($_SERVER);
echo "</pre>";

// to stop execution after a specific line, use 'die()'

die();

*/

// instead of copying this code and pasting it in all files, let's make a file which contains this function and this functino will be accessible in all the files.


require "views/index.view.php";