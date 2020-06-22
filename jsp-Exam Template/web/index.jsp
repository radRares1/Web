<%--
  Created by IntelliJ IDEA.
  User: Rares2
  Date: 5/4/2020
  Time: 3:53 PM
  To change this template use File | Settings | File Templates.
--%>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="validation.js"></script>
</head>
<body>

<div id="divA">

    <form id="logForm" action="Login" method="post" onsubmit="checkData()">
        <label >User name:</label><br>
        <input type="text" id="n" name="name"><br>
        <label >Password:</label><br>
        <input type="password" id="p" name="pass"><br>
        <br>
        <input id="login" type="submit" value="Login">
    </form>

</div>

<div id="divB">

    <form action="Register" method="post" id="regForm" onsubmit="checkRegister()">
        <label >User name:</label><br>
        <input type="text" name="user" id="nr"><br>
        <label >Password:</label><br>
        <input type="password" name="pw" id="pr"><br>
        <br>
        <input type="submit" value="Register">
    </form>
</div>

<label id="log">Please log in here:</label>
<label id="reg">Please register in here:</label>

</body>
</html>
