function createCoupon() {
    const form = document.getElementById('create_coupon_form');
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        const code = form.code.value;
        const discount = form.discount.value;

        let isValid = true;

        // Code Validation
        if (code === '') {
            document.getElementById('code_err').innerText = 'Please Enter A Coupon Code.';
            document.getElementById('code_err').classList.add('error');
            isValid = false;
        } else {
            document.getElementById('code_err').innerText = ''
            document.getElementById('code_err').classList.remove('error');
        }

        // Discount Validation
        if (discount < 1 || discount > 75) {
            document.getElementById('discount_err').innerText = 'Please Enter A Number Between 1-75.';
            document.getElementById('discount_err').classList.add('error');
            isValid = false;
        } else {
            document.getElementById('discount_err').innerText = ''
            document.getElementById('discount_err').classList.remove('error');
        }

        return isValid;
    }
}