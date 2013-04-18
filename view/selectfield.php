<?php
?>
<script type="text/javascript">
$(document).ready(function() {
	var strUser;
   $('#field').hide();
   $('#xyz').hide();
   
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

   		});//form validate
});
function addnew()
{
	$('#field').append("Options:<input type='text' id='def' name='opt[]' class='required'><br /><br />");
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
		$('#field').append("Options:<input type='text' id='def' name='opt[]' class='required'><br /><br />");
		$('#field').append("<a href='javascript:void(0)'  onclick=addnew()>Add More</a><br /><br />");
	}
	else if(abc=="radio" || str.length != 0)
	{
		$('#field').html("");
		$('#field').html('Field Label:<input type="text" id="fl" name="fl" class="required"><br /><br />Datatype:<input type="text" id="dt" name="dt" class="required"><br /><br />Default:<input type="text" id="def" name="def" class="required"><br /><br />');
		$('#field').append("Options:<input type='text' id='def' name='opt[]' class='required'><br /><br />");
		$('#field').append("<a href='javascript:void(0)'  onclick=addnew()>Add More</a><br /><br />");
	}
	else if(abc=="dropdown" || str.length != 0)
	{
		$('#field').html("");
		$('#field').html('Field Label:<input type="text" id="fl" name="fl" class="required"><br /><br />Datatype:<input type="text" id="dt" name="dt" class="required"><br /><br />Default:<input type="text" id="def" name="def" class="required"><br /><br />');
		$('#field').append("Options:<input type='text' id='def' name='opt[]' class='required'><br /><br />");
		$('#field').append("<a href='javascript:void(0)'  onclick=addnew()>Add More</a><br /><br />");
	}
	else 
	{
		$('#field').html("");
		$('#field').html('Field Label:<input type="text" id="fl" name="fl" class="required"><br /><br />Datatype:<input type="text" id="dt" name="dt" class="required"><br /><br />Default:<input type="text" id="def" name="def" class="required"><br /><br />');
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
							
							<input type='button' value='Save' id='btnSubmit' /><br /><br />
							<a href='chtemp.php' target=_blank >Choose Template</a><br /><br />
							
							
					</div>
					<div id="xyz" >
							
							<input type='button' value='Save' id='btnSubmit' onclick="save()"/><br /><br />
							<a href='chtemp.php' target=_blank >Preview</a><br /><br />
							
							
					</div>
					
