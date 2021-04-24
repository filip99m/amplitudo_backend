// Globalni nizovi
const naslovi1 = [ 
    'Naslov 1', 
    'Ovo je naslov 2', 
    'Testni naslov 3'
];

const gradovi = [ 
    'Podgorica', 
    'Budva', 
    'Bar',
    'Andrijevica'
];

// Primjer objekta u JS
let student1 = {
    ime: "Marko",
    godina: 3,
    prosjecnaOcjena: 9.02,
    aktivan: true
};

const naslovi2 = [
    // {
    //     tekst: "Naslov 1",
    //     bojaTeksta: "red"
    // },

    // {
    //     tekst: "Naslov 2",
    //     bojaTeksta: "green"
    // },

    // {
    //     tekst: "Naslov 1",
    //     bojaTeksta: "black"
    // }
];

function prikaziNaslove1(){
    let div = document.getElementById('div1');

//// Osnovni nacin za prolaz kroz niz

    for(let i = 0; i < naslovi1.length; i++){
        let sadrzaj = div.innerHTML;
        sadrzaj = sadrzaj + "<h1>" + naslovi1[i] + "</h1>";
        div.innerHTML = sadrzaj;
    }
}

function prikaziNaslove2(){
    let div  = document.getElementById('div1')
    div.innerHTML = "";
// Napredniji nacin za prelaz kroz niz

    naslovi2.forEach(function(naslov) {
        let sadrzaj = div.innerHTML;
        let stil = "style= 'color: " + naslov.bojaTeksta+"'";
        sadrzaj = sadrzaj + "<h1 " + stil + ">" + naslov.tekst + "</h1>";
        div.innerHTML = sadrzaj;
    })
}

function dodajNaslov(){
    let novi_tekst = document.getElementById('novi_naslov_tekst').value;
    let nova_boja = document.getElementById('novi_naslov_boja').value;
    let novi_naslov = {
        tekst: novi_tekst,
        bojaTeksta: nova_boja
    }
    naslovi2.push(novi_naslov);
    prikaziNaslove2();

}

function izmijeniNaslovStranice(){
    let naslov_elem = document.getElementById('glavni_naslov')
    naslov_elem.innerHTML = ""; //isprazni
    let novi_naslov = document.getElementById('novi_naslov_stranice').value;
    naslov_elem.innerHTML = novi_naslov;
}

function pretraziGradove(){
    document.getElementById('rezultati_pretrage').innerHTML = "";
    // kriterijum pretrage
    let kriterijum = document.getElementById('kriterijum').value;
    gradovi.forEach(function(grad){
        if(grad.toLowerCase().includes(kriterijum.toLowerCase())){
            // prikazi ga u DOM
            let sadrzaj = document.getElementById('rezultati_pretrage').innerHTML;
            sadrzaj = sadrzaj + '<p>' + grad + '</p>';
            document.getElementById('rezultati_pretrage').innerHTML = sadrzaj;
        }
    });
}


// Metod koji se poziva na ucitavanje stranice
//prikaziNaslove2();