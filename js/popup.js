var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
	overlay = document.getElementById('overlay'),
	popup = document.getElementById('popup'),
	btnCerrarPopup = document.getElementById('btn-cerrar-popup');

btnAbrirPopup.addEventListener('click', function(){
	overlay.classList.add('active');
	popup.classList.add('active');
});

btnCerrarPopup.addEventListener('click', function(e){
	e.preventDefault();
	overlay.classList.remove('active');
	popup.classList.remove('active');
});

var btnRegistrar = document.getElementById('btn-registrar'),
	overlayreg = document.getElementById('overlayreg'),
	popupreg = document.getElementById('popupreg'),
	btnCerrarPopupreg = document.getElementById('btn-cerrar-popupreg');

btnRegistrar.addEventListener('click', function(){
	overlayreg.classList.add('active');
	popupreg.classList.add('active');
});

btnCerrarPopupreg.addEventListener('click', function(e){
	e.preventDefault();
	overlayreg.classList.remove('active');
	popupreg.classList.remove('active');
});
