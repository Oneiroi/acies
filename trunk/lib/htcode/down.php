<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en_GB">
	<head>
		<title>
			It's Dead, Jim ...
		</title>
		<style type="text/css">
			#wrapper {
			width: 600px;
			margin: 0px auto;
			padding: 30px;
			}
			body{
			 font-family: Arial, Helvetica, sans-serif;
			 font-weight: bold;
			 text-align: center;
			 background-color: #FFFFFF;
			}
			#footer
			{
				width: 600px;
				margin: 0px auto;
				padding: 30px;
			}
			.footer
			{
				font-size: 11px;
				text-align: center;
				font-weight: normal;
			}
			
		</style>
	</head>
	<body topmargin="8">
		<div id="wrapper">
			<?php
				if(ACIES_SITE_ID > 0)
				{
			?>
			<br />
			<?php
				}
				else
				{
					echo $_SERVER['SERVER_NAME']."<br />";
				}
			?>
			<img src="<?PHP echo ACIES_IMAGES;?>/acies_error.jpg" />
			<br />
			Seems in our excitement we broke this one, check back after we're done <span style="text-decoration: line-through;">scraping the remains into a bucket</span> cleaning up...
		</div>
		<div id="footer" class="footer">
			Acies &copy; 2008 David Busby Saiweb.co.uk
			<br />
			Acies Latin: sharp edge or point; mental acuity, sharpness of vision
			<br />
			NOTE: The "down" page will be displayed untill Acies leaves BETA
		</div>
	</body>
</html>