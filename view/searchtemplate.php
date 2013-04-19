
<script src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"></script>
<link rel="stylesheet" href="http://localhost/Template_Master/trunk/css/style.css">

<script type="text/javascript">
$(document).ready(function() {
	$('#output').hide();
   $('#output1').hide();
});
var template;
function selectfield()
{
	$("#output2").load("edittemp.php");
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
	        	$('#output').show();
	        	$("#output").html('');
	                 $("#output").append(data);
        },
	        
});

 
}

function edit(argument = "") {
template = argument;
//alert(argument);
//var strdata=$("#id").val();
$.ajax({
type: "POST", // Post / Get method
url: 'http://localhost/Template_Master/trunk/controller/controller.php?val='+argument+"&method=edittemplate", //Where form data is sent on submission
dataType:"text", // Data type, HTML, json etc.
	        success: function(data){
	        	$('#output1').show();
	        	$("#output1").html('');
	                 $("#output1").append(data);
        },
	        
});

 
}

function del(argument) {
	//alert(argument);
	// template = argument;
	//alert(argument);
	//var strdata=$("#id").val();
	$.ajax({
	type: "POST", // Post / Get method
	url: 'http://localhost/Template_Master/trunk/controller/controller.php?val='+argument+"&method=deletetemplate", //Where form data is sent on submission
	dataType:"text", // Data type, HTML, json etc.
		        success: function(data){
			        //alert(data);
		        	if($.trim(data)=="1") {
		            	funsearch();
		            }
	        }
		        
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
	    url: 'http://localhost/Template_Master/trunk/controller/controller.php?type='+strUser+"&method=addresult&tempname="+template,
	    data: $('#frm').serialize(),
	    success: function(data){
	    
	    	$('#new').append(data);
	    	
	    	}
	   });
	
	
}


</SCRIPT>
<center>
	<form id="frm" method="post">
		Search:<INPUT type="text"  name="id" onkeyup="funsearch(this.value)" /><br />
		
		 <table id="output"></table>
	
<div id="output1"></div>
<div id="output2"></div>

</form>
</center>