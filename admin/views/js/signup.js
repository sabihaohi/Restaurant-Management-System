function signup() {
    const form = document.getElementById('signup_form');
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        const name = form.name.value;
        const email = form.email.value;
        const password = form.password.value;
        const cpassword = form.cpassword.value;

        document.getElementById('sne').innerText = '';
        document.getElementById('sne').classList.remove('error');
        document.getElementById('see').innerText = '';
        document.getElementById('see').classList.remove('error');
        document.getElementById('spe').innerText = '';
        document.getElementById('spe').classList.remove('error');
        document.getElementById('scpe').innerText = '';
        document.getElementById('scpe').classList.remove('error');

        let isValid = true;

        if (name === '') {
            document.getElementById('sne').innerText = 'Please Enter Your Full Name.';
            document.getElementById('sne').classList.add('error');
            isValid = false;
        }

        if (email === '') {
            document.getElementById('see').innerText = 'Please Enter Your Email.';
            document.getElementById('see').classList.add('error');
            isValid = false;
        } else if (!email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        )) {
            document.getElementById('see').innerText = 'Please Enter A Valid Email.';
            document.getElementById('see').classList.add('error');
            isValid = false;
        }

        if (password === '') {
            document.getElementById('spe').innerText = 'Please Enter Your Password.';
            document.getElementById('spe').classList.add('error');
            isValid = false;
        }

        if (cpassword === '') {
            document.getElementById('scpe').innerText = 'Please Re-enter Your Password.';
            document.getElementById('scpe').classList.add('error');
            isValid = false;
        } else if (password != cpassword) {
            document.getElementById('scpe').innerText = "Passwords Don't Match.";
            document.getElementById('scpe').classList.add('error');
            isValid = false;
        }

        return isValid;
    }
}