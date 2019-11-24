window.addEventListener('load', (e) =>{
	let searchIcon = document.querySelector('.fa-search');
	let forma = document.forms[0]
	searchIcon.addEventListener('click', (e) => {
		forma.submit();
	});
	let search = document.querySelector('[name="search"]');
	search.addEventListener('keyup', (e) => {
		let input_val = e.target.value;
		let data = {
			      product_letters: input_val,
			      fn: 'searchForProduct'
			    }
		makeajaxrequest('get', 'http://localhost/mansistem/products/all', data);
	});
});

function makeajaxrequest(method, url, payload = false){
	let xhr = new XMLHttpRequest();
	if (payload != false) {
		if (method == 'get') {
			var cntr = 0;
			for(var key in payload){
				url += (++cntr == 1) ? '?'+key+'='+payload[key] : '&'+key+'='+payload[key];
			}
		}
	}
	xhr.open(method, url);
	xhr.onreadystatechange = () => {
		if (xhr.readyState == 4) {
			if (xhr.responseText == 'false') {
				alert('Greska')
			}else{
				
			}
		}
	}
}