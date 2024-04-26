function changePass() {
    const form = document.getElementById('changepass_form');
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        document.getElementById('cppe').innerText = ''
        document.getElementById('cppe').classList.remove('error');
        document.getElementById('cpnpe').innerText = ''
        document.getElementById('cpnpe').classList.remove('error');
        document.getElementById('cpcpe').innerText = ''
        document.getElementById('cpcpe').classList.remove('error');

        const password = form.password.value;
        const npassword = form.npassword.value;
        const cpassword = form.cpassword.value;

        let isValid = true;

        if (password === '') {
            document.getElementById('cppe').innerText = 'Please Enter Your Current Password.';
            document.getElementById('cppe').classList.add('error');
            isValid = false;
        }

        if (npassword === '') {
            document.getElementById('cpnpe').innerText = 'Please Enter A New Password.';
            document.getElementById('cpnpe').classList.add('error');
            isValid = false;
        }

        if (cpassword === '') {
            document.getElementById('cpcpe').innerText = 'Please Re-enter Your Password.';
            document.getElementById('cpcpe').classList.add('error');
            isValid = false;
        } else if (npassword != cpassword) {
            document.getElementById('cpcpe').innerText = "Passwords Don't Match.";
            document.getElementById('cpcpe').classList.add('error');
            isValid = false;
        }

        return isValid;
    }
}