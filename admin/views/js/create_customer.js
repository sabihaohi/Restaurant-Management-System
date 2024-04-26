function create_customer() {
    const form = document.getElementById('create_customer_form');
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        const name = form.name.value;
        const email = form.email.value;
        const password = form.password.value;

        let isValid = true;
        const isEmailValid = email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );

        // Name Validation
        if (name === '') {
            document.getElementById('create_customer_name_err').innerText = "Please Enter Customer's Full Name.";
            document.getElementById('create_customer_name_err').classList.add('error');
            isValid = false;
        } else {
            document.getElementById('create_customer_name_err').innerText = ''
            document.getElementById('create_customer_name_err').classList.remove('error');
        }

        // Email Validation
        if (email === '') {
            document.getElementById('create_customer_email_err').innerText = "Please Enter Customer's Email.";
            document.getElementById('create_customer_email_err').classList.add('error');
            isValid = false;
        } else if (!isEmailValid) {
            document.getElementById('create_customer_email_err').innerText = 'Please Enter A Valid Email.';
            document.getElementById('create_customer_email_err').classList.add('error');
            isValid = false;
        } else {
            document.getElementById('create_customer_email_err').innerText = ''
            document.getElementById('create_customer_email_err').classList.remove('error');
        }

        // Password Validation
        if (password === '') {
            document.getElementById('create_customer_pass_err').innerText = 'Please Enter A Password.';
            document.getElementById('create_customer_pass_err').classList.add('error');
            isValid = false;
        } else {
            document.getElementById('create_customer_pass_err').innerText = ''
            document.getElementById('create_customer_pass_err').classList.remove('error');
        }

        return isValid;
    }
}

function update_customer() {
    const form = document.getElementById('update_customer_form');
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        const name = form.name.value;

        let isValid = true;

        // Name Validation
        if (name === '') {
            document.getElementById('update_customer_name_err').innerText = "Please Enter Customer's Full Name.";
            document.getElementById('update_customer_name_err').classList.add('error');
            isValid = false;
        } else {
            document.getElementById('update_customer_name_err').innerText = ''
            document.getElementById('update_customer_name_err').classList.remove('error');
        }

        return isValid;
    }
}