function login() {
    const form = document.getElementById('login_form');
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        const email = form.email.value;
        const password = form.password.value;

        document.getElementById('lee').innerText = '';
        document.getElementById('lee').classList.remove('error');
        document.getElementById('lpe').innerText = '';
        document.getElementById('lpe').classList.remove('error');

        let isValid = true;

        if (email === '') {
            document.getElementById('lee').innerText = 'Please Enter Your Email.';
            document.getElementById('lee').classList.add('error');
            isValid = false;
        } else if (!email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        )) {
            document.getElementById('lee').innerText = 'Please Enter A Valid Email.';
            document.getElementById('lee').classList.add('error');
            isValid = false;
        }

        if (password === '') {
            document.getElementById('lpe').innerText = 'Please Enter Your Password.';
            document.getElementById('lpe').classList.add('error');
            isValid = false;
        }

        return isValid;
    }
}