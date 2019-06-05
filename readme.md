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


<h4>Parameter details:</h4>
<table>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th></th>
        <th>Info</th>
    </tr>
    <tr>
        <td>spriteSheet</td>
        <td>String</td>
        <td>REQUIRED</td>
        <td>The path to the sprite sheet image</td>
    </tr>
    <tr>
        <td>container</td>
        <td>String</td>
        <td>REQUIRED</td>
        <td>ID of html element to use for the sprite</td>
    </tr>
    <tr>
        <td>columns</td>
        <td>Number</td>
        <td>REQUIRED</td>
        <td>The number of columns your sprite sheet has</td>
    </tr>
    <tr>
        <td>rows</td>
        <td>Number</td>
        <td>REQUIRED</td>
        <td>The number of rows your sprite sheet has</td>
    </tr>
    <tr>
        <td>timing</td>
        <td>Number</td>
        <td>REQUIRED</td>
        <td>The delay in ms between each frame</td>
    </tr>
    <tr>
        <td>widthOffset</td>
        <td>Number</td>
        <td></td>
        <td>If the sprite is not quite divisible by it's no of columns then you can adjust it with the widthOffset</td>
    </tr>
    <tr>
        <td>startFrame</td>
        <td>Number</td>
        <td></td>
        <td>The number of which frame you would like to start on</td>
    </tr>
    <tr>
        <td>length</td>
        <td>Number</td>
        <td></td>
        <td>The number of frames you would like to play from the start frame (do not exceed max length)</td>
    </tr>
    <tr>
        <td>repeat</td>
        <td>Boolean</td>
        <td></td>
        <td>Do you want the sprite animation to repeat, yes = true, no = false</td>
    </tr>
</table>





					----- 





<h4>Available methods:</h4>
<table>
    <tr>
        <th>Name</th>
        <th>Info</th>
    </tr>
    <tr>
        <td>start()</td>
        <td>Starts/resumes the sprite animation</td>
    </tr>
    <tr>
        <td>stop()</td>
        <td>Stops the sprite animation</td>
    </tr>
    <tr>
        <td>restart()</td>
        <td>Restarts the sprite animation from start</td>
    </tr>
</table>		



### <b>USAGE DEMOS:</b>
DEMO: <a href="https://aftc.io/jSprite/" target="_blank">https://aftc.io/jSprite/</a>