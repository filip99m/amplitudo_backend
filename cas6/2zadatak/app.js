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
    }
];

const kvizDiv = document.getElementById('kviz')
const rezultatDiv = document.getElementById('rezultat')
const zavrsiBtn = document.getElementById('zavrsi')


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


function prikaziRezultat(){
  let brTacnih=0;
  //const sviOdgovori = kvizDiv.querySelectorAll('.odgovori');

  pitanja.forEach(function(trenutnoPitanje, pitanjeIdn){
      const selektor = `input[name=odgovor${pitanjeIdn}]:checked`;
      // input[name=odgovor1]:checked
      const odgovoreno = (document.querySelector(selektor) || {}).value;
      console.log(odgovoreno, trenutnoPitanje.tacanOdgovor);
      if(odgovoreno === trenutnoPitanje.tacanOdgovor){
        brTacnih++;
      }else{

      }

  });

  rezultatDiv.innerHTML = `Rezultat: <h3>${brTacnih} od ${pitanja.length}</h3>`
}

zavrsiBtn.addEventListener('click', prikaziRezultat);
pokreniKviz();