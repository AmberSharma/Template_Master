<?php
?>
<script type="text/javascript">
var input = document.getElementById('fl');
      function namet()
      {
    	  var n;
          
    	  for (var i=0; i<fl.value.length; i++) {
              if (fl.value.charAt(i) == " ") {
            	  n=fl.value.replace(" ","_"); 
               }
              }
      if(n)
      {
     alert("Field Label Will be Saved as \n" + n);
     fl.value=n;
      }
     }
var a=0;
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
   				val: "required"
   			}
   		
   			 if(p)
   			{
   				save();
   			} 

   		}); //form validate
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
		$('#field').html('Field Label:<input type="text" id="fl" name="fl" class="required" onblur="namet()"><br /><br />Validation<select  name="val"  id="val"> <option  value="-1">----SELECT----</option><option  value="yes">yes</option><option  value="no">no</option></select><br /><br />Default:<input type="text" id="def" name="def" class="required"><br /><br />');
		$('#field').append("Sequence:<input type='text' id='seq' name='seq' class='required' value='" + a +"'><br /><br />");
		
		$('#field').append("Datatype:<select  name='dt'  id='dt'> <option  value='-1'>----SELECT----</option><option  value='varchar(10)'>varchar(10)</option><option  value='varchar(20)'>varchar(20)</option><option  value='varchar(30)'>varchar(30)</option><option  value='int'>int</option></select>");
		$('#field').append("Options:<input type='text' id='def' name='opt[]' class='required'><br /><br />");
		$('#field').append("<a href='javascript:void(0)'  onclick=addnew()>Add More</a><br /><br />");
		a ++;
	}
	else if(abc=="radio" || str.length != 0)
	{
		$('#field').html("");
		$('#field').html('Field Label:<input type="text" id="fl" name="fl" class="required" onblur="namet()"><br /><br />Validation<select  name="val"  id="val"> <option  value="-1">----SELECT----</option><option  value="yes">yes</option><option  value="no">no</option></select><br /><br />Default:<input type="text" id="def" name="def" class="required"><br /><br />');
		$('#field').append("Sequence:<input type='text' id='seq' name='seq' class='required' value='" + a +"'><br /><br />");
		$('#field').append("Datatype:<select  name='dt'  id='dt'> <option  value='-1'>----SELECT----</option><option  value='varchar(10)'>varchar(10)</option><option  value='varchar(20)'>varchar(20)</option><option  value='varchar(30)'>varchar(30)</option><option  value='int'>int</option>< /select>");
		$('#field').append("<br /><br />Options:<input type='text' id='def' name='opt[]' class='required'><br /><br />");
		$('#field').append("<a href='javascript:void(0)'  onclick=addnew()>Add More</a><br /><br />");
		a ++;
	}
	else if(abc=="dropdown" || str.length != 0)
	{
		$('#field').html("");
		$('#field').html('Field Label:<input type="text" id="fl" name="fl" class="required" onblur="namet()"><br /><br />Validation<select  name="val"  id="val"> <option  value="-1">----SELECT----</option><option  value="yes">yes</option><option  value="no">no</option></select><br /><br />Default:<input type="text" id="def" name="def" class="required"><br /><br />');
		$('#field').append("Sequence:<input type='text' id='seq' name='seq' class='required' value='" + a +"'><br /><br />");
		
		$('#field').append("Datatype:<select  name='dt'  id='dt'> <option  value='-1'>----SELECT----</option><option  value='varchar(10)'>varchar(10)</option><option  value='varchar(20)'>varchar(20)</option><option  value='varchar(30)'>varchar(30)</option><option  value='int'>int</option>< /select>");
		$('#field').append("Options:<input type='text' id='def' name='opt[]' class='required'><br /><br />");

		$('#field').append("<a href='javascript:void(0)'  onclick=addnew()>Add More</a><br /><br />");
		a ++;
	}
	else 
	{
		$('#field').html("");
		$('#field').html('Field Label:<input type="text" id="fl" name="fl" class="required" onblur="namet()"><br /><br />Validation<select  name="val"  id="val"> <option  value="-1">----SELECT----</option><option  value="yes">yes</option><option  value="no">no</option></select><br /><br />Default:<input type="text" id="def" name="def" class="required"><br /><br />');
		$('#field').append("Sequence:<input type='text' id='seq' name='seq' class='required' value='" + a +"'><br /><br />");
		
		$('#field').append("Datatype:<select  name='dt'  id='dt'> <option  value='-1'>----SELECT----</option><option  value='varchar(10)'>varchar(10)</option><option  value='varchar(20)'>varchar(20)</option><option  value='varchar(30)'>varchar(30)</option><option  value='int'>int</option>< /select>");
		a ++;
	}
	
		
		
	
		

}

</script>

					<select  name="inputtype"  id="inputtype" onchange="javascript:onchange_action()" style="margin:10px;">
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
							
							<input type='button' value='Save' id='btnSubmit' /><br /><br />
							<a href='chtemp.php' target=_blank >Preview</a><br /><br />
							
							
					</div>
					
