<?php

spl_autoload_register(function ($class)
{
  require_once "model/" . $class . ".php";
});

$dao = new CourseCompletedDAO();
$all = $dao -> retrieve_all();
var_dump($all);
$entry = $dao -> retrieve_section('amy.ng.2009', 'IS100');
var_dump($entry);


?>