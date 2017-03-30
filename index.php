<!DOCTYPE html>
<html>
<head>

<!-- 

BASIC CMS by Lukas Eigler-Harding
github.com/leigler
lukaslukas.com

 -->


  <?php 
  include("parser/Parsedown.php"); 

	$newTitle = file_get_contents('content/siteTitle.md');
	$newDescription = file_get_contents('content/siteDescription.md');
	$newDate = file_get_contents('content/date.md');

	echo "<title>".$newTitle."</title>";

	 ?>

<link rel="icon" 
      type="image/png" 
      href="build/favicon.png">

<meta name="description" content="<?php echo $newDescription; ?>" />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<?php echo $newTitle; ?>">
<meta itemprop="description" content="<?php echo $newDescription; ?>">
<!-- <meta itemprop="image" content=""> -->

<!-- Twitter Card data -->
<meta name="twitter:card" content="<?php echo $newTitle; ?>">
<meta name="twitter:site" content="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>">
<meta name="twitter:title" content="<?php echo $newTitle; ?>">
<meta name="twitter:description" content="<?php echo $newDescription; ?>">
<meta name="twitter:creator" content="@author_handle">
<!-- Twitter summary card with large image must be at least 280x150px -->
<!-- <meta name="twitter:image:src" content=""> -->

<!-- Open Graph data -->
<meta property="og:title" content="<?php echo $newTitle; ?>" />
<meta property="og:type" content="website" />
<meta property="og:url" content="<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>" />
<!-- 1200 x 630 For optimal sharing -->
<!-- <meta property="og:image" content="" /> -->
<meta property="og:description" content="<?php echo $newDescription; ?>" />
<meta property="og:site_name" content="<?php echo $newTitle; ?>" />
<meta property="article:published_time" content="<?php echo $newDate; ?>" />
<meta property="article:modified_time" content="<?php echo $newDate; ?>" />
<meta property="article:section" content="<?php echo $newDescription; ?>" />
<meta property="article:tag" content="<?php echo $newTitle; ?>" />

<!-- css & js/jquery -->

<link rel="stylesheet" type="text/css" href="build/css/style.css?v=<?php echo time();?>">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


	


</head>
<body>

<div id="site-title"><a href="https://github.com/leigler/basic-cms" target="_blank"><?php echo $newTitle; ?></a></div>

<div class="menu-wrapper">
  <div class="menu">
    <div id="table-of-contents">
    </div>
  </div>
</div>




<main class="content">
  <?php

  $Parsedown = new Parsedown();
  $contents = file_get_contents('content/contents.md');
  echo $Parsedown->text($contents);

  	 ?>
</main>


<script type="text/javascript" src="build/js/script.js"></script>

</body>
</html>