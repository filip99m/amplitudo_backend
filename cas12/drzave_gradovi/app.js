function getCities(){
    return $.ajax({
        type: 'GET',
        url: 'http://localhost:80/amplitudo/cas12/fake_api/drzave.php',
    })
    .then((response) => {
        let drzava_id = JSON.parse(response).id
        $.ajax({
            type: 'GET',
            url: 'http://localhost:80/amplitudo/cas12/fake_api/gradovi.php?drzava_id='+drzava_id,
        })
        .then((response) => {
            console.log(response);
        });
    });
}

getCities();