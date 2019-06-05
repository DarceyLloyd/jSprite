<!DOCTYPE HTML>
<html>

<head>
	<title>jSprite - Darcey@aftc.io</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="./includes/css/main.css" />

	<link rel="stylesheet" href="./includes/css/styles.css">
    <script src="./jsprite.min.js?v=<?php echo(rand(0,9999999)); ?>"></script>
    <!-- <script src="../dist/jsprite.js?v=<?php echo(rand(0,9999999)); ?>"></script> -->

	<script>
		let sp1,sp2,sp3,sp4,sp5,sp6,sp7,sp8,sp9,sp10,sp11;

		function init(){
			sp1 = new jSprite({
				spriteSheet: "./images/sheet1.png",
				container: "sp1",
				columns: 6,
				rows: 6,
				// widthOffset: -6,
				startFrame: 1,
				timing: 100,
				repeat: true
			});


			sp2 = new jSprite({
				spriteSheet: "./images/sheet2.png",
				container: "sp2",
				columns: 8,
				rows: 10,
				widthOffset: 0,
				timing: 120,
				repeat: true
			});


			sp3 = new jSprite({
				spriteSheet: "./images/sheet3.png",
				container: "sp3",
				columns: 7,
				rows: 4,
				widthOffset: 0,
				startFrame: 1,
				endFrame: 27,
				// length: 4,
				timing: 30,
				repeat: true
			});


			sp4 = new jSprite({
				spriteSheet: "./images/sheet4.png",
				container: "sp4",
				columns: 6,
				rows: 2,
				widthOffset: 0,
				startFrame: 1,
				endFrame: 6,
				// length: 4,
				timing: 100,
				repeat: true
			});


			sp5 = new jSprite({
				spriteSheet: "./images/sheet5.png",
				container: "sp5",
				columns: 8,
				rows: 4,
				widthOffset: 0,
				startFrame: 1,
				// endFrame: 27,
				// length: 4,
				timing: 30,
				repeat: false
			});


			sp6 = new jSprite({
				spriteSheet: "./images/sheet6.png",
				container: "sp6",
				columns: 8,
				rows: 2,
				widthOffset: 0,
				startFrame: 1,
				// endFrame: 27,
				// length: 4,
				timing: 30,
				repeat: true
			});



			sp7 = new jSprite({
				spriteSheet: "./images/sheet8.png",
				container: "sp7",
				columns: 6,
				rows: 3,
				widthOffset: 0,
				startFrame: 0,
				// endFrame: 27,
				// length: 4,
				timing: 500,
				repeat: true
            });
            
            sp8 = new jSprite({
				spriteSheet: "./images/sheet7.png",
				container: "sp8",
				columns: 8,
				rows: 4,
				widthOffset: 0,
				length: 8,
				timing: 75,
				repeat: true
			});


			sp9 = new jSprite({
				spriteSheet: "./images/sheet7.png",
				container: "sp9",
				columns: 8,
				rows: 4,
				widthOffset: 0,
				startFrame: 9,
				// endFrame: 27,
				length: 8,
				timing: 75,
				repeat: true
			});


			sp10 = new jSprite({
				spriteSheet: "./images/sheet7.png",
				container: "sp10",
				columns: 8,
				rows: 4,
				widthOffset: 0,
				startFrame: 17,
				// endFrame: 27,
				length: 8,
				timing: 75,
				repeat: true
            });
            
            
            sp11 = new jSprite({
				spriteSheet: "./images/sheet7.png",
				container: "sp11",
				columns: 8,
				rows: 4,
				widthOffset: 0,
				startFrame: 25,
				// endFrame: 27,
				length: 8,
				timing: 100,
				repeat: true
			});
		}
	</script>

</head>

<body id="top" onload="init()">

<div id="debug">
    <div id="debug1" class="item">debug1</div>
    <div id="debug2" class="item">debug2</div>
    <div id="debug3" class="item">debug3</div>
    <div id="debug4" class="item">debug4</div>
    <div id="debug5" class="item">debug5</div>
</div>

	<section id="banner" data-video="images/banner">
		<div class="inner">
			<header>
				<h1>jSprite</h1>
				<p>Quick and easy JavaScript sprites.<br>
					<a href="https://github.com/DarceyLloyd/jSprite" target="_blank">https://github.com/DarceyLloyd/jSprite</a></p>
			</header>

		</div>
	</section>




			<div class="box">	
				<div class="inner">
					<h3>USAGE:</h3>
					<pre style="text-align: left; max-width: 200px; width: 100%; margin: auto;">
sp10 = new jSprite({
	spriteSheet: "./images/sheet7.png",
	container: "htmlID",
	columns: 8,
	rows: 4,
	widthOffset: 0,
	startFrame: 17,
	length: 8,
	timing: 75,
	repeat: true
});
					</pre>
					<h4>Parameter details:</h4>
					<table style="width: 60%; margin: auto;">
						<tr>
							<th>Name</th>
							<th>Type</th>
							<th></th>
							<th>Info</th>
						</tr>
						<tr>
							<td>spriteSheet</td>
							<td>String</td>
							<td>REQUIRED</td>
							<td>The path to the sprite sheet image</td>
						</tr>
						<tr>
							<td>container</td>
							<td>String</td>
							<td>REQUIRED</td>
							<td>ID of html element to use for the sprite</td>
						</tr>
						<tr>
							<td>columns</td>
							<td>Number</td>
							<td>REQUIRED</td>
							<td>The number of columns your sprite sheet has</td>
						</tr>
						<tr>
							<td>rows</td>
							<td>Number</td>
							<td>REQUIRED</td>
							<td>The number of rows your sprite sheet has</td>
						</tr>
						<tr>
							<td>timing</td>
							<td>Number</td>
							<td>REQUIRED</td>
							<td>The delay in ms between each frame</td>
						</tr>
						<tr>
							<td>widthOffset</td>
							<td>Number</td>
							<td></td>
							<td>If the sprite is not quite divisible by it's no of columns then you can adjust it with the widthOffset</td>
						</tr>
						<tr>
							<td>startFrame</td>
							<td>Number</td>
							<td></td>
							<td>The number of which frame you would like to start on</td>
						</tr>
						<tr>
							<td>length</td>
							<td>Number</td>
							<td></td>
							<td>The number of frames you would like to play from the start frame (do not exceed max length)</td>
						</tr>
						<tr>
							<td>repeat</td>
							<td>Boolean</td>
							<td></td>
							<td>Do you want the sprite animation to repeat, yes = true, no = false</td>
						</tr>
					</table>

					<hr>

					<h4>Available methods:</h4>
					<table style="width: 60%; margin: auto;">
						<tr>
							<th>Name</th>
							<th>Info</th>
						</tr>
						<tr>
							<td>start()</td>
							<td>Starts/resumes the sprite animation</td>
						</tr>
						<tr>
							<td>stop()</td>
							<td>Stops the sprite animation</td>
						</tr>
						<tr>
							<td>restart()</td>
							<td>Restarts the sprite animation from start</td>
						</tr>
					</table>					

				</div>
			</div>




	<!-- Main -->
	<div id="main">
		<div class="inner">

			<!-- Boxes -->
			<div class="thumbnails">

				<div class="box">
					<!-- <a href="https://youtu.be/s6zR2T9vn2c" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					<div class="sprite-container">
						<div id="sp1" class="sprite"></div>
					</div>
					<div class="inner">
						<h3>Example 1</h3>
						<p>new jSprite(options);</p>
						<div class="btn-container">
							<button onclick="sp1.start()" class="btn-left button style2">START</button>
							<button onclick="sp1.stop()" class="btn-right button style2">STOP</button>
						</div>
					</div>
				</div>

				<div class="box">
					<!-- <a href="https://youtu.be/s6zR2T9vn2c" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					<div class="sprite-container">
						<div id="sp2" class="sprite"></div>
					</div>
					<div class="inner">
						<h3>Example 2</h3>
						<p>new jSprite(options);</p>
						<div class="btn-container">
							<button onclick="sp2.start()" class="btn-left button style2">START</button>
							<button onclick="sp2.stop()" class="btn-right button style2">STOP</button>
						</div>
					</div>
				</div>

				<div class="box">
					<!-- <a href="https://youtu.be/s6zR2T9vn2c" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					<div class="sprite-container">
						<div id="sp3" class="sprite"></div>
					</div>
					<div class="inner">
						<h3>Example 3</h3>
						<p>new jSprite(options);</p>
						<div class="btn-container">
							<button onclick="sp3.start()" class="btn-left button style2">START</button>
							<button onclick="sp3.stop()" class="btn-right button style2">STOP</button>
						</div>
					</div>
				</div>

				<div class="box">
					<!-- <a href="https://youtu.be/s6zR2T9vn2c" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					<div class="sprite-container">
						<div id="sp4" class="sprite"></div>
					</div>
					<div class="inner">
						<h3>Example 4</h3>
						<p>new jSprite(options);</p>
						<div class="btn-container">
							<button onclick="sp4.start()" class="btn-left button style2">START</button>
							<button onclick="sp4.stop()" class="btn-right button style2">STOP</button>
						</div>
					</div>
				</div>

				<div class="box">
					<!-- <a href="https://youtu.be/s6zR2T9vn2c" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					<div class="sprite-container">
						<div id="sp5" class="sprite"></div>
					</div>
					<div class="inner">
						<h3>No repeat example 5</h3>
						<p>new jSprite(options);</p>
						<div class="btn-container">
							<button onclick="sp5.start()" class="btn-left button style2">START/RESUME</button>
							<button onclick="sp5.restart()" class="btn-left button style2">START/RESTART</button>
							<button onclick="sp5.stop()" class="btn-right button style2">STOP</button>
						</div>
					</div>
				</div>

				<div class="box">
					<!-- <a href="https://youtu.be/s6zR2T9vn2c" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					<div class="sprite-container">
						<div id="sp6" class="sprite"></div>
					</div>
					<div class="inner">
						<h3>Example 6</h3>
						<p>new jSprite(options);</p>
						<div class="btn-container">
							<button onclick="sp6.start()" class="btn-left button style2">START</button>
							<button onclick="sp6.stop()" class="btn-right button style2">STOP</button>
						</div>
					</div>
				</div>

				<div class="box">
					<!-- <a href="https://youtu.be/s6zR2T9vn2c" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					<div class="sprite-container">
						<div id="sp7" class="sprite"></div>
					</div>
					<div class="inner">
						<h3>Example 7</h3>
						<p>new jSprite(options);</p>
						<div class="btn-container">
							<button onclick="sp7.start()" class="btn-left button style2">START</button>
							<button onclick="sp7.stop()" class="btn-right button style2">STOP</button>
						</div>
					</div>
				</div>

				<div class="box">
					<!-- <a href="https://youtu.be/s6zR2T9vn2c" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					<div class="sprite-container">
						<div id="sp8" class="sprite"></div>
					</div>
					<div class="inner">
						<h3>Example 8</h3>
						<p>new jSprite(options);</p>
						<div class="btn-container">
							<button onclick="sp8.start()" class="btn-left button style2">START</button>
							<button onclick="sp8.stop()" class="btn-right button style2">STOP</button>
						</div>
					</div>
				</div>

				<div class="box">
					<!-- <a href="https://youtu.be/s6zR2T9vn2c" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					<div class="sprite-container">
						<div id="sp9" class="sprite"></div>
					</div>
					<div class="inner">
						<h3>Example 9</h3>
						<p>new jSprite(options);</p>
						<div class="btn-container">
							<button onclick="sp9.start()" class="btn-left button style2">START</button>
							<button onclick="sp9.stop()" class="btn-right button style2">STOP</button>
						</div>
					</div>
				</div>

				<div class="box">
					<!-- <a href="https://youtu.be/s6zR2T9vn2c" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					<div class="sprite-container">
						<div id="sp10" class="sprite"></div>
					</div>
					<div class="inner">
						<h3>Example 10</h3>
						<p>new jSprite(options);</p>
						<div class="btn-container">
							<button onclick="sp10.start()" class="btn-left button style2">START</button>
							<button onclick="sp10.stop()" class="btn-right button style2">STOP</button>
						</div>
					</div>
				</div>



                <div class="box">
					<!-- <a href="https://youtu.be/s6zR2T9vn2c" class="image fit"><img src="images/pic01.jpg" alt="" /></a> -->
					<div class="sprite-container">
						<div id="sp11" class="sprite"></div>
					</div>
					<div class="inner">
						<h3>Example 11</h3>
						<p>new jSprite(options);</p>
						<div class="btn-container">
							<button onclick="sp11.start()" class="btn-left button style2">START</button>
							<button onclick="sp11.stop()" class="btn-right button style2">STOP</button>
						</div>
					</div>
				</div>

				

			</div>

		</div>
	</div>

	<!-- Footer -->
	<footer id="footer">
		<div class="inner">
			<h2><a href="https://github.com/DarceyLloyd/jSprite" target="_blank">https://github.com/DarceyLloyd/jSprite</a></h2>
			<p><a href="mailto:darcey@aftc.io" target="_blank">darcey@aftc.io</a></p>
		</div>
	</footer>

</body>

</html>