$(document).ready(function(){

	$("#hideButton").click(function(){

	    $("#divA").hide();

	    //reset the form submits
	    $("#inputB1").val("");
	    $("#inputB2").val("");
	    $("#inputB3").val("");
	    $("#inputB4").val("");


	    //hide the main stuff and show the second div
		$("#result").hide();
	    $("#divB").show();

  });

	$("#hideButton2").click(function(){

		//hide the second div
		$("#divB").hide();


		//take the text from the inputs into a string and change the text of the paragraph to the result

		 var res = "";
         res = res + $("#inputB1").val() +" ";
         res = res + $("#inputB2").val() +" ";
         res = res + $("#inputB3").val() +" ";
         res = res + $("#inputB4").val() +" ";

        $("#result").text(res);



        
        //show the result and the first div
        $("#divA").show();
		$("#result").show();

	});
});