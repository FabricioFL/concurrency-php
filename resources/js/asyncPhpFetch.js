const url = '/asyncsample';




fetch(url)
.then((response) => response.text())
.then((data) => {
    console.log(data);
    document.getElementById('data').innerHTML += data;
})