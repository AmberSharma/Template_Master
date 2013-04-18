<script	src='http://localhost/Template_Master/trunk/javascript/jquery.tools.min.js'></script>
<script	src='http://localhost/Template_Master/trunk/javascript/jquery.validate.js'></script>
<script type="text/javascript">

function dis()
{
	document.getElementById("tmpname").readOnly = true;
}

function selectfield()
{
	$("#div1").load("selectfield.php");
}
function save()
{
	
	var strUser = $("#inputtype option:selected").val();
	
	$.ajax({ 
	    type: "POST",
	    url: 'http://localhost/Template_Master/trunk/controller/controller.php?type='+strUser+"&method=addresult",
	    data: $('#frmid').serialize(),
	    success: function(data){
	    
	    	$('#new').append(data);
	    	
	    	}
	   });
	
	
}

</script>
<form id="frmid">
Template Name:<input type="text" id="tmpname" name="tempname" class="required" onblur="dis()"> 


<a href="javascript:void(0)" onclick="selectfield()">Add Field</a>
<div id="div1" ></div>
</form>
<div id="new"></div>
