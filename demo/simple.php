
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jSprite - Darcey@aftc.io</title>
    <script src="./jsprite.min.js?v=<?php echo(rand(0,9999999)); ?>"></script>
    <style>
    .bd {
        border: 1px solid #000000;
    }
    .p5 {
        padding: 5px;
    }
    .m5 {
        margin: 5px;
    }
    button {
        cursor: pointer;
    }


    #demo {
        display: flex;
        flex-wrap: wrap;
    }


    #demo > div {
        margin: 5px;
        background: #FFCC00;
        flex: 1;
    }
    
    #demo .btn-container {
        display: flex;
        /* flex-direction: row; */
        /* flex-wrap: no-wrap; */
    }

    #demo .btn-container .btn-left {
        display: inline-block;
        width: 50%;
        
    }

    #demo .btn-container .btn-right {
        display: inline-block;
        width: 50%;
    }
    </style>
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