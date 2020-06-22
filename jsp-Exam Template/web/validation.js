






function checkRegister() {

    var name = document.getElementById('nr').value;
    var pw = document.getElementById('pr').value;

    alert(name);

    var patt1 = /[:'+,/]/i;
    var checkName = name.search(patt1);
    var checkPw = pw.search(patt1);

    if(checkName != -1 || checkPw != -1)
    {
        alert("please don't use :'+,/ as characters in the username or password");
        return false;
    }

    else if ($("#ruser").val().trim() == "" || $("#rpass").val().trim() == "" )
    {
        alert("please don't input empty data!");
        return false;
    }
    else
        $("#regForm").submit();
}
function checkData() {

        var name = document.getElementById('n').value;
        var pw = document.getElementById('p').value;


        var patt1 = /[:'+,/]/i;
        var checkName = name.search(patt1);
        var checkPw = pw.search(patt1);

        if(checkName != -1 || checkPw != -1)
        {
            alert("please don't use :'+,/ as characters in the username or password");
            return false;
        }

else if ($("#ruser").val().trim() == "" || $("#rpass").val().trim() == "" )
{
    alert("please don't input empty data!");
    return false;
}
else
    $("#logForm").submit();
}