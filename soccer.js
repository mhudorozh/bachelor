/* Разчерчивание сетки координатной плоскости */
var c_canvas = document.getElementById("setka");
var context = c_canvas.getContext("2d");

for (var x = 0.5; x < 850; x += 10) {
	context.moveTo(x, 0);
	context.lineTo(x, 600);
}

for (var y = 0.5; y < 600; y += 10) {
	context.moveTo(0, y);
	context.lineTo(850, y);
}

context.strokeStyle = "#eee";
context.stroke();

context.beginPath();
context.moveTo(10, 300);
context.lineTo(627.5, 300);
context.moveTo(647.5, 300);
context.lineTo(840, 300);
context.moveTo(835, 295);
context.lineTo(840, 300);
context.lineTo(835, 305);

context.moveTo(425, 10);
context.lineTo(425, 153);
context.moveTo(425, 173);
context.lineTo(425, 590);
context.moveTo(430, 585);
context.lineTo(425, 590);
context.lineTo(420, 585);

context.strokeStyle = "#000";
context.stroke();

context.font = "bold 12px sans-serif";
context.fillText("и", 635.5, 303);
context.fillText("в", 422, 165);

c_canvas.addEventListener('click', getClickXY, false);

function getClickXY(event) {
	var new_point = true;
	var clickX = event.pageX - 7;
	var clickY = event.pageY - 7;
    
	var appDiv = document.createElement('img');
	putDiv = document.querySelector('[id="txt_4"]');
	putDiv.appendChild(appDiv);
	
	counter++;
	appDiv.setAttribute('style', 'position: absolute; top: ' + clickY + 'px; left: ' + clickX + 'px;');
	appDiv.setAttribute('src', '../images/vinv.png');
	appDiv.setAttribute('title', ' ');
	appDiv.setAttribute('id', 'point' + counter);
	appDiv.setAttribute('onclick', 'form_data(this.title, this.style.top, this.style.left, this.id);');
	appDiv.setAttribute('class', 'draggable');
	
	document.getElementById('ox').value = ((clickX - 818) / 41.5).toFixed(3);
	document.getElementById('oy').value = ((clickY - 549) / 29).toFixed(3);
	document.getElementById('name').value = '';
	
	document.getElementById('save').value = 'point' + counter;
	document.getElementById('delete').value = 'point' + counter;
}


/* Обработка перетаскивания фигур */

document.onmousedown = function(e) {
  var dragElement = e.target;
  if (!dragElement.classList.contains('draggable')) return;
  var coords, shiftX, shiftY;
  startDrag(e.clientX, e.clientY);

  document.onmousemove = function(e) {
    moveAt(e.clientX, e.clientY);
  };

  dragElement.onmouseup = function() {
    finishDrag();
  };

  // -------------------------

  function startDrag(clientX, clientY) {

    shiftX = clientX - dragElement.getBoundingClientRect().left;
    shiftY = clientY - dragElement.getBoundingClientRect().top;

    dragElement.style.position = 'fixed';

    document.getElementById('txt_4').appendChild(dragElement);

    moveAt(clientX, clientY);
  };

  function finishDrag() {
    // конец переноса, перейти от fixed к absolute-координатам
    dragElement.style.top = parseInt(dragElement.style.top) + pageYOffset + 'px';
    dragElement.style.position = 'absolute';

    document.onmousemove = null;
    dragElement.onmouseup = null;
  }

  function moveAt(clientX, clientY) {
    // новые координаты
    var newX = clientX - shiftX;
    var newY = clientY - shiftY;

    // ------- обработка выноса за нижнюю границу окна ------
    var newBottom = newY + dragElement.offsetHeight;

    if (newBottom > document.documentElement.clientHeight) {
      var docBottom = document.documentElement.getBoundingClientRect().bottom;
      var scrollY = Math.min(docBottom - newBottom, 10);
      if (scrollY < 0) scrollY = 0;

      window.scrollBy(0, scrollY);
      newY = Math.min(newY, document.documentElement.clientHeight - dragElement.offsetHeight);
    }


    // ------- обработаем вынос за верхнюю границу окна ------
    if (newY < 0) {
      var scrollY = Math.min(-newY, 10);
      if (scrollY < 0) scrollY = 0; 

      window.scrollBy(0, -scrollY);
      newY = Math.max(newY, 0);
    }
    if (newX < 0) newX = 0;
    if (newX > document.documentElement.clientWidth - dragElement.offsetHeight) {
      newX = document.documentElement.clientWidth - dragElement.offsetHeight;
    }

    dragElement.style.left = newX + 'px';
    dragElement.style.top = newY + 'px';
  }
  return false;
}

function form_data(title, toop, left, id) {
	
	document.getElementById('ox').value = ((Number(left.replace("px", "")) - 818) / 41.5).toFixed(3);
	document.getElementById('oy').value = ((Number(toop.replace("px", "")) - 549) / 29).toFixed(3);
	document.getElementById('name').value = title;
	
	document.getElementById('save').value = id;
	document.getElementById('delete').value = id;
}

function save_data(value, input) {
	document.getElementById(value).title = input;
}

function delete_data(value) {
	var el = document.getElementById(value);
	el.parentNode.removeChild(el);
	
	document.getElementById('ox').value = '';
	document.getElementById('oy').value = '';
	
	document.getElementById('name').value = '';
}

function manager() {
	window.location.href='manager.php'
}