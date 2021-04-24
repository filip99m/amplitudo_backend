const pitanja = [
    {
        oblast: "Pogodite grad u Crnoj Gori",
        ponudjeno: [
            "podgorica",
            "budva",
            "bar",
            "kolašin",
            "tivat",
            "kotor"
        ]
    },
    {
        oblast: "Pogodite programski jezik",
        ponudjeno: [
            "javascript",
            "php",
            "cpp",
            "kotlin",
        ]
    }
];

let odgovor = "";
let brGresaka = 0;
let maksBrGresaka = 6;
let pogodjenaSlova = [];
let trenutnaRijec = null;

// Funkcija za biranje oblasti i ponudjenog
function nasumicanOdgovor(){
    // 0 <= n < 1
    // floor i ceil
    let oblast = pitanja[ Math.floor(Math.random() * pitanja.length)];
    odgovor = oblast.ponudjeno[Math.floor(Math.random() * oblast.ponudjeno.length)];
    document.getElementById('oblastNaziv').innerHTML = oblast.oblast;
    zadajTrazenuRijec();
    //console.log(odgovor)
}

// Funkcija za prikaz crtica od trazene rijeci
function zadajTrazenuRijec(){
    let rijecTemp = "";
    for(let i=0; i < odgovor.length; i++){
        rijecTemp += "_";
    }
    document.getElementById('trazenaRijec').innerHTML = rijecTemp
}

// Funkcija za generisanje dugmadi
function generiseDugmad(){
    let abeceda = ['a', 'b', 'c', 'ć', 'č', 'd', 'dž', 'đ', 'e', 'f', 'g', 'h',	'i', 'j', 'k', 'l', 'lj', 'm', 'n', 'nj', 'o', 'p', 'r', 's', 'š', 't', 'u', 'v', 'z',	'ž'];
    let dugmadHTML = [];
    abeceda.forEach (slovo => {
        dugmadHTML.push(
            `
                <button id="${slovo}" class="btn btn-lg m-2 btn-primary" onClick="pokusajSlovo('${slovo}')"> ${slovo} </button>
            `
        );
    });
    document.getElementById('tastatura').innerHTML = dugmadHTML.join('');
}

// Funkcija za pokusaj slova, postoji li ili ne
function pokusajSlovo(odabranoSlovo){
    pogodjenaSlova.push(odabranoSlovo)
    document.getElementById(odabranoSlovo).setAttribute('disabled', true);
    // ako je slovo ponudjeno
    if(odgovor.indexOf(odabranoSlovo) >= 0){
        pogodjenoSlovo();
        provjeriPobjedu()
    } else{
        brGresaka++;
        azurirajGreske();
        provjeriPoraz();
        azurirajSliku();
    }
}

// Funkcija za pogodjeno slovo
function pogodjenoSlovo(){
    trenutnaRijec = "";
    let odgovorTemp = odgovor.split('');

    odgovorTemp.forEach( slovo => {
        if(pogodjenaSlova.indexOf(slovo) >= 0) 
            trenutnaRijec += slovo
        else trenutnaRijec += "_";
    });

    document.getElementById('trazenaRijec').innerHTML = trenutnaRijec;
}

// Funkcija za pobjedu
function provjeriPobjedu(){
    if(trenutnaRijec === odgovor){
        document.getElementById('tastatura').innerHTML = "<h2>BRAVO!!! Pobijedili ste</h2>"
    }
}

// Funkcija za azuriranje gresaka
function azurirajGreske(){
    document.getElementById('brGresaka').innerHTML = brGresaka;
};

// Funkcija za poraz
function provjeriPoraz(){
    if(brGresaka === maksBrGresaka){
        document.getElementById('trazenaRijec').innerHTML = `Tacan odgovor je: <b>${odgovor}</b>`;
        document.getElementById('tastatura').innerHTML = `Izgubio si!!!`;
    };
}

// Funkcija za slike
function azurirajSliku(){
    document.getElementById('vjesalaSlika').src = './img/' + brGresaka + '.png';
}

//Funkcija za reset funkcije
function reset(){

    location.reload();

    //brGresaka = 0;
    //pogodjenaSlova = [];
    //document.getElementById('vjesalaSlika').src = '.img/0.png';
    
    //nasumicanOdgovor();
    //azurirajGreske();
}

//Poziv funkcija
nasumicanOdgovor();
generiseDugmad();

