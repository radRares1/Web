<%@ page import="Model.Asset" %>
<%@ page import="java.util.ArrayList" %>
<%@ page import="java.util.List" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%@taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%--
  Created by IntelliJ IDEA.
  User: Rares2
  Date: 6/18/2020
  Time: 4:50 PM
  To change this template use File | Settings | File Templates.
--%>
<html>
<head>
    <script src="jquery-2.0.3.js"></script>
    <script>

        $(document).on('click', '.updateButton', function (event) {


            $("#updateForm").css("display", "block");

            $id2 =  $(this).closest('tr').find('td:eq(0)').text();
            var name = $(this).closest('tr').find('td:eq(1)').text();
            var desc = $(this).closest('tr').find('td:eq(2)').text();
            var value = $(this).closest('tr').find('td:eq(3)').text();

            $("#uname").val(name);
            $("#udesc").val(desc);
            $("#uvalue").val(value);


        });

        $(document).on('click', '.deleteButton', function (event) {


            $id =  $(this).closest('tr').find('td:eq(0)').text();
            $.post(
                "Assets",
                {action: "deleteAsset", idToDelete: $id },
                function (data) {
                    location.reload();
                }
            );


        });

        function updateRecepie() {


            var name = document.getElementById('uname').value;
            var desc = document.getElementById('udesc').value;
            var val = document.getElementById('uvalue').value;
            var list=[];
            list.push({"id":$id2,"name": name, "desc": desc, "value": val});
            console.log(list);

            $.post(
                "Assets",
                {action: "updateAsset", assetToUpdate: JSON.stringify(list)},
                function (data) {
                    location.reload();
                }
            );
            list=[];

    }


    let assets = [];

        function sendData()
        {
            $.post(
                "Assets",
                {action: "addAssets", assetsToAdd: JSON.stringify(assets)},
                function (data) {
                    location.reload();
                }
            );
            assets = [];
            $("#toAdd").detach();
        }

        function addRecepie() {

            var name = document.getElementById('name').value;
            var desc = document.getElementById('desc').value;
            var val = document.getElementById('value').value;

            assets.push({"name": name, "desc": desc, "value": val});

            console.log(assets);

            var table = document.getElementById("toAdd");

            var row = table.insertRow(1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.innerHTML = name;
            cell2.innerHTML = desc;
            cell3.innerHTML = val;

            document.getElementById("addForm").reset();
        }

    $(document).ready(function () {
            $.getJSON("Assets",
                function (json) {
                    var tr;
                    for (var i = 0; i < json.length; i++) {
                        if(json[i].value >= 10)
                            tr = $('<tr bgcolor=#8b0000/>');
                        else
                            tr = $('<tr/>');
                        tr.append("<td>" + json[i].aid + "</td>");
                        tr.append("<td>" + json[i].name + "</td>");
                        tr.append("<td>" + json[i].desc + "</td>");
                        tr.append("<td>" + json[i].value + "</td>");
                        tr.append("<td><button class='deleteButton' >delete</button></td>");
                        tr.append("<td><button class='updateButton' >update</button></td>");
                        $('#table').append(tr);
                    }
                });
        });
    </script>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>Logged in</title>


    <div id=buttons>

<%--        <input id="button" type="button" value="Get All Recepies" onclick="showRecepies()" />--%>
<%--        <input id="button2" type="button" value="Filter based on ->" />--%>

<%--        <form id="filterSelect">--%>
<%--            <select name="users" onchange="filterRecepies(this.value)">--%>
<%--                <option value="">Select a type:</option>--%>
<%--                <option value="desert">desert</option>--%>
<%--                <option value="fel principal">fel principal</option>--%>
<%--                <option value="fastfood">fastfood</option>--%>
<%--                <option value="fel secundar">fel secundar</option>--%>
<%--            </select>--%>
<%--        </form>--%>

<%--        <p id="lastFilter">Last filter used</p>--%>

    </div>


    <br>
    <div id="divA">
        <table id="table">

            <th>Name</th>
            <th>Description</th>
            <th>Value</th>
            <%--
           <%
               ArrayList<Asset> result = (ArrayList<Asset>) request.getSession().getAttribute("assets");

               for (Asset entity : result) {
           %>
                   <tr>
                   <td>${entity.name}</td>
                   <td>${entity.desc}</td>
                   <td>${entity.value}</td>
               </tr><%

           }

       %>

           --%>

        </table>
</div>
<br>

    <div id="divB">

        <form id="addForm" method="">
            <label >name</label><br>
            <input type="text" id="name"><br>
            <label >description</label><br>
            <input type="text" id="desc"><br>
            <label >value</label><br>
            <input type="text" id="value"><br>

            <br>
            <input id="addSubmit" type="button" value="Add Asset"onclick="addRecepie()">

            <input id="sendButton" type="button" value="Send Assets"onclick="sendData()">
            <br>
        </form>

        <form id="updateForm" >
            <label >name</label><br>
            <input type="text" id="uname"><br>
            <label >description</label><br>
            <input type="text" id="udesc"><br>
            <label >value</label><br>
            <input type="text" id="uvalue"><br>
            <br>
            <input id="updateButton" type="button" value="update"onclick="updateRecepie()">
        </form>

        <br>
        <table id="toAdd">
            <th>Name</th>
            <th>Description</th>
            <th>Value</th>
        </table>




    </div>
        </head>
<body>

</body>
</html>
