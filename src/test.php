<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../dist/jsprite.js"></script>
    <script>
        let sp1,sp2,sp3;

        function init(){
            sp1 = new jSprite({
                spriteSheet: "./images/sheet1.png",
                container: "sp1",
                frameWidth: 20,
                frameHeight: 20,
                offsetTop: 0,
                offsetLeft: 0,
            });
        }
    </script>
</head>
<body onload="init()">

<div id="sp1"></div>

</body>
</html>