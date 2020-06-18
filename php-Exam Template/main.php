<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>




function addRecepie(){ 

    var title=document.getElementById('title').value;
    var noIng=document.getElementById('noIng').value;
    var desc=document.getElementById('desc').value;
    var type=document.getElementById('type').value;

    if ($("#title").val().trim() == "" || $("#noIng").val().trim() == "" || $("#desc").val().trim() == "" || $("#type").val().trim() == "") 
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


    var allData = "title="+title+"&noIng="+noIng+"&desc="+desc+
    "&type="+type;


    xmlhttp.open("POST","addRecepie1.php",true);
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
}




$(document).on('click', '.updateButton', function (event) { 

  $("#updateForm").css("display", "block");

  $id = $(this).closest('tr').find('td:eq(0)').text();
  var title = $(this).closest('tr').find('td:eq(1)').text();
  var noIng = $(this).closest('tr').find('td:eq(2)').text();
  var desc = $(this).closest('tr').find('td:eq(3)').text();
  var type = $(this).closest('tr').find('td:eq(4)').text();

   $("#titleU").val(title)
   $("#noIngU").val(noIng)
   $("#descU").val(desc)
   $("#typeU").val(type)

   

});

function updateRecepie()
{


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


    var allData = "id="+$id+"&title="+title+"&noIng="+noIng+"&desc="+desc+
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


$(document).on('click', '.deleteButton', function (event) {
            //added confirm pop-up validation for the delete buttons
    if (confirm("Are you sure you want to delete?")) {

          
          var a = $(this).closest('tr').find('td:first').text();

          alert(a);
          if(window.XMLHttpRequest)
          {
              xmlhttp = new XMLHttpRequest();
          }
          else
          {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }


          var allData = "id="+a;


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


        location.reload(true);

    }
    else {

        location.reload(true);
        alert("Ok, the delete was canceled!");
    }
        });

function deleteRecepie(){ 


    //var id=document.getElementById('id').value;

    $id = $(this).parent().parent().find("td:eq(0)").html();


    alert($id.value);
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
    xmlhttp.open("GET","getAll1.php",true);
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
      <option value="fel principal">fel principal</option>
      <option value="fastfood">fastfood</option>
      <option value="fel secundar">fel secundar</option>
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

    <form id="updateForm" method="">
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