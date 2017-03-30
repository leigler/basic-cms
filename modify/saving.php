<?php 


 include("../parser/Parsedown.php");


$newcontents = $_POST["data"];
$newTitle = $_POST["title"];
$newDate = $_POST["date"];
$newDescript = $_POST["description"];

$oldContents = file_get_contents('../content/contents.md');

file_put_contents("../content/contents.md", $newcontents);

file_put_contents("../content/siteTitle.md", $newTitle);

file_put_contents("../content/date.md", $newDate);

file_put_contents("../content/siteDescription.md", $newDescript);



$date = date('Y-m-d-H-i-s');

file_put_contents("archived/archived-".$date.".md", $oldContents);


//$contents = file_get_contents('contents.md');

$Parsedown = new Parsedown();
echo $Parsedown->text($newcontents);


?>