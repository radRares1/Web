<?php
    include_once 'dbProp.php';
?>

<!DOCTYPE html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>Login</title>
</head>

<script>

$(document).on('click', '#reg', function (event) { 

  var name = document.getElementById('ruser').value;
  var pw = document.getElementById('rpass').value;


  var patt1 = /[:'+,/]/i; 
  var checkName = name.search(patt1);
  var checkPw = pw.search(patt1);
    
    if(checkName != -1 || checkPw != -1)
        {alert("please don't use :'+,/ as characters in the username or password");}

    else if ($("#ruser").val().trim() == "" || $("#rpass").val().trim() == "" ) 
    {
      alert("please don't input empty data!")
    }
    else
    {

    if(window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }


    var allData = "name="+name+"&pw="+pw;

    xmlhttp.open("POST","register.php",true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(allData);


    xmlhttp.onreadystatechange = function()
    {
        if(this.readyState==4 && this.status == 200)
        {
            alert(this.responseText);
        }
    }

}


});


$(document).on('click', '#log', function (event) { 

  var name = document.getElementById('name').value;
  var pw = document.getElementById('pass').value;

    if ($("#name").val().trim() == "" || $("#pass").val().trim() == "" ) 
        {
          alert("please don't input empty data!")
        }
    else
    {

        if(window.XMLHttpRequest)
        {
            xmlhttp = new XMLHttpRequest();
        }
        else
        {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }


        var allData = "name="+name+"&pw="+pw;

        xmlhttp.open("POST","login.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send(allData);


        xmlhttp.onreadystatechange = function()
        {
            if(this.readyState==4 && this.status == 200)
            {
                alert(this.responseText);
                if(this.responseText == 1)
                    window.location.replace("/lab6%20-%20Copy/main.php");
                else
                    alert("Wrong credentials");
            }
        }

}


});

</script>

<body>

    <div id="divA">

        <form id="a">
            <label>User name:</label><br>
            <input type="text" id="name"><br>
            <label>Password:</label><br>
            <input type="password" id="pass"><br>
            <br>
            <button id="log" type="reset">Login</button>
        </form>

    </div>

    <div id="divB">

        <form action="Register" method="">
            <label>User name:</label><br>
            <input type="text" id="ruser"><br>
            <label>Password:</label><br>
            <input type="password" id="rpass"><br>
            <br>
            <button id="reg" type="reset">Register</button>
        </form>

    </div>

    <label id="log2">Please log in here:</label>
    <label id="reg2">Please register in here:</label>

</body>