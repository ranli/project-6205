$(document).ready(function(){
var url="project_api.php";
$.getJSON(url,function(json){
// loop through the members here
$.each(json,function(i,dat){
$("#data tbody").append(

		 '<tr>'+
		    '<td>'+
			   '<input type="checkbox" name="multiple[]" value="'+dat.id+'" >'+
			'</td>'+
		    '<td>'+dat.Firstname+'</td>'+
			'<td>'+dat.Lastname+'</td>'+
			'<td>'+dat.Gender+'</td>'+
			'<td>'+dat.Email+'</td>'+
			'<td>'+dat.League+'</td>'+
			'<td>'+dat.Tel+'</td>'+
			'<td>'+dat.Photo+'</td>'+
			
         '</tr>'
);
});
});
});