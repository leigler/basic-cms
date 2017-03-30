<!DOCTYPE html>
<html>
<head>
	<title>Basic CMS Backend</title>

 <link rel="stylesheet" type="text/css" href="build/dropzone.css">
 <link rel="stylesheet" type="text/css" href="build/style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="build/dropzone.js"></script>
  <script src="build/clipboard.js"></script>

 
</head>
<body>
  <?php include("../parser/Parsedown.php"); 
  		include ('ImageResize.php');

  ?>


	<?php

	$Parsedown = new Parsedown();

	$contents = file_get_contents('../content/contents.md');

	$siteTitle = file_get_contents('../content/siteTitle.md');

	$siteDescription = file_get_contents('../content/siteDescription.md');


	?>

	<!--  
	↓👁✕✗

	-->
	<div id="menu-button"><a target="_blank" href="../index.php" style="text-decoration: none;">👁</a></div>
	<div id="save-button">
		<button type="button" class="saveButton">Save</button>
	</div>
	<div id="toc">



		<p class="label" style="text-align: center;">>>><?php echo $siteTitle; ?><<<</p>
		<hr class="dividers">
		<p class="label">Table of Contents</p>
		<ul>
			<li><a href="#site-title">Site Info</a></li>
			<li><a href="#content">Content</a></li>
			<li><a href="#images">Images</a></li>
		</ul>
		<ul >
			<li><a target="_blank" href="../">View Live Site</a></li>
			<li><a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">Markdown Reference ↪</a></li>
		</ul>
		<hr class="dividers">
	</div>

	

	

	<div id="cms-wrapper">
		<p class="label" id="site-title" style="color:red;">SITE INFO</p>
		<p class="label" >SITE TITLE:</p>
		<textarea class="singleRow" rows="1" id="siteTitle"><?php echo $siteTitle; ?></textarea>
		<p class="label" id="site-description">SITE DESCRIPTION:</p>
		<textarea class="singleRow" rows="1" id="siteDescription"><?php echo $siteDescription; ?></textarea>


		<p class="label" id="content" style="color:red;">CONTENT</p>
		<p class="label" >TEXT:</p>
		<p class="info" ><a target="_blank" href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">Markdown Reference ↪</a></p>
		<textarea rows="4" id="pageContents"><?php echo $contents; ?></textarea>

		<button type="button" class="saveButton inlinebuttons">Save</button> <button type="button" id="restoreButton" class="inlinebuttons">Restore to session start ✔</button>
		<br><br>
		<p class="label" >ARCHIVED TEXT:</p>
		<p class="info" >With every content update, you automatically archive your previous version. These versions can be accessed here by date and time :)</p>

		<form action=" " style="margin-left: 25px; margin-top: 12px;">
		  <select name="versions" id="oldVersions">
		<?php 

		$archivedContent = scandir('archived', 1);

		foreach ($archivedContent as $oldContent) {
			if ($oldContent !== '..' && $oldContent !== '.' ) {
				?><option><?php echo $oldContent."<br>"; ?></option><?php
			}
		}


		?>


		</select>
		  <br><br>
		  <button type="button" id="viewVersionButton">Edit this Version ↑</button>
		</form>

		<br><br>
		<hr class="dividers">
		<p class="label" id="images">IMAGES:</p>
		<p class="info"> To embed images into the site, click image, then paste into markdown area: <span id="image-saved"></span></p>

		<?php

			$images = scandir('../uploads');
			use \Eventviva\ImageResize;

			foreach ($images as $image) {
				if ($image !== '..' && $image !== '.' ) {
					
					$imageURL = '../uploads/'.$image;
					$imageSize = getimagesize('../uploads/'.$image);
					//print_r($imageSize[0]);
					$imageWidth = $imageSize[0];

					if ($imageWidth > 1201 ) {
					

						 

						 $imageChange = new ImageResize($imageURL);
						 $imageChange->resizeToWidth(1200);
						 $imageChange->save($imageURL);

						echo '<img class="uploads" data-clipboard-text="!['.$image.'](uploads/'.$image.')" src="../uploads/'.$image.'" >';
					} else{
						echo '<img class="uploads" data-clipboard-text="!['.$image.'](uploads/'.$image.')" src="../uploads/'.$image.'" >';
					}

					

				
				}
			}

			//class="btn" data-clipboard-text="

			//eliminate both dots, for each image, show image and clipboard url


		 ?>

		<form action="uploads.php" class="dropzone" style="margin-top: 12px;"></form>
		<button type="button" id="uploadImagesButton">Upload Images ↑</button>

	</div>
	<div id="footer">
	<hr class="dividers">
		<p class="label"><a href="#toc">Table of Contents ↑</a</p>
		<hr class="dividers">
		</div>

	<br><br>


  <script src="build/script.js"></script>



</body>
</html>