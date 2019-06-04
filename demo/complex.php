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
        // Utils
        String.prototype.replaceAll = function(search, replacement) {
            var target = this;
            return target.replace(new RegExp(search, 'g'), replacement);
        };
        function log(arg){ console.log(arg); }


        let sprite = [];

        function init(){
            let template = "";
            template += "<div id='demo[no]' class='bd p5'>\n";
            template += "\t"+"<div id='sp[no]' class='bd m5'></div>\n";
            template += "\t"+"<div class='btn-container'>\n";
            template += "\t\t"+"<button onclick='sprite[[no]].start()' class='btn-left'>START</button>\n";
            template += "\t\t"+"<button onclick='sprite[[no]].stop()' class='btn-right'>STOP</button>\n";
            template += "\t"+"</div>\n";
            template += "</div>\n\n"

            let spriteSheets = [];

            let contentDefinitions = [
                {
                    src: "./images/sheet1.png",
                    columns: 12,
                    rows: 7,
                    frames: 64,
                    widthOffset: -6,
                    timing: 30,
                    repeat: true
                },
                {
                    src: "./images/sheet2.png",
                    columns: 4,
                    rows: 4,
                    widthOffset: 0,
                    timing: 30,
                    repeat: true
                },
                {
                    src: "./images/sheet3.png",
                    columns: 7,
                    rows: 4,
                    widthOffset: 0,
                    frames: 27,
                    timing: 30,
                    repeat: true
                },
                {
                    src: "./images/sheet4.png",
                    columns: 6,
                    rows: 2,
                    frames: 6,
                    timings: [100,150,200,250,300,350],
                    repeat: true
                },
                {
                    src: "./images/sheet5.png",
                    columns: 8,
                    rows: 4,
                    widthOffset: 0,
                    timing: 50,
                    repeat: false
                },
                {
                    src: "./images/sheet6.png",
                    columns: 8,
                    rows: 2,
                    widthOffset: 0,
                    timing: 50,
                    repeat: true
                },
                {
                    src: "./images/sheet7.png",
                    columns: 8,
                    rows: 4,
                    widthOffset: 0,
                    timing: 50,
                    repeat: true
                },
            ];


            // DOM Demo container
            let container = document.getElementById("demo");

            // Build html
            let html = "";
            for (let i=0; i < contentDefinitions.length; i++){
                let sp = contentDefinitions[i];
                let temp = template;
                temp = temp.replace(/\[no\]/g, i);
                // temp.replaceAll("[no]",i);
                html += temp;
            }
            container.innerHTML = html;

            // Init sprites
            for (let i=0; i < contentDefinitions.length; i++){
                let sp = contentDefinitions[i];
                // log(sp);
                sprite[i] = new jSprite({
                    spriteSheet: sp.src,
                    container: "sp" + i,
                    columns: sp.columns,
                    rows: sp.rows,
                    widthOffset: sp.widthOffset,
                    frames: sp.frames,
                    timing: sp.timing,
                    timings: sp.timings,
                    // timings: [100,200,300,400,500,600],
                    repeat: sp.repeat
                });
            }

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




<div id="demo" class="bd p5"></div>


</body>
</html>
