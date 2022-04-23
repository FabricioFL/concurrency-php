const url = '/sync';




fetch(url)
.then((response) => response.json())
.then((data) => {
    console.log(data);
    document.getElementById('data').innerText += data[0]['message1'];
    document.getElementById('data').innerHTML += '<br>';
    document.getElementById('data').innerText += data[1]['message2'];
})