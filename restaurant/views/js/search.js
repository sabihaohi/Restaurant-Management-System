function search(pForm) {
    const method = pForm.method;
    const key = pForm.search.value;
    const url = pForm.action + "?name=" + key;

    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("i1").innerHTML = this.responseText;
    }
    xhttp.open(method, url);
    xhttp.send();

    return false;

}