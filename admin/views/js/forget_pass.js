function forgetPass() {
    const form = document.getElementById('forgetpass_form');
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        const sq = form.sq.value;
        const email = form.email.value;
        const password = form.password.value;
        const cpassword = form.cpassword.value;

        document.getElementById('fpsqe').innerText = ''
        document.getElementById('fpsqe').classList.remove('error');
        document.getElementById('fpee').innerText = ''
        document.getElementById('fpee').classList.remove('error');
        document.getElementById('fppe').innerText = ''
        document.getElementById('fppe').classList.remove('error');
        document.getElementById('fpcpe').innerText = ''
        document.getElementById('fpcpe').classList.remove('error');


        let isValid = true;

        if (sq === '') {
            document.getElementById('fpsqe').innerText = 'Please Enter Your Nickname.';
            document.getElementById('fpsqe').classList.add('error');
            isValid = false;
        }

        if (email === '') {
            document.getElementById('fpee').innerText = 'Please Enter Your Email.';
            document.getElementById('fpee').classList.add('error');
            isValid = false;
        } else if (!email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        )) {
            document.getElementById('fpee').innerText = 'Please Enter A Valid Email.';
            document.getElementById('fpee').classList.add('error');
            isValid = false;
        }

        if (password === '') {
            document.getElementById('fppe').innerText = 'Please Enter Your Password.';
            document.getElementById('fppe').classList.add('error');
            isValid = false;
        }

        if (cpassword === '') {
            document.getElementById('fpcpe').innerText = 'Please Re-enter Your Password.';
            document.getElementById('fpcpe').classList.add('error');
            isValid = false;
        } else if (password != cpassword) {
            document.getElementById('fpcpe').innerText = "Passwords Don't Match.";
            document.getElementById('fpcpe').classList.add('error');
            isValid = false;
        }

        return isValid;
    }
}