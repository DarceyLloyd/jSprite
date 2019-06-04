let jSprite = function() {

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
        widthOffset: 0
    };
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    // Process arguments
    if (arguments[0] && typeof(arguments[0]) == "object") {
        for (var key in arguments[0]) {
            if (args.hasOwnProperty(key)) {
                let v = arguments[0][key];
                if (v == undefined) {
                    args[key] = false;
                } else {
                    args[key] = arguments[0][key];
                }
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
        frames: [],
        maxFrames: 0,
        timer: false,
        col: 0,
        row: 1,
        x: 0,
        y: 0,
        xLim: 0,
        yLim: 0,
        play: true,
        status: "stopped", // playing, stopped
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
        // log(e.target);

        // We can now get the width and height of the sprite sheet calculate vars
        vars.spriteSheetW = e.target.width;
        vars.spriteSheetH = e.target.height;

        // log("e.target.width = " + e.target.width + "    e.target.height = " + e.target.height);
        vars.frameW = Math.ceil(e.target.width / args.columns);
        vars.frameH = Math.ceil(e.target.height / args.rows);

        // Handle width offset
        vars.frameW += args.widthOffset;

        // log("frameW = " + vars.frameW + "   frameH = " + vars.frameH);
        vars.dom.container.style.width = vars.frameW + "px";
        vars.dom.container.style.height = vars.frameH + "px";

        // Limits
        vars.maxFrames = args.columns * args.rows;

        if (typeof(args.frames) == "number") {
            vars.maxFrames = args.frames;
        }

        vars.xLim = vars.spriteSheetW / vars.frameW;
        vars.yLim = vars.spriteSheetH / vars.frameH;

        // Calculate all frames and background positions
        // NOTE: This was done in timing loop but to make start frame and end frame playback easier
        // the control to get specific frame from vars.frames by index (index = frame no you want)
        // is easier

        for (let row = 1; row <= args.rows; row++) {
            for (let col = 1; col <= args.columns; col++) {


                if (vars.col > args.columns) {
                    vars.col = 1;
                    vars.row++;

                    if (vars.row > args.rows) {
                        vars.row = 1;
                    }
                }

                vars.x = 0 - ((vars.col - 1) * vars.frameW);
                vars.y = 0 - ((vars.row - 1) * vars.frameH);

            }
        }



        // setup css background on container from img src
        let bg = "url(" + e.target.src + ")";
        vars.dom.container.style.backgroundImage = bg;
        vars.dom.container.style.backgroundRepeat = "no-repeat";
        vars.dom.container.style.backgroundPosition = "0px 0px";


        // log(args);
        // log(vars);

        animate();
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -



    function animate() {
        // log("jSprite.animate()");
        if (vars.play !== false) {
            vars.status = "playing";
        }
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
        let frameTime = getFrameTime();

        if (vars.frame < vars.maxFrames) {
            if (vars.play) {
                setTimeout(animate, frameTime);
            }
        } else {
            vars.frame = 0;
            vars.col = 0;
            vars.row = 1;

            if (args.repeat) {
                if (vars.play) {
                    setTimeout(animate, frameTime);
                } else {
                    vars.status = "stopped";
                }
            } else {
                vars.status = "stopped";
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
            let t = args.timings[(vars.frame - 1)];
            // log(vars.frame + " : " + t);
            if (!t) {
                t = 1000;
            }
            return t;
        }
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




    function start(reset = false) {
        // log("jSprite.start()");
        // log(vars.status);

        if (reset) {
            vars.play = true;
            vars.col = 0;
            vars.row = 1;
            vars.frame = 0;
        }

        if (vars.status != "playing") {
            vars.play = true;
            animate();
        }

        // if (vars.timer !== false) {
        //     clearInterval(vars.timer);
        //     vars.timer = false;
        // }
        // vars.timer = setInterval(animate, 1000);
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




    function stop() {
        // log("jSprite.stop()");

        vars.play = false;
        vars.status = "stopped";

        // clearInterval(vars.timer);
        // vars.timer = false;
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


    // UTILS
    function log(arg) {
        console.log(arg);
    }

    function convertUndefinedToFalse(v) {
        if (v == undefined) {
            v = false;
        };
    }


    // PUBLIC
    this.start = function() {
        start();
    }

    this.stop = function() {
        stop();
    }



    // Constructor simulation
    init();
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}