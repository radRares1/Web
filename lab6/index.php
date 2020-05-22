<html>
<head>
    <link rel="stylesheet" type="text/css" href="~/style.css">
<script>

function addRecepie(){ 

    var title=document.getElementById('title').value;
    var noIng=document.getElementById('noIng').value;
    var desc=document.getElementById('desc').value;
    var type=document.getElementById('type').value;

    if(window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }


    var allData = "title="+title+"&noIng="+noIng+"&desc="+desc+
    "&type="+type;


    xmlhttp.open("POST","addRecepie.php",true);
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

function updateRecepie(){ 

    var id = document.getElementById('idU').value;
    var title=document.getElementById('titleU').value;
    var noIng=document.getElementById('noIngU').value;
    var desc=document.getElementById('descU').value;
    var type=document.getElementById('typeU').value;

    if(window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }


    var allData = "id="+id+"&title="+title+"&noIng="+noIng+"&desc="+desc+
    "&type="+type;


    xmlhttp.open("POST","updateRecepie.php",true);
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

function deleteRecepie(){ 


    var id=document.getElementById('id').value;

    if(window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }


    var allData = "id="+id;


    xmlhttp.open("POST","deleteRecepie.php",true);
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


function filterRecepies(type) {


    if(window.XMLHttpRequest)
    {
        xmlhttp = new XMLHttpRequest();
    }
    else
    {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }


    document.getElementById("lastFilter").innerHTML = type;

    xmlhttp.open("GET","filterData.php?type="+type,true);
    xmlhttp.send();

    xmlhttp.onreadystatechange = function()
    {
        if(this.readyState==4 && this.status == 200)
        {
            document.getElementById("divA").innerHTML = this.responseText;
        }
    }

  
}

function showRecepies() {
    
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
   xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("divA").innerHTML = this.responseText;
            }
        };
    xmlhttp.open("GET","getAll.php",true);
    xmlhttp.send();
    
}



</script>
<style>

input[type=submit]{
  color: black;
  background-color: white;
  width:110px;
  height:50px;
  border-top: 1px black;
  box-shadow: 0px 10px 0px black;
  position: relative;
  transition: all ease 0.3s;
}



</style>
</head>
<body>


<div id=buttons>

    <input id="button" type="button" value="Get All Recepies" onclick="showRecepies()" />
    <input id="button2" type="button" value="Filter based on ->" />

    <form id="filterSelect">
      <select name="users" onchange="filterRecepies(this.value)">
      <option value="">Select a type:</option>
      <option value="desert">desert</option>
      <option value="principal">fel principal</option>
      <option value="mic dejun">fastfood</option>
      <option value="secundar">fel secundar</option>
      </select>
    </form>

    <p id="lastFilter">Last filter used</p>

</div>


<br>
<div id="divA">
    <b>Recepies info will be listed here...</b>
</div>
<br>
<div id="divB">

    <form id="addForm" method="">
      <label >title:</label><br>
      <input type="text" id="title"><br>
      <label >no of ingredients:</label><br>
      <input type="text" id="noIng"><br>
      <label >description</label><br>
      <input type="text" id="desc"><br>
      <label >type</label><br>
      <input type="text" id="type"><br>
      <br>
      <input id="addSubmit" type="submit" value="add"onclick="addRecepie()">
    </form> 

    <form id="deleteForm" method="">
      <label >id:</label><br>
      <input type="text" id="id"><br>
      <br>
      <input id="addSubmit" type="submit" value="delete" onclick="deleteRecepie()">
    </form> 


    <form id="updateForm" method="">
      <label >id:</label><br>
      <input type="text" id="idU"><br>
      <label >title:</label><br>
      <input type="text" id="titleU"><br>
      <label >no of ingredients:</label><br>
      <input type="text" id="noIngU"><br>
      <label >description</label><br>
      <input type="text" id="descU"><br>
      <label >type</label><br>
      <input type="text" id="typeU"><br>
      <br>
      <input id="addSubmit" type="submit" value="update"onclick="updateRecepie()">
    </form> 

</div>    

</body>
</html>