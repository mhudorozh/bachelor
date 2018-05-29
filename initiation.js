var load = 1;
var load_pr = 1;
var show = [1, 1, 1, 1, 1];

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

function showTable(id, number) {
	if (show[number] == 1) {
		document.getElementById(id).style.display='';
		document.getElementById("img_" + id).src="../images/refup.png";
		show[number] = 0;
	} else {
		document.getElementById(id).style.display='none';
		document.getElementById("img_" + id).src="../images/refdown.png";
		show[number] = 1;
	}
}

function createProject() {
	window.location.href='initiation.php'
}

function myTasks() {
	window.location.href='mainpage.php'
}

function manager() {
	window.location.href='manager.php'
}

function loadList() {
	if (load_pr == 1) {
		document.getElementById('listproject1').style.display='';
		document.getElementById('listproject2').style.display='';
		document.getElementById('listproject3').style.display='';
		document.getElementById('listproject4').style.display='';
		document.getElementById('listproject5').style.display='';
		document.getElementById('listproject6').style.display='';
		document.getElementById('listproject7').style.display='';
		document.getElementById('listproject8').style.display='';
		document.getElementById('img_pr').src="../images/arrow_up.png";
		
		load_pr = 0;
	} else if(load_pr == 0) {
		document.getElementById('listproject1').style.display='none';
		document.getElementById('listproject2').style.display='none';
		document.getElementById('listproject3').style.display='none';
		document.getElementById('listproject4').style.display='none';
		document.getElementById('listproject5').style.display='none';
		document.getElementById('listproject6').style.display='none';
		document.getElementById('listproject7').style.display='none';
		document.getElementById('listproject8').style.display='none';
		document.getElementById('img_pr').src="../images/arrow_down.png";
		load_pr = 1;
	}
}


/*------------------------------------------*/

var counter = 1;
var counterOgr = 1;

function newInput() {
	
	var appDiv = document.createElement('input');
	var addDiv = document.createElement('div');
	appButton_p = document.createElement('a');
	putDiv = document.querySelector('[class="form"]');
	putDiv.appendChild(addDiv);
	counter++;
	addDiv.setAttribute('id', 'delete_prod_' + counter);
	putDiv = document.querySelector('[id="delete_prod_' + counter + '"]');
	putDiv.appendChild(appDiv);
	putDiv.appendChild(appButton_p);
	appDiv.setAttribute('type', 'text');
	appDiv.setAttribute('name', 'product' + counter);
	appDiv.setAttribute('id', 'product' + counter);
	appDiv.setAttribute('class', 'input');
	appDiv.setAttribute('placeholder', 'Продукт' + ' ' + counter);
	
	appButton_p.setAttribute('value', 'product' + counter);
	appButton_p.setAttribute('class', 'knopka_delete');
	appButton_p.setAttribute('href', '#'); 
	appButton_p.setAttribute('style', "margin: 4px;");
	appButton_p.setAttribute('onclick', 'deleteElem("delete_prod_' + counter + '", "counter"); return false;');
	appButton_p.setAttribute('id', 'delete_prod_' + counter);
	
	putDiv.appendChild(document.createElement('br'));
	putDiv.appendChild(document.createElement('br'));
	
	var addCount = document.getElementById('counter');
	addCount.setAttribute('value', String(counter));
	 
	/*------------------*/
	
	putDiv_s = document.querySelector('[class="form2"]');
	var addDiv = document.createElement('div');
	
	putDiv_s.appendChild(addDiv);
	addDiv.setAttribute('class', 'form2' + counter);
	
	putDiv = document.querySelector('[class="form2'+counter+'"]');
	var addInput = document.createElement('input');
	var addButton = document.createElement('a');
	putDiv.appendChild(addInput);
	putDiv.appendChild(addButton);
	putDiv.appendChild(document.createElement('br'));
	putDiv.appendChild(document.createElement('br'));
	
	addInput.setAttribute('name', 'counter_treb_' + counter);
	addInput.setAttribute('id', 'counter_treb_' + counter);
	addInput.setAttribute('value', "1");
	addInput.setAttribute('style', "display:none;");
	
	addButton.setAttribute('href', '#'); 
	addButton.setAttribute('class', 'knopka_add');
	addButton.setAttribute('onclick', "newTreb("+ counter +"); return false;");
	addButton.setAttribute('id', "add_treb_"+ counter);
	document.getElementById("add_treb_"+ counter).innerHTML = 'Добавить';
	
	addDiv = document.createElement('div');
	putDiv.appendChild(addDiv);
	addDiv.setAttribute('id', 't1_p' + counter + '_delete');
	
	putDiv = document.querySelector('[id="t1_p'+counter+'_delete"]');
	var addTrebov = document.createElement('textarea');
	var addButton_d = document.createElement('a');
	
	putDiv.appendChild(addTrebov);
	putDiv.appendChild(addButton_d);
	putDiv.appendChild(document.createElement('br'));
	putDiv.appendChild(document.createElement('br'));
	
	addButton_d.setAttribute('href', '#'); 
	addButton_d.setAttribute('class', "knopka_delete");
	addButton_d.setAttribute('onclick', "deleteElem('t1_p" + counter + "_delete', 'counter_treb_" + counter + "'); return false;");
	addButton_d.setAttribute('style', "margin: 4px;");
	
	addTrebov.setAttribute('name', 't1_p' + counter);
	addTrebov.setAttribute('id', 't1_p' + counter);
	addTrebov.setAttribute('class', 'tio');
	addTrebov.setAttribute('placeholder', 'Требование 1 к продукту' + ' ' + counter);
}

function newTreb(product) {
	var counter_tr = Number(document.getElementById('counter_treb_' + product).value);
	var addDiv = document.createElement('div');
	counter_tr++;
	putDiv = document.querySelector('[class="form2'+ product +'"]');
	putDiv.appendChild(addDiv);
	addDiv.setAttribute('id', 't'+ counter_tr +'_p' + product + '_delete');

	putDiv = document.querySelector('[id= "t'+ counter_tr +'_p' + product + '_delete"]');
	
	var addTrebov = document.createElement('textarea');
	addButton = document.createElement('a');
	putDiv.appendChild(addTrebov);
	putDiv.appendChild(addButton);
	
	
	addButton.setAttribute('href', '#'); 
	addButton.setAttribute('class', "knopka_delete");
	addButton.setAttribute('onclick', "deleteElem('t" + counter_tr + "_p" + product + "_delete', 'counter_treb_" + product + "'); return false;");
	addButton.setAttribute('style', "margin: 4px;");
	
	addTrebov.setAttribute('name', 't'+ counter_tr +'_p' + product);
	addTrebov.setAttribute('id', 't'+ counter_tr +'_p' + product);
	addTrebov.setAttribute('class', 'tio');
	addTrebov.setAttribute('placeholder', 'Требование '+ counter_tr +' к продукту ' + product);
	
	putDiv.appendChild(document.createElement('br'));
	putDiv.appendChild(document.createElement('br'));
	
	document.getElementById('counter_treb_' + product).value = String(counter_tr);
}

function newOgr() {
	
	var appDiv = document.createElement('textarea');
	var addDiv = document.createElement('div');
	appButton_p = document.createElement('a');
	putDiv = document.querySelector('[class="form3"]');
	putDiv.appendChild(addDiv);
	counterOgr++;
	addDiv.setAttribute('id', 'delete_ogr_' + counterOgr);
	putDiv = document.querySelector('[id="delete_ogr_' + counterOgr + '"]');
	putDiv.appendChild(appDiv);
	putDiv.appendChild(appButton_p);

	appDiv.setAttribute('name', 'ogr' + counterOgr);
	appDiv.setAttribute('id', 'ogr' + counterOgr);
	appDiv.setAttribute('class', 'tio');
	appDiv.setAttribute('placeholder', 'Допущение' + ' ' + counterOgr);
	
	appButton_p.setAttribute('class', 'knopka_delete');
	appButton_p.setAttribute('href', '#'); 
	appButton_p.setAttribute('style', "margin: 4px;");
	appButton_p.setAttribute('onclick', 'deleteElem("delete_ogr_' + counterOgr + '", "counterOgr"); return false;');
	appButton_p.setAttribute('id', 'delete_ogr_' + counterOgr);
	
	putDiv.appendChild(document.createElement('br'));
	putDiv.appendChild(document.createElement('br'));
	
	var addCount = document.getElementById('counterOgr');
	addCount.setAttribute('value', String(counterOgr));
	
}

function deleteElem(value, c){

	var theStyle = document.getElementById(value);
	theStyle.parentNode.removeChild(theStyle);

	var count = Number(document.getElementById(c).value) - 1;
	document.getElementById(c).value = String(count);
}

var risk_count = 1;

function addRisk() {
	
	var addTr = document.createElement('tr');
	putDiv = document.querySelector('[id="table_risk"]');
	putDiv.appendChild(addTr);
	risk_count++;
	addTr.setAttribute('id', 'row_' + risk_count);
	addTr.setAttribute('valign', 'top');
	if (risk_count % 2 > 0)  { addTr.setAttribute('class', 'nechet'); }
	addTr.setAttribute('onclick', "document.getElementById(\"row_" + risk_count + "\").setAttribute('style', 'background: #F79757');  document.getElementById('delete_risk').setAttribute('onclick', 'deleteElem(\"row_" + risk_count + "\"); return false;')");
	
	putDiv = document.querySelector('[id="row_'+ risk_count +'"]');
	var addTd = document.createElement('td');
	putDiv.appendChild(addTd);
	addTd.setAttribute('id', 'r' + risk_count + 'td1');
	putDiv = document.querySelector('[id="r'+ risk_count +'td1"]');
	var addText = document.createElement('textarea');
	putDiv.appendChild(addText);
	addText.setAttribute('name', 'riskname' + risk_count);
	addText.setAttribute('class', 'tio');
	addText.setAttribute('style', 'width: 140px;');
	
	//*******
	putDiv = document.querySelector('[id="row_'+ risk_count +'"]');
	addTd = document.createElement('td');
	putDiv.appendChild(addTd);
	addTd.setAttribute('id', 'r' + risk_count + 'td2');
	putDiv = document.querySelector('[id="r'+ risk_count +'td2"]');
	addText = document.createElement('textarea');
	putDiv.appendChild(addText);
	addText.setAttribute('name', 'riskreason' + risk_count);
	addText.setAttribute('class', 'tio');
	addText.setAttribute('style', 'width: 170px;');
	
	//*******
	putDiv = document.querySelector('[id="row_'+ risk_count +'"]');
	addTd = document.createElement('td');
	putDiv.appendChild(addTd);
	addTd.setAttribute('id', 'r' + risk_count + 'td3');
	putDiv = document.querySelector('[id="r'+ risk_count +'td3"]');
	addText = document.createElement('textarea');
	putDiv.appendChild(addText);
	addText.setAttribute('name', 'riskP' + risk_count);
	addText.setAttribute('id', 'riskP' + risk_count);
	addText.setAttribute('class', 'tio');
	addText.setAttribute('style', 'width: 60px; height: 30px;');
	document.getElementById('riskP' + risk_count).innerHTML = '0.' + risk_count;
	
	//*******
	putDiv = document.querySelector('[id="row_'+ risk_count +'"]');
	addTd = document.createElement('td');
	putDiv.appendChild(addTd);
	addTd.setAttribute('id', 'r' + risk_count + 'td4');
	putDiv = document.querySelector('[id="r'+ risk_count +'td4"]');
	addText = document.createElement('textarea');
	putDiv.appendChild(addText);
	addText.setAttribute('name', 'riskV' + risk_count);
	addText.setAttribute('id', 'riskV' + risk_count);
	addText.setAttribute('class', 'tio');
	addText.setAttribute('style', 'width: 60px; height: 30px;');
	document.getElementById('riskV' + risk_count).innerHTML = risk_count;

	//*******
	putDiv = document.querySelector('[id="row_'+ risk_count +'"]');
	addTd = document.createElement('td');
	putDiv.appendChild(addTd);
	addTd.setAttribute('id', 'r' + risk_count + 'td5');
	putDiv = document.querySelector('[id="r'+ risk_count +'td5"]');
	addText = document.createElement('a');
	putDiv.appendChild(addText);
	addText.setAttribute('name', 'riskpers' + risk_count);
	addText.setAttribute('id', 'riskpers' + risk_count);
	addText.setAttribute('href', '#');
	document.getElementById('riskpers' + risk_count).innerHTML = 'Иванов Иван';
	
	//*******
	putDiv = document.querySelector('[id="row_'+ risk_count +'"]');
	addTd = document.createElement('td');
	putDiv.appendChild(addTd);
	addTd.setAttribute('id', 'r' + risk_count + 'td6');
	putDiv = document.querySelector('[id="r'+ risk_count +'td6"]');
	addText = document.createElement('textarea');
	putDiv.appendChild(addText);
	addText.setAttribute('name', 'riskmeasure' + risk_count);
	addText.setAttribute('class', 'tio');
	addText.setAttribute('style', 'width: 140px;');
	
	//*******
	putDiv = document.querySelector('[id="row_'+ risk_count +'"]');
	addTd = document.createElement('td');
	putDiv.appendChild(addTd);
	addTd.setAttribute('id', 'r' + risk_count + 'td7');
	putDiv = document.querySelector('[id="r'+ risk_count +'td7"]');
	addText = document.createElement('textarea');
	putDiv.appendChild(addText);
	addText.setAttribute('name', 'riskmetod' + risk_count);
	addText.setAttribute('class', 'tio');
	addText.setAttribute('style', 'width: 140px;');
	
	var appDiv = document.createElement('img');
	putDiv = document.querySelector('[id="td-txt_4"]');
	putDiv.appendChild(appDiv);
	
	var top_oy = (Number('0.' + risk_count) * 10 * 91) + 366;
	var left_ox = 271 + (risk_count * 55.2)
	
	appDiv.setAttribute('style', 'position: absolute; top: ' + left_ox + 'px; left: ' + top_oy + 'px;');
	appDiv.setAttribute('src', '../images/risk.png');
	appDiv.setAttribute('title', ' ');
	appDiv.setAttribute('id', 'point' + risk_count);
	appDiv.setAttribute('onclick', 'form_data(this.title, this.style.top, this.style.left, this.id);');
	appDiv.setAttribute('class', 'draggable');
	
}
