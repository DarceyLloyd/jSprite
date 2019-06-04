
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jSprite - Darcey@aftc.io</title>
    <script src="./jsprite.min.js?v=<?php echo(rand(0,9999999)); ?>"></script>
    <link rel="stylesheet" href="styles.css">
    
    <script>
        let sprite = [];

        function init(){
            sprite[0] = new jSprite({
                spriteSheet: "./images/sheet1.png",
                container: "sp1",
                columns: 12,
                rows: 7,
                widthOffset: -6,
                frames: 64,
                timing: 30,
                // timings: [100,200,300,400,500,600],
                repeat: true
            });

            sprite[1] = new jSprite({
                spriteSheet: "./images/sheet2.png",
                container: "sp2",
                columns: 4,
                rows: 4,
                timing: 30,
                // timings: [100,200,300,400,500,600],
                repeat: true
            });

            sprite[2] = new jSprite({
                spriteSheet: "./images/sheet3.png",
                container: "sp3",
                columns: 7,
                rows: 4,
                frames: 27,
                timing: 30,
                // timings: [100,200,300,400,500,600],
                repeat: true
            });

            sprite[3] = new jSprite({
                spriteSheet: "./images/sheet4.png",
                container: "sp4",
                columns: 6,
                rows: 2,
                frames: 6,
                // timing: 130,
                timings: [100,150,200,250,300,350],
                repeat: true
            });

        }
    </script>
</head>
<body onload="init()">

<h2>jSprite</h2>
<a href="https://github.com/DarceyLloyd/jSprite" target="_blank">https://github.com/DarceyLloyd/jSprite</a>


<h4>Quick and easy JavaScript sprites for use in your html.</h4>

<hr>

<b>USAGE:</b><br>
<ul>
<li>Set spriteSheet to the src of the sprite sheet image</li>
<li>Set container to the ID of the html element that will contain your sprite</li>
<li>Set no of columns the sprite sheet has</li>
<li>Set no of rows the sprite sheet has</li>
<li>If your sprite sheet doesn't use all the rows and columns you can specify the no of frames like so "frames:44"</li>
<li>If your sprite is not aligned on the x axis correctly you can adjust the x offset viaw "widthOffset: -5"</li>
<li>Set the timing of the sprite, note you can control the timings of each frame individually if you use timings and feed it an array of number matching the number of frames in your sprite.</li>
</ul>

<hr>

<b>NOTE:</b><br>
jSprite will resize the container to the dimensions it calculates the a single sprite frame to be, if you wish to adjust size of the sprite you can use transform scale via css or javascript.


<pre>
let mySprite = new jSprite({
    spriteSheet: "./images/sheet1.png",
    container: "sp1",
    columns: 12,
    rows: 7,
    widthOffset: -6,
    timing: 30,
    // timings: [100,200,300,400,500,600],
    repeat: true
});

</pre>





<div id="demo" class="bd p5">

    <div id="demo1" class="bd p5">
        <div id="sp1" class="m5"></div>
        <div class="btn-container">
            <button onclick="sprite[0].start()" class="btn-left">START</button>
            <button onclick="sprite[0].stop()" class="btn-right">STOP</button>
        </div>
    </div>


    <div id="demo2" class="bd p5">
        <div id="sp2" class="m5"></div>
        <div class="btn-container">
            <button onclick="sprite[1].start()" class="btn-left">START</button>
            <button onclick="sprite[1].stop()" class="btn-right">STOP</button>
        </div>
    </div>


    <div id="demo3" class="bd p5">
        <div id="sp3" class="m5"></div>
        <div class="btn-container">
            <button onclick="sprite[2].start()" class="btn-left">START</button>
            <button onclick="sprite[2].stop()" class="btn-right">STOP</button>
        </div>
    </div>



    <div id="demo4" class="bd p5">
        <div id="sp4" class="m5"></div>
        <div class="btn-container">
            <button onclick="sprite[3].start()" class="btn-left">START</button>
            <button onclick="sprite[3].stop()" class="btn-right">STOP</button>
        </div>
    </div>




</div>


</body>
</html>