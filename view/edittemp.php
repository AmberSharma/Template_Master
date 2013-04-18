
<style>


	/* the overlayed element */
.simple_overlay {
 
    /* must be initially hidden */
    display:none;
 
    /* place overlay on top of other elements */
    z-index:10000;
 
    /* styling */
    background-color:#FFB140;
 
    min-width:600px;
    min-height:200px;
    border:1px solid #666;
    border-radius:5px;
 
    /* CSS3 styling for latest browsers */
    -moz-box-shadow:0 0 90px 5px #000;
    -webkit-box-shadow: 0 0 90px #000;
}
 
/* close button positioned on upper right corner */
.simple_overlay .close {
    background-image:url(http://localhost/Template_Master/trunk/image/close.png);
    position:absolute;
    right:-15px;
    top:-15px;
    cursor:pointer;
    height:35px;
    width:35px;
}

</style>
<script type="text/javascript">
var a=0;
$(document).ready(function() {
	var strUser;
   $('#field').hide();
   $('#xyz').hide();
   /*
   	$('#btnSubmit').click(function() {
   		var p=$('#frmid').valid()
   		    rules: { 
   		    	tmpname: "required"
   		    	def: "required"
   				fl: "required"
   			}
   		
   			 if(p)
   			{
   				save();
   			} 

   		}); *///form validate
});
function addnew()
{
	$('#field').append("Options:<input type='text' id='def' name='opt[]' class='required'><br /><br />");
}

function fetchtemplate()
{
	strUser = $("#temp option:selected").val();
	
	$.ajax({ 
	    type: "POST",
	    url: 'http://localhost/Template_Master/trunk/controller/controller.php?val='+template+"&method=temp",
	    //data: $('#frmid').serialize(),
	    success: function(data){
	    
		$('#content').html(data);
	    	
	    	}
	   });
	
	
} 
function onchange_action(str = "")
{
	var abc = $("#inputtype option:selected").val();
	$('#field').show();
	$('#xyz').show();
	
	if(abc=="checkbox" || str.length != 0)
	{
		$('#field').html("");
		$('#field').html('Field Label:<input type="text" id="fl" name="fl" class="required"><br /><br />Datatype:<input type="text" id="dt" name="dt" class="required"><br /><br />Default:<input type="text" id="def" name="def" class="required"><br /><br />');
		$('#field').append("Sequence:<input type='text' id='seq' name='seq' class='required' value='" + a +"'><br /><br />");
		$('#field').append("Options:<input type='text' id='def' name='opt[]' class='required'><br /><br />");
		$('#field').append("<a href='javascript:void(0)'  onclick=addnew()>Add More</a><br /><br />");
		a ++;
	}
	else if(abc=="radio" || str.length != 0)
	{
		$('#field').html("");
		$('#field').html('Field Label:<input type="text" id="fl" name="fl" class="required"><br /><br />Datatype:<input type="text" id="dt" name="dt" class="required"><br /><br />Default:<input type="text" id="def" name="def" class="required"><br /><br />');
		$('#field').append("Sequence:<input type='text' id='seq' name='seq' class='required' value='" + a +"'><br /><br />");
		$('#field').append("Options:<input type='text' id='def' name='opt[]' class='required'><br /><br />");
		$('#field').append("<a href='javascript:void(0)'  onclick=addnew()>Add More</a><br /><br />");
		a ++;
	}
	else if(abc=="dropdown" || str.length != 0)
	{
		$('#field').html("");
		$('#field').html('Field Label:<input type="text" id="fl" name="fl" class="required"><br /><br />Datatype:<input type="text" id="dt" name="dt" class="required"><br /><br />Default:<input type="text" id="def" name="def" class="required"><br /><br />');
		$('#field').append("Sequence:<input type='text' id='seq' name='seq' class='required' value='" + a +"'><br /><br />");
		$('#field').append("Options:<input type='text' id='def' name='opt[]' class='required'><br /><br />");

		$('#field').append("<a href='javascript:void(0)'  onclick=addnew()>Add More</a><br /><br />");
		a ++;
	}
	else 
	{
		$('#field').html("");
		$('#field').html('Field Label:<input type="text" id="fl" name="fl" class="required"><br /><br />Datatype:<input type="text" id="dt" name="dt" class="required"><br /><br />Default:<input type="text" id="def" name="def" class="required"><br /><br />');
		$('#field').append("Sequence:<input type='text' id='seq' name='seq' class='required' value='" + a +"'><br /><br />");
		a ++;
	}
	
		
		
	
		

}

</script>

					<select  name="inputtype"  id="inputtype" onchange="javascript:onchange_action()">
				    <option  value="-1">----SELECT----</option>
				    <option  value="text">Text Box</option>
				    <option  value="textarea">Text Area</option>
				    <option  value="checkbox">Check Box</option>
				    <option  value="radio">Radio Button</option>
				    <option  value="dropdown">Drop Down</option>
				    
				   </select>
				    <div id="field" >
							
							
							
					</div>
					<div id="xyz" >
							
							<input type='button' value='Save' id='btnSubmit' onclick="savetemplate()"/><br /><br />
							<img src="http://localhost/Template_Master/trunk/image/preview.png" rel="#mies1" height=100px; width="100px;" onclick="fetchtemplate()"/>
							
							
					</div>
					<div class="simple_overlay" id="mies1">
					<div id="content"></div>
</div>


<script>
$("img[rel]").overlay();
</script>
