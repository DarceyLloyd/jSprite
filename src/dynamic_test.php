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


<div id="demo" class="bd p5"></div>


</body>
</html>
