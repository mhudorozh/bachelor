var load = 1;

function loadProjects() {
	if (load == 1) {
		document.getElementById('allproject1').style.display='';
		document.getElementById('allproject2').style.display='';
		document.getElementById('allproject3').style.display='';
		document.getElementById('allproject4').style.display='';
		document.getElementById('img').src="../images/arrow_up.png";
		
		load = 0;
	} else if(load == 0) {
		document.getElementById('allproject1').style.display='none';
		document.getElementById('allproject2').style.display='none';
		document.getElementById('allproject3').style.display='none';
		document.getElementById('allproject4').style.display='none';
		document.getElementById('img').src="../images/arrow_down.png";
		load = 1;
	}
}

function createProject() {
	window.location.href='initiation.php'
}

function manager() {
	window.location.href='manager.php'
}