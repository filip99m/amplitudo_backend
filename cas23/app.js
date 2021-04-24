document.getElementById('registracija_form').addEventListener('submit', provjeriUnos );

var greske = [];

function provjeriUnos(e){
    greske = [];
    e.preventDefault();

    provjeriIme();
    provjeriMail();
    provjeriTelefon();
    provjeriLozinku();

    if(greske.length > 0){
        prikaziGreske();
    }else{
        document.getElementById('registracija_form').submit();
    }
        
}

function prikaziGreske(){
    const greske_div = document.getElementById('greske_div');
    var greske_temp = "";
    greske.forEach(function(greska){
        // template string, ES6
        greske_temp += `<p>${greska}</p>`;
    });
    greske_div.innerHTML = greske_temp;
    greske_div.classList.remove('d-none');
}

function provjeriIme(){
    document.getElementById('ime_input').classList.remove('is-invalid');
    const ime = document.getElementById('ime_input').value;
    if(ime.length === 0){
        greske.push("Morate unijeti ime.");
        document.getElementById('ime_input').classList.add('is-invalid');
    }
}

function provjeriMail() {
    document.getElementById('email_input').classList.remove('is-invalid');
    const email = document.getElementById('email_input').value;
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(String(email).toLowerCase())){
        greske.push("Neispravan email.");
        document.getElementById('email_input').classList.add('is-invalid');
    }
    // return re.test(String(email).toLowerCase());
}

function provjeriTelefon(){
    document.getElementById('telefon_input').classList.remove('is-invalid');
    const telefon = document.getElementById('telefon_input').value;
    if(!(telefon.length === 6 || telefon.length === 7)){
        greske.push("Neispravan broj telefona.");
        document.getElementById('telefon_input').classList.add('is-invalid');
    }
}

function provjeriLozinku(){
    document.getElementById('password1_input').classList.remove('is-invalid');
    document.getElementById('password2_input').classList.remove('is-invalid');
    // provjera poklapaju li se lozinke
    const password1 = document.getElementById('password1_input').value;
    const password2 = document.getElementById('password2_input').value;
    if(!(password1 === password2 && password1.length > 7)){
        greske.push("Neispravna lozinka.");
        document.getElementById('password1_input').classList.add('is-invalid');
        document.getElementById('password2_input').classList.add('is-invalid');
    }
}