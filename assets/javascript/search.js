window.addEventListener('load', (e) =>{
	let search = document.querySelector('[name="search"]');
	search.addEventListener('keyup', (e) => {
		let input_val = e.target.value;
		let data = {
			      product_letters: input_val,
			    }
	});
	makeajaxrequest('get', 'http://localhost/mansistem/products/searchForProduct', data);
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