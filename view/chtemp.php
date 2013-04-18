<script	src='http://localhost/Template_Master/trunk/javascript/jquery.tools.min.js'></script>
<script type="text/javascript">
var strUser;
function fetchtemplate()
{
	strUser = $("#temp option:selected").val();
	
	$.ajax({ 
	    type: "POST",
	    url: 'http://localhost/Template_Master/trunk/controller/controller.php?val='+strUser+"&method=temp",
	    //data: $('#frmid').serialize(),
	    success: function(data){
	    
		$('#abc1').html(data);
	    	
	    	}
	   });
	
	
} 
function saveuservalues()
{
	$.ajax({ 
	    type: "POST",
	    url: 'http://localhost/Template_Master/trunk/controller/controller.php?method=saveuserresult',
	    data: $('#frm').serialize(),
	    success: function(data){
	    
		$('#abc').html(data);
		}
	   });
}

function template()
{
	
	
	$.ajax({ 
	    type: "POST",
	    url: 'http://localhost/Template_Master/trunk/controller/controller.php?val='+strUser+"&method=getresult",
	    //data: $('#frmid').serialize(),
	    success: function(data){
	    
		$('#abc').html(data);
		
	    	
	    	}
	   });
	
	
}

 
</script>
<a href="javascript:void(0)" onclick="template()">Choose Template</a>
<div id="abc"></div>
<div id="abc1"></div>

