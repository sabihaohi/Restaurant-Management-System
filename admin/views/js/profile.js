function profile() {
    const form = document.getElementById('profile_form');
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        document.getElementById('pse').innerText = ''
        document.getElementById('pse').classList.remove('error');
        document.getElementById('psqe').innerText = ''
        document.getElementById('psqe').classList.remove('error');
        document.getElementById('pne').innerText = ''
        document.getElementById('pne').classList.remove('error');

        const name = form.name.value;
        const sq = form.sq.value;
        const address = form.address.value;

        let isValid = true;


        if (name === '') {
            document.getElementById('pne').innerText = 'Please Enter Your Full Name.';
            document.getElementById('pne').classList.add('error');
            isValid = false;
        }


        if (sq === '') {
            document.getElementById('psqe').innerText = 'Please Enter Your Nickname.';
            document.getElementById('psqe').classList.add('error');
            isValid = false;
        }

        if (address === '') {
            document.getElementById('pse').innerText = 'Please Enter Your Address.';
            document.getElementById('pse').classList.add('error');
            isValid = false;
        }

        return isValid;
    }
}