var isX = true;
var stepCount = 0; //max 9
var nWinsX = 0;
var nGames = 0;
var nWinsO = 0;
var arrayX = [];
var arrayO = [];

var cell = document.getElementsByClassName("cell");
var msgTitle = document.getElementById("event");
var msgWinX = document.getElementById("winX");
var msgCountGames = document.getElementById("countGames");
var msgWinO = document.getElementById("winO");
var reset = document.getElementById("reset");
var changeSize = document.getElementById("changeSize");
var matrixWin = [
    [1, 2, 3], //1 2 3
    [4, 5, 6], //4 5 6
    [7, 8, 9], //7 8 9
    [1, 4, 7], 
    [2, 5, 8],
    [3, 6, 9],
    [1, 5, 9], 
    [3, 5, 7]
];

//var symb;
//var currentSize = 3;
//function checkDiagonal(symb, currentSize) { 
//	var toright = true; 
//	for (var i = 0; i < currentSize; i++) 
//		toright = toright & (map[i][i] == symb); 
//	  if (toright) 
//        return true;	
//    else
//	    return false; 
//}
//function checkLanes(symb, currentSize) { 
//	var cols = false, rows = false; 
//	for (var col = 0; col < currentSize; col++) {
//		cols = true;
//		rows = true;
//		for (var row = 0; row < currentSize; row++) {
//			cols = (map[col][row] == symb);
//			rows = (map[row][col] == symb);
//        }
//        if (cols || rows) 
//            return true; 
//	}
//	return false; 
//}

for (var i = 0; i < cell.length; i++) //9
    cell[i].addEventListener("click", currentStep);
reset.addEventListener("click", ()=>{
    for (var i = 0; i < cell.length; i++)
    cell[i].innerText = "";

    stepCount = 0;
    arrayO = [];
    arrayX = [];
    changecurrentPlayer();
    nGames++;
    if(isX == true)
        msgTitle.innerText = "Ходит игрок: X";
    else
        msgTitle.innerText = "Ходит игрок: O";
    msgCountGames.innerText = "Всего игр: " + nGames;
    for (var i = 0; i < cell.length; i++) {
        cell[i].addEventListener("click", currentStep);
        cell[i].classList.remove("x", "o");
    }
});

function changecurrentPlayer() {
    if (isX == true)
        isX = "O";
    else
        isX = true;
}

function checkWin(arr, number) {
    var wLen = matrixWin.length;  //8
    for (var i = 0; i < wLen; i++) 
    {
        var count = 0;
        var check = matrixWin[i]
        if (check.indexOf(number) >= 0) 
        {
            var kLen = check.length;
            for (var j = 0; j < kLen; j++) 
            {
                if (arr.indexOf(check[j]) >= 0) 
                {
                    count++;
                    if (count == 3) 
                        return true;
                }
            }
            count = 0;
        }
    }
}

function currentStep() {
    var num = + this.getAttribute("N");
    if (!this.textContent) {
        if (isX == true)
        {
            arrayX.push(num) && this.classList.add("x");
            this.innerText = "X";
        }
        else
        {
            arrayO.push(num) && this.classList.add("o");
            this.innerText = "O";
        }

        if ((arrayO.length > 2 || arrayX.length > 2) &&
            (checkWin(arrayO, num) || checkWin(arrayX, num))) {
            for (var i = 0; i < cell.length; i++)
                cell[i].removeEventListener("click", currentStep);

            nGames++;
            msgCountGames.innerText = "Всего игр: " + nGames;
            if(isX == true){
                nWinsX++;
                msgWinX.innerText = "Побед X:  " + nWinsX;
                return (msgTitle.innerText = "Победил игрок: X");
            }
            else{
                nWinsO++;
                msgWinO.innerText = "Побед O:  " + nWinsO;
                return (msgTitle.innerText = "Победил игрок: O");
            }
        }
        changecurrentPlayer();
        stepCount++;

        if (stepCount >= 9) {
            msgTitle.innerText = "Ничья";
            nGames++;
            msgCountGames.innerText = "Всего игр: " + nGames;
        } 
        else
        {
            if(isX == true)
                msgTitle.innerText = "Ход игрока: X";
            else
                msgTitle.innerText = "Ход игрока: O";
        }
    }
}

function resetField() {
    for (var i = 0; i < cell.length; i++)
        cell[i].innerText = "";

    stepCount = 0;
    arrayO = [];
    arrayX = [];
    changecurrentPlayer();
    nGames++;
    if(isX == true)
        msgTitle.innerText = "Ходит игрок: X";
    else
        msgTitle.innerText = "Ходит игрок: O";
    msgCountGames.innerText = "Всего игр: " + nGames;
    for (var i = 0; i < cell.length; i++) {
        cell[i].addEventListener("click", currentStep);
        cell[i].classList.remove("x", "o");
    }
}	