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
    <title>Test</title>
</head>
<body>

    <div id="divA">

        <form action="Login" method="post" target='_blank'>
            <label >User name:</label><br>
            <input type="text" name="name"><br>
            <label >Password:</label><br>
            <input type="password" name="pass"><br>
            <br>
            <input type="submit" value="Login">
        </form>

    </div>

    <div id="divB">

        <form action="Register" method="post">
            <label >User name:</label><br>
            <input type="text" name="user"><br>
            <label >Password:</label><br>
            <input type="password" name="pw"><br>
            <br>
            <input type="submit" value="Register">
        </form>
    </div>

    <label id="log">Please log in here:</label>
    <label id="reg">Please register in here:</label>
    <h1>Welcome to Battleships!</h1>

</body>
</html>
