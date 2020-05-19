
let board = [];
let myBoard =[];


$(document).ready(function(){

    var rows = 4;
    var cols = 4;
    var squareSize = 50;

    // get the container element
    var boardContainer = document.getElementById("gameboard");
    var myContainer = document.getElementById("gameboard1");

    // make the grid columns and rows
    for (i = 0; i < cols; i++) {
        for (j = 0; j < rows; j++) {

            // create a new div HTML element for each grid square and make it the right size
            var square = document.createElement("div");
            var square2 = document.createElement("div");

            boardContainer.appendChild(square);
            myContainer.appendChild(square2);

            // give each div element a unique id based on its row and column, like "s00"
            square.id = 's' + j + i;
            square2.id = "p" + j + i;

            // set each grid square's coordinates: multiples of the current row or column number
            var topPosition = j * squareSize;
            var leftPosition = i * squareSize;

            // use CSS absolute positioning to place each grid square on the page
            square.style.top = topPosition + 'px';
            square.style.left = leftPosition + 'px';

            square2.style.top = topPosition + 'px';
            square2.style.left = leftPosition + 'px';
        }
    }

});


function setBoard() {


    var i=document.getElementById('i').value;
    var j = document.getElementById('j').value;
    var params = {
        i: i,
        j: j
    };


    $.post("Player2", $.param(params), function(response) {

    });
}


function getMyBoard2() {

    var a = $.get("Player1", function(responseJson) {
        $.each(responseJson, function(index, item) {
            myBoard.push(item);

        });

        for (i = 0; i < 4; i++)
            for (j = 0; j < 4; j++) {

                if (myBoard[i][j] === 1) {
                    document.getElementById('p' + i + j).style.background = 'blue';
                } else if (myBoard[i][j] === 2) {
                    document.getElementById('p' + i + j).style.background = 'black';
                }
            }


        myBoard= [];
    });
}

function getBoard2() {
    var b;
    var a = $.get("Player2", function(responseJson) {
        $.each(responseJson, function(index, item) {
            board.push(item);

        });
        var row=document.getElementById('i').value;
        var col = document.getElementById('j').value;

        for (i = 0; i < 4; i++)
            for (j = 0; j < 4; j++) {

                if (board[i][j] === 3) {
                    document.getElementById('s' + i + j).style.background = '#bbb';
                } else if (board[i][j] === 2) {
                    document.getElementById('s' + i + j).style.background = 'red';
                }
            }

    });

    console.log(board);


}

