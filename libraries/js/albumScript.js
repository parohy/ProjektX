/**
 * 
 */

function changePic(index,id){
	var path = 'libraries/img/products/'+id+'/'+id+index+'.jpg';
	var image = document.getElementById('propic');
	image.src = path;
	alert(path);
}