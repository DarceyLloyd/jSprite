<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jSprite - Darcey@aftc.io</title>
    <script src="../dist/jsprite.js"></script>
    <style>
    .bd {
        border: 1px solid #000000;
    }
    .m5 {
        margin: 5px;
    }
    #sp1 {
        
    }
    </style>
    <script>
        let sp1,sp2,sp3;

        function init(){
            sp1 = new jSprite({
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

            sp2 = new jSprite({
                spriteSheet: "./images/sheet2.png",
                container: "sp2",
                columns: 4,
                rows: 4,
                timing: 30,
                // timings: [100,200,300,400,500,600],
                repeat: true
            });

            sp3 = new jSprite({
                spriteSheet: "./images/sheet3.png",
                container: "sp3",
                columns: 7,
                rows: 4,
                frames: 27,
                timing: 30,
                // timings: [100,200,300,400,500,600],
                repeat: true
            });

            sp4 = new jSprite({
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

<div id="sp1" class="bd m5"></div>
<div id="sp2" class="bd m5"></div>
<div id="sp3" class="bd m5"></div>
<div id="sp4" class="bd m5"></div>

</body>
</html>