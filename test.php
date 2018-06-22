<?php
$imagewidth = 150;
$imageheight = 90;
$imagequality = 90;
/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$targ_w = $imagewidth;
	$targ_h = $imageheight;
	$jpeg_quality = $imagequality;

	$src = 'imagens/flowers.jpg';
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
$output_filename = 'imagens/cropada.jpg';
	// Comment out the header() call
// header('Content-type: image/jpeg');

imagejpeg($dst_r, $output_filename, $jpeg_quality);
	exit;
}

// If not a POST request, display page below:

?>
<html>
	<head>

		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.Jcrop.js"></script>
		<link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
		<!--link rel="stylesheet" href="demo_files/demos.css" type="text/css" /-->

		<script language="Javascript">

			// Remember to invoke within jQuery(window).load(...)
			// If you don't, Jcrop may not initialize properly
			jQuery(window).load(function(){

				jQuery('#cropbox').Jcrop({
					onChange: showPreview,
					onSelect: showPreview,
					onSelect: updateCoords,
					aspectRatio: <?php echo $imagewidth.'/'.$imageheight;?>
				});

			});

			// Our simple event handler, called from onChange and onSelect
			// event handlers, as per the Jcrop invocation above
			function showPreview(coords)
			{
				if (parseInt(coords.w) > 0)
				{
					var rx = <?php echo $imagewidth;?> / coords.w;
					var ry = <?php echo $imageheight;?> / coords.h;

					jQuery('#preview').css({
						width: Math.round(rx * 500) + 'px',
						height: Math.round(ry * 370) + 'px',
						marginLeft: '-' + Math.round(rx * coords.x) + 'px',
						marginTop: '-' + Math.round(ry * coords.y) + 'px'
					});
				}
			}
			
						function updateCoords(c)
			{
				$('#x').val(c.x);
				$('#y').val(c.y);
				$('#w').val(c.w);
				$('#h').val(c.h);
			};

			function checkCoords()
			{
				if (parseInt($('#w').val())) return true;
				alert('Please select a crop region then press submit.');
				return false;
			};

		</script>

	</head>

	<body>

	<div id="outer">
	<div class="jcExample">
	<div class="article">

		<h1>Selecione a região de sua preferência</h1>

		<!-- This is the image we're attaching Jcrop to -->
		<table>
		<tr>
		<td>
		<img src="imagens/flowers.jpg" id="cropbox" />
		</td>
		<td>
		<div style="width:<?php echo $imagewidth;?>px;height:<?php echo $imageheight;?>px;overflow:hidden;">
			<img src="imagens/flowers.jpg" id="preview" />
		</div>
				<form action="test.php" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input type="submit" value="Crop Image" />
		</form>
		
		</td>
		</tr>
		</table>
	</div>
	</div>
	</div>
	</body>

</html>
