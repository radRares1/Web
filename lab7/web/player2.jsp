<%--
  Created by IntelliJ IDEA.
  User: Rares2
  Date: 5/8/2020
  Time: 5:11 PM
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>

<html>
<head>
    <title>Player2</title>
    <link rel="stylesheet" type="text/css" href="battle-style.css">
</head>
<body>

<h1>Battleship</h1>

<p>Click the board to fire at a ship. There are two hidden ships!</p>

<form action="Player2" method="post">
    <label>i coord</label>
    <input type="text" id="i" name="i">
    <label>j coord</label>
    <input type="text" id="j" name="j">
    <input type="submit" id="hitButton" name="hit">
</form>

<button id="getBoard" type="button" onclick="getBoard2()">Get Board</button>
<button id="getMyBoard" type="button" onclick="getMyBoard2()">Get My Board</button>

<br>

<div id="gameboard"></div>



<div id="gameboard1"></div>



<script src="jquery-2.0.3.js"></script>
<script src="battle2.js"></script>

</body>
</html>

