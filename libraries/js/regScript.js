/**
 * @author Tomas Paronai
 */

function isPassEqual(){
	var pass1 = document.getElementById('pass1');
	var pass2 = document.getElementById('pass2');
	if(pass1.value == pass2.value){
		return true;
	}
	document.getElementById('pass-err').innerHTML = ' Passwords does not match!';
	return false;
}