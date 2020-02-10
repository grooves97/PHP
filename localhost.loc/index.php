<?php

include "classes/body.php";
include_once "classes/Tag.php";

$tag = new Tag('div');
$tagLink = new Tag('a');

$tag->appendBody($tagLink);

echo $tag;