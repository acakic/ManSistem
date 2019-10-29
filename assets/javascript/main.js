    /*
    *   Adding to slider some functionality.
    */
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}
function currentSlide(n) {
    showSlides(slideIndex = n);
}
function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (slides.length > 0) {
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
}
/*
*   Automove slider after 5 sec.
*/
function sliderAutoScroll() {
    var next = document.querySelector('.next');
    if (next) {

        setInterval(function () {
            next.click();
        }, 5000);
    }

}
sliderAutoScroll();



/*
*   Showing succes msg for login or registration.
*/
var successMsg = document.querySelector('.success');
if (successMsg) {
    setTimeout(function () {
        successMsg.style.display = 'none';
    }, 2000);
}
/*
*   Showing error msg for  login.
*/
var errorMsg = document.querySelector('.error');
if (errorMsg) {
    setTimeout(function () {
        errorMsg.style.display = 'none';
    }, 2000);
}



var addToCartBtn = document.querySelector('.add-to-cart');
if (addToCartBtn) {
    addToCartBtn.addEventListener('click', (e) => {
        // stoping link  to execute to next page.
        e.preventDefault();

        var quantity = document.querySelector('.quantity').value;
        var productId = document.querySelector('.product-id').value;

        var params = '?quantity=' + quantity + '&productId=' + productId;

        var url = '/products/addToCartAjax';
        // The data we are going to send in our request
        let data = {
            quantity: quantity,
            productId: productId
        }
        // stringify - Convert a JavaScript object into a string
        fetch(url, {
            method: 'POST',
            body: JSON.stringify(data),
            // headers: {
            //     'Content-Type': 'application/json',
            //     // 'Content-Type': 'application/x-www-form-urlencoded',
            // }
        })
            // promise
            .then(function (res) {
                return res.json();
            })
            .then((data) => {
                // data = res.json(); 
                var quantity = data['quantity'];
                var quantityItem = document.querySelector('.cart');
                quantityItem.classList.add('bounce');
                setTimeout(() => {
                    quantityItem.classList.remove('bounce');
                }, 300);


                quantityItem.innerHTML = quantity;

                var msgBox = document.querySelector('#popUpMessage');
                msgBox.style.display = 'block';
                msgBox.style.opacity = '1';
                setTimeout(() => {
                    msgBox.style.opacity = '0';
                    msgBox.style.display = 'none';
                }, 3000);
            })
            .catch((error) => {
                console.log(error);

            })

    });

}

var removeFromCart = document.querySelectorAll('.removeFromCartAjax');
if (removeFromCart) {
    removeFromCart.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            var productId = item.getAttribute('data-productid');

            var url = '/products/removeFromCartAjax';
            // The data we are going to send in our request
            let data = {
                productId: productId
            }

            // Convert a JavaScript object into a string with JSON.stringify().
            fetch(url, {
                method: 'POST',
                body: JSON.stringify(data),
                // headers: {
                //     'Content-Type': 'application/json',
                //     // 'Content-Type': 'application/x-www-form-urlencoded',
                // }
            })
                .then(res => {
                    return res.json();
                })
                .then(data => {
                    var totalCost = document.querySelector('.total-cost');
                    totalCost.innerHTML = data['totalCost'];

                    var quantity = data['quantity'];
                    var quantityItem = document.querySelector('.cart');

                    quantityItem.classList.add('bounce');
                    setTimeout(() => {
                        quantityItem.classList.remove('bounce');
                    }, 300);

                    quantityItem.innerHTML = quantity;

                    var row = e.target.parentElement.parentElement.parentElement;
                    row.style.opacity = '0';
                    setTimeout(() => {
                        row.remove();
                        if (data['totalCost'] == '0,00') {
                            location.reload();
                        }
                    }, 800);
                });
        });
    })
}


