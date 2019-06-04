let jSprite = function () {
    
    log("jSprite");

    let args = {
        spriteSheet: false,
        container: false,
        columns: false,
        rows: false,
        frames: false,
        timing: false,
        timings: false,
        repeat: true,
        widthOffset: false
    };
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    // Process arguments
    if (arguments[0] && typeof (arguments[0]) == "object") {
        for (var key in arguments[0]) {
            if (args.hasOwnProperty(key)) {
                args[key] = arguments[0][key];
            }
        }
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


    let vars = {
        dom: {
            container: false
        },
        img: false,
        spriteSheetW: 0,
        spriteSheetH: 0,
        frameW: 0,
        frameH: 0,
        frame: 0,
        maxFrames: 0,
        timer: false,
        col: 0,
        row: 1,
        prevCol: 0,
        prevRow: 0,
        x: 0,
        y: 0,
        xLim: 0,
        yLim: 0,
    };
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


    function init() {
        // log("jSprite.init()");

        // DOM vars
        vars.dom.container = document.getElementById(args.container);

        // validate args
        if (args.spriteSheet === false) {
            console.error("jsprite.js: usage error: you must specify a sprite sheet to use!");
            return;
        }

        if (args.container === false) {
            console.error("jsprite.js: usage error: you must specify a container (must be an element id");
            return;
        }

        if (args.columns === false) {
            console.error("jsprite.js: usage error: you must specify the no' of frames (columns) on the x axis!");
            return;
        }

        if (args.rows === false) {
            console.error("jsprite.js: usage error: you must specify the no' of frames (rows) onthe y axis!");
            return;
        }

        // if (args.noOfFrames === false){
        //     console.error("jsprite.js: usage error: you must specify the no' of frames!");
        //     return;
        // }

        if (args.timing === false && args.timings === false) {
            console.error("jsprite.js: usage error: you must specify either timing or timings for each frame!");
            return;
        }

        // Load sprite sheet image
        vars.img = new Image();
        vars.img.onload = imageLoaded;
        vars.img.src = args.spriteSheet;
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


    function imageLoaded(e) {
        // log("jSprite.imageLoaded(e)");
        // log(e);

        // We can now get the width and height of the sprite sheet calculate vars
        vars.spriteSheetW = e.target.width;
        vars.spriteSheetH = e.target.height;

        // log("e.target.width = " + e.target.width + "    e.target.height = " + e.target.height);
        vars.frameW = Math.ceil(e.target.width / args.columns);
        vars.frameH = Math.ceil(e.target.height / args.rows);

        if (args.widthOffset !== false){
            vars.frameW += args.widthOffset;
        }

        // log("frameW = " + vars.frameW + "   frameH = " + vars.frameH);
        vars.dom.container.style.width = vars.frameW + "px";
        vars.dom.container.style.height = vars.frameH + "px";

        // Limits
        vars.maxFrames = args.columns * args.rows;

        if (args.frames !== false) {
            vars.maxFrames = args.frames;
        }

        vars.xLim = vars.spriteSheetW / vars.frameW;
        vars.yLim = vars.spriteSheetH / vars.frameH;


        // setup css background on container from img src
        let bg = "url(" + e.target.src + ")";
        vars.dom.container.style.backgroundImage = bg;
        vars.dom.container.style.backgroundRepeat = "no-repeat";
        vars.dom.container.style.backgroundPosition = "0px 0px";





        animate();
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -



    function animate() {
        // log("jSprite.animate()");
        vars.frame++;
        vars.col++;

        if (vars.col > args.columns) {
            vars.col = 1;
            vars.row++;

            if (vars.row > args.rows) {
                vars.row = 1;
            }
        }

        vars.x = 0 - ((vars.col - 1) * vars.frameW);
        vars.y = 0 - ((vars.row - 1) * vars.frameH);

        // let msg = "";
        // msg += vars.frame + "/" + vars.maxFrames + ":   ";
        // msg += "col:" + vars.col + "/" + args.columns + "   ";
        // msg += "row:" + vars.row + "/" + args.rows + "   ";
        // msg += "x:" + vars.x + "   y:" + vars.y + "   ";
        // msg += "frameTime: " + getFrameTime() + "   ";
        // log(msg);

        vars.dom.container.style.backgroundPosition = vars.x + "px " + vars.y + "px";

        // Limits
        if (vars.frame < vars.maxFrames) {

            setTimeout(animate, getFrameTime())
        } else {
            if (args.repeat) {
                vars.frame = 0;
                vars.col = 0;
                vars.row = 1;
                setTimeout(animate, getFrameTime())
            }
        }


    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




    function getFrameTime() {
        // timing vars
        if (args.timing !== false) {
            // timing is constant
            return args.timing

        } else {
            // timing is array based must be same size as frames
            let t = args.timings[(vars.frame-1)];
            if (!t){
                t = 1000;
            }
            return t;
        }
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




    function start() {
        log("jSprite.start()");

        if (vars.timer !== false) {
            clearInterval(vars.timer);
            vars.timer = false;
        }

        vars.timer = setInterval(animate, 1000);
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


    function stop() {
        log("jSprite.stop()");
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


    // UTILS
    function log(arg){ console.log(arg); }


    // PUBLIC
    this.start = function () {
        start();
    }

    this.stop = function () {
        stop();
    }



    // Constructor simulation
    init();
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}