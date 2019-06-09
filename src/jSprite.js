let jSprite = function () {
    
    // log("jSprite");

    let args = {
        spriteSheet: false,
        container: false,
        columns: false,
        rows: false,
        autoStart: false,
        repeat: true,
        startFrame: 1,
        endFrame: false,
        length: false,
        timing: false,
        timings: false,
        widthOffset: 0,
        onStart: false,
        onStop: false,
        onProgress: false,
        onComplete: false,
        onRepeat: false,
    };
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

    // Process arguments
    if (arguments[0] && typeof (arguments[0]) == "object") {
        for (var key in arguments[0]) {
            if (args.hasOwnProperty(key)) {
                let v = arguments[0][key];
                if (v == undefined){
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
        frame: 1,
        frames: [],
        maxFrames: 0,
        noOfFramesToPlay: 0,
        stopRequested: false,
        status: "stopped", // playing, stopped
    };
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


    function init() {
        // log("jSprite.init()");

        // DOM vars
        vars.dom.container = document.getElementById(args.container);

        // validate args
        if (args.startFrame < 1){
            args.startFrame = 1;
        }

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
        vars.xLim = vars.spriteSheetW / vars.frameW;
        vars.yLim = vars.spriteSheetH / vars.frameH;

        // Handle width offset
        vars.frameW += args.widthOffset;

        // log("frameW = " + vars.frameW + "   frameH = " + vars.frameH);
        vars.dom.container.style.width = vars.frameW + "px";
        vars.dom.container.style.height = vars.frameH + "px";

        // Limits
        vars.maxFrames = args.columns * args.rows;
        // log("vars.maxFrames = " + vars.maxFrames);


        // log("BEFORE:");
        // log("args.startFrame = " + args.startFrame);
        // log("args.endFrame = " + args.endFrame);
        // log("args.length = " + args.length);

        // Calculate noOfFramesToPlay
        // endFrame takes priority over length
        if (args.length === false && args.endFrame === false){
            // Neither have been supplied use max frames for noOfFramesToPlay
            log("jSprite: Auto calculating no of frames in sprite [" + vars.img.src + "] [" + vars.maxFrames+ "].");
            vars.noOfFramesToPlay = vars.maxFrames;
            args.length = vars.maxFrames;
            args.endFrame = vars.maxFrames;
        } else {
            if (args.endFrame !== false){
                // log("jSprite: Detecting length based on args.endFrame");
                
                if (args.endFrame > vars.maxFrames){
                    console.warn("jSprite: You entered an incorrect end frame value [" + args.endFrame + "] for " + vars.img.src + " reverting to the maximum number of frames in sprite sheet [" + vars.maxFrames + "]");
                    vars.noOfFramesToPlay = vars.maxFrames;
                    args.length = vars.maxFrames;
                    args.endFrame = vars.maxFrames;
                } else {
                    vars.noOfFramesToPlay = args.endFrame - args.startFrame;
                    args.length = args.endFrame + args.startFrame - 1;
                }
            } else if (args.length !== false) {
                // log("jSprite: Detecting length based on args.length");
                
                if (args.length > vars.maxFrames || args.length <= 0){
                    console.warn("jSprite: You entered a length [" + args.length + "] for " + vars.img.src + " reverting to the maximum number of frames in sprite sheet [" + vars.maxFrames + "]");
                    vars.noOfFramesToPlay = vars.maxFrames;
                    args.length = vars.maxFrames;
                    args.endFrame = vars.maxFrames;
                } else {
                    vars.noOfFramesToPlay = args.length;
                    args.endFrame = args.startFrame + args.length - 1;
                }
                
            } else {
                // Should never get here but just encase
                vars.noOfFramesToPlay = vars.maxFrames;
                args.length = vars.maxFrames;
                args.endFrame = vars.maxFrames;
            }
        }

        // log("AFTER:");
        // log("maxFrames = " + vars.maxFrames);
        // log("args.startFrame = " + args.startFrame);
        // log("args.endFrame = " + args.endFrame);
        // log("args.length = " + args.length);
        // log("vars.noOfFramesToPlay = " + vars.noOfFramesToPlay);


        // Calculate all frames and background positions
        // NOTE: This was done in timing loop but to make start frame and end frame playback easier
        // the control to get specific frame from vars.frames by index (index = frame no you want)
        // is easier

        let frame = 0;
        for (let row=1; row <= args.rows; row++){
            for (let col=1; col <= args.columns; col++){
                frame++;
                let x = 0 - ((col - 1) * vars.frameW);
                let y = 0 - ((row - 1) * vars.frameH);

                // let msg = "";
                // msg += "row:" + row + "   ";
                // msg += "col:" + col + "   ";
                // msg += "x:" + x + "   ";
                // msg += "y:" + y + "   ";
                // log(msg);

                vars.frames.push( [x,y] );
            }
        }
        // log(vars.frames);


        // setup css background on container from img src
        let bg = "url(" + e.target.src + ")";
        vars.dom.container.style.backgroundImage = bg;
        vars.dom.container.style.backgroundRepeat = "no-repeat";
        vars.dom.container.style.backgroundPosition = "0px 0px";


        

        // log(args);
        // log(vars);

        vars.frame = args.startFrame;

        if (args.autoStart){
            if (args.onStart !== false){
                args.onStart();
            }
            animate();
        }
        
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -



    function animate() {
        // log("animate()");
        // log(vars.frame);

        // Handle stop request
        if (vars.stopRequested === true){
            vars.stopRequested = false;
            vars.status = "stopped";

            if (args.onStop !== false){
                args.onStop();
            }

            return;
        }


        vars.status = "playing";
       

        if (args.onProgress !== false){
            let o = {
                frame: vars.frame,
                totalFrames: vars.maxFrames
            }
            args.onProgress(o);
        }


        let x = vars.frames[(vars.frame-1)][0];
        let y = vars.frames[(vars.frame-1)][1];
        vars.dom.container.style.backgroundPosition = x + "px " + y + "px";

        let fTime = getFrameTime();
        
        // let msg = "";
        // msg += vars.frame + "/" + vars.maxFrames + "   ";
        // msg += "x:" + x + "   ";
        // msg += "y:" + y + "   ";
        // msg += "fTime:" + fTime + "   ";
        // // log(msg);
        // html("debug1",msg);


        // Move on
        vars.frame++;
        if (vars.frame <= args.endFrame) {
            setTimeout(animate, fTime);
        } else {
            vars.frame = args.startFrame;

            if (args.repeat) {

                if (args.onRepeat !== false){
                    args.onRepeat();
                }

                setTimeout(animate, fTime);
            } else {
                if (args.onComplete !== false){
                    args.onComplete();
                }

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
            let t = args.timings[(vars.frame-1)];
            // log(vars.frame + " : " + t);
            if (!t){
                t = 1000;
            }
            return t;
        }
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -



    function restart(){
        // log("jSprite.restart()");
        // log(vars.status);

        vars.frame = args.startFrame;
        if (vars.status == "stopped"){
            animate();
        }
    }



    function start() {
        // log("jSprite.start(): vars.status = " + vars.status);
        if (vars.status != "playing"){

            if (args.onStart !== false){
                args.onStart();
            }

            animate();
        }
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -




    function stop() {
        // log("jSprite.stop()");
        vars.stopRequested = true;
    }
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


    // UTILS
    function log(arg){ console.log(arg); }
    function convertUndefinedToFalse(v) {
        if (v == undefined){
            v = false;
        };
    }
    function html(id,value){
        let element = document.getElementById(id);
        if (element){
            element.innerHTML = value;
        }
    }


    // PUBLIC
    this.start = function () {
        start();
    }

    this.stop = function () {
        stop();
    }

    this.restart = function () {
        restart();
    }



    // Constructor simulation
    init();
    // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
}