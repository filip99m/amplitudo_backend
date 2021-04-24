// 3. Potrebno je dodati još tri proizvoljna 
// pitanja sa po tri ponuđena odgovora u niz pitanja.

const pitanja = [
    {
      pitanje: "Ko je osnivač kompanije <em>Apple</em>?", 
      odgovori: {
        a: "Bil Gejts",
        b: "Ilon Maks",
        c: "Stiv Džobs"
      },

      tacanOdgovor: "c"
    },

    {
      pitanje: "Kako se zvala prva programerka? Jedan progamski jezik nosi njeno ime.",
      odgovori: {
        a: "Ada Bajron",
        b: "Karmen Elektra",
        c: "Java Script"
      },

      tacanOdgovor: "a"
    },
    
    {
      pitanje: "Kako se zove čuveni naučnik o kome govori film <em>The Immitation Game</em> ",
      odgovori: {
        a: "Nikola Tesla",
        b: "Alen Tjuring",
        c: "Tomas Edison"
      },
      tacanOdgovor: "b"
    },

    {
      pitanje: "Koje godine je  <em>Neil Armstrong</em> sletio na Mjesec?", 
      odgovori: {
        a: "1959",
        b: "1965",
        c: "1969"
      },

      tacanOdgovor: "c"
    },

    {
      pitanje: "Kada je objavljena prva verzija <em>Windows operativnog sistema</em>?", 
      odgovori: {
        a: "1985",
        b: "1979",
        c: "1991"
      },

      tacanOdgovor: "a"
    },

    {
      pitanje: "Sta je <em>Nokia</em>, prije telefona, proizvodila?", 
      odgovori: {
        a: "Kompjutere",
        b: "Gume",
        c: "Kuhinjske aparate"
      },

      tacanOdgovor: "b"
    },
];

const kvizDiv = document.getElementById('kviz')
const rezultatDiv = document.getElementById('rezultat')
const zavrsiBtn = document.getElementById('zavrsi')

// 2.  Postaviti tajmer da se automatski zavrsi nakon 60 sekundi


// Tajmer
const tajmer=document.getElementById('tajmer')
let sekunda=60;

provjeriVrijeme = () => {
  sekunda--;
  tajmer.innerHTML=sekunda;
  if(sekunda === 0){
    prikaziRezultat();
    clearInterval(interval)
    interval.style.display = "none";
  }
}

const interval = window.setInterval(provjeriVrijeme, 1000);

//Funkcija za pokretanje kviza
function pokreniKviz(){

  const output = [];
  pitanja.forEach(function(trenutnoPitanje, pitanjeIdn){

    const odgovori = [];
    for(slovo in trenutnoPitanje.odgovori){
      odgovori.push(
        `
          <label>
            <input type="radio" name="odgovor${pitanjeIdn}" value="${slovo}">
            ${slovo} : ${trenutnoPitanje.odgovori[slovo]}
          </label>
        `
      );
    }

    output.push(
      `
        <div class="pitanje"> ${trenutnoPitanje.pitanje} </div>
        <div class="odgovori"> ${odgovori.join('')} </div>
      `
    );

  });

  kvizDiv.innerHTML = output.join('');

}

// 1. Tekst pitanja dobija crvenu ili zelenu boju(netacno/tacno)


// Funkcija za prikazivanje rezultata
function prikaziRezultat(){

  const tajmer = document.querySelector('#tajmer');  
  tajmer.style.display = "none";
  clearInterval(interval);

  let brTacnih=0;
  //const sviOdgovori = kvizDiv.querySelectorAll('.odgovori');

  pitanja.forEach(function(trenutnoPitanje, pitanjeIdn){
      const selektor = `input[name=odgovor${pitanjeIdn}]:checked`;
      const odgovoreno = (document.querySelector(selektor) || {}).value;

      console.log(odgovoreno, trenutnoPitanje.tacanOdgovor);

      //smjestanje pitanja u niz i pozivanje pojedinacnog
      const nizPitanja = document.querySelectorAll('.pitanje');
      const pojedinacnoPitanje = nizPitanja[pitanjeIdn];

      if(odgovoreno === trenutnoPitanje.tacanOdgovor){
        brTacnih++;
        pojedinacnoPitanje.classList.add('tacno_pitanje'); 
    } else {
        pojedinacnoPitanje.classList.add('netacno_pitanje'); 
    }
  });


  rezultatDiv.innerHTML = `Rezultat: <h3>${brTacnih} od ${pitanja.length}</h3>`
}

pokreniKviz();
zavrsiBtn.addEventListener('click', prikaziRezultat);




