function handleFood(form) {
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        const foodname = form.foodname.value;
        const price = form.price.value;
        const fimage = form.fimage.value;

        let isValid = true;

        // Food Name validation
        if (foodname === '') {
            document.getElementById('foodname_err').innerText = 'Please Enter A Food Name.';
            isValid = false;
        } else {
            document.getElementById('foodname_err').innerText = '';
        }

        // Password Validation
        if (price < 1 || price > 10000) {
            document.getElementById('foodprice_err').innerText = 'Please Enter A Valid Price.';
            isValid = false;
        } else {
            document.getElementById('foodprice_err').innerText = '';
        }

        if (fimage === '') {
            document.getElementById('fimage_err').innerText = 'Please Enter A Food Image.';
            isValid = false;
        } else {
            document.getElementById('fimage_err').innerText = '';
        }


        return isValid;
    }
}


