<script	src='http://localhost/Template_Master/trunk/javascript/jquery.tools.min.js'></script>
<link rel="stylesheet" href="http://localhost/Template_Master/trunk/css/style.css">

<script type="text/javascript">
var template;
function selectfield()
{
	$("#output2").load("selectfield.php");
}

function funsearch(argument) {


//var strdata=$("#id").val();
$.ajax({
type: "POST", // Post / Get method
url: 'http://localhost/Template_Master/trunk/controller/controller.php?method=findtemplate', //Where form data is sent on submission
dataType:"text", // Data type, HTML, json etc.
//data:myData, //Form variables
//data=""
data:"strval=" + argument,
//data:$('#frm').serialize(),

beforeSend: function() {
	
        },
	        success: function(data){
	        	$("#output").html('');
	                 $("#output").append(data);
        },
	        
});

 
}

function edit(argument) {
template = argument;
//alert(argument);
//var strdata=$("#id").val();
$.ajax({
type: "POST", // Post / Get method
url: 'http://localhost/Template_Master/trunk/controller/controller.php?val='+argument+"&method=edittemplate", //Where form data is sent on submission
dataType:"text", // Data type, HTML, json etc.
	        success: function(data){
	        	$("#output1").html('');
	                 $("#output1").append(data);
        },
	        
});

 
}
function save()
{
	
	var strUser = $("#inputtype option:selected").val();
	
	$.ajax({ 
	    type: "POST",
	    url: 'http://localhost/Template_Master/trunk/controller/controller.php?type='+strUser+"&method=addresult",
	    data: $('#frm').serialize(),
	    success: function(data){
	    
	    	$('#new').append(data);
	    	
	    	}
	   });
	
	
}
function savetemplate()
{
	
	var strUser = $("#inputtype option:selected").val();
	
	$.ajax({ 
	    type: "POST",
	    url: 'http://localhost/Template_Master/trunk/controller/controller.php?type='+strUser+"&method=Updatetemplate&tempname="+template,
	    data: $('#frm').serialize(),
	    success: function(data){
	    
	    	$('#new').append(data);
	    	
	    	}
	   });
	
	
}


</SCRIPT>

	<form id="frm" method="post">
		Search:<INPUT type="text"  name="id" onkeyup="funsearch(this.value)" /><br />
		 <table id="output"></table>
	
<div id="output1"></div>
<div id="output2"></div>

</form>
