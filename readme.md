# <b>jSprite</b>

## Quick and easy JavaScript sprites for use in your html.


<b>USAGE:</b><br>
- Set spriteSheet to the src of the sprite sheet image
- Set container to the ID of the html element that will contain your sprite
- Set no of columns the sprite sheet has
- Set no of rows the sprite sheet has
- If your sprite sheet doesn't use all the rows and columns you can specify the no of frames like so "frames:44"
- If your sprite is not aligned on the x axis correctly you can adjust the x offset viaw "widthOffset: -5"
- Set the timing of the sprite, note you can control the timings of each frame individually if you use timings and feed it an array of number matching the number of frames in your sprite.

<br><br>

<b>NOTE:</b><br>
jSprite will resize the container to the dimensions it calculates the a single sprite frame to be, if you wish to adjust size of the sprite you can use transform scale via css or javascript.


````
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

````



### <b>USAGE DEMOS:</b>

DEMO 1: <a href="https://aftc.io/jSprite/" target="_blank">https://aftc.io/jSprite/</a>

DEMO 2: <a href="https://aftc.io/jSprite/dynamic" target="_blank">https://aftc.io/jSprite/dynamic</a>