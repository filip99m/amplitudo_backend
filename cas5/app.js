//console.log(1+1);
//alert('Test');
//console.error('Greska...');
//console.warn("Upozorenje");
//
//Definisanje 

//var, let, const - promljenjive
//var a=10;
//let b=10;
//const c=10;

//var ime = 'Marko';
//var prezime = 'Markovic';
//var fullname = 'Janko Jankovic JR';

//String, number, boolean, null, undefined

//console.log(typeof(ime));
//console.log('aaa'+parseInt('12'));
//console.log(typeof(parseInt('1s2')));

//Stringovi

//console.log('Marko: $(ime)');
//console.log('Ime: $(ime)');
//console.log(ime.toUpperCase());
//console.log(prezime.substring(0,3).toUpperCase());

//Nizovi

//console.log(fullname.split(' ')); //niz

//const gradovi = new Array("Podgorica", "Bar", "Andrijevica");
//const gradovi = ["Podgorica", "Bar", "Andrijevica"];
//console.log(gradovi[1]);
//gradovi.push('Berane');  //.inshift dodaje na pocetak
//console.log(gradovi);
//console.log(gradovi.indexOf("Bar"));

//Objekti

//const grad = {
//    ime: "Podgorica",
//    populacija: 130000,
//    znamenitosti: ['z1', 'z2']
//};

//JSON

//var grad_json = JSON.stringify(grad);
//var grad2 = JSON.parse(grad_json);
//
//console.log(grad.znamenitosti[0]);
//
//console.log(grad2.ime);
//console.log(grad_json);

//Petlje

//for(let i=0, i<12, i++){
//    console.log(i)
//};
//
//let j-0;
//while(j<12){
//    console.log(j);
//    j++;
//}

//for(let i=0; i<gradovi.length; i++){
//    console.log(gradovi[i].ime);
//}    //za nizovove

//gradovi.forEach(function(grad){
//    console.log(grad.ime);
//});

//var populacije = gradovi.map(function(){
//    return grad.populacija;
//});

//var gradovi2 = gradovi.filter(function(grad){
//    return grad.populacija<1000000;
//}).map(function(grad)){
//       return grad.ime;
//};
//
//console.log(gradovi2);

//var gradovi2=gradovi.filter((grad)=>grad.ime).map(function(grad){
//    return grad.ime.toUpperCase();
//});


//var a=10;
//var b='10';
//var color = '';

//if(a==b){
//    console.log('da');
//}else{
//    console.log('ne');
//}


//const color = (a > 5) ? 'red' : 'blue';
//console.log(color);


//switch(a){
//    case 10:
//        color = 'red';
//        break;
//    case 12:
//        color = 'blue';
//        break;
//    default:
//        color = 'green';
//        break;
//}

//console.log(window);

//const naslovi = document.getElementById('naslov');
//console.log(naslovi);

//Uzimanje elementa iz .html
//const naslovi = document.querySelectorAll('h2');
//console.log(naslovi[0]);

//const naslovi = document.querySelector('h2');
//const body = document.querySelector('body');
////console.log(body.innerHTML);
//body.innerHTML=body.innerHTML + "<a href=''>AAAAA</a>";

//const naslov = document.querySelector('#naslov');
//const body = document.querySelector('body');
//
//
//body.innerHTML=body.innerHTML + "<a href=''>AAAAA</a>";
//body.style.color = 'blue';


//const naslov = document.querySelector('#naslov');
//const body = document.querySelector('body');
//
//console.log(naslov.classList);
//
//body.innerHTML=body.innerHTML + "<a href=''>AAAAA</a>";


//const naslov = document.querySelector('#naslov');
//const body = document.querySelector('body');
//
//const btn = document.querySelector('#dugme1');
//
//btn.addEventListener('click', function(e){
//    alert('Klik se desio :D ');
//});


//const naslov = document.querySelector('#naslov');
//const body = document.querySelector('body');
//
//const btn = document.querySelector('#dugme1');
//
//btn.addEventListener('click', function(e){
//    console.log(e.target);
//});

//const naslov = document.querySelector('#naslov');
//const body = document.querySelector('body');
//
//const btn = document.querySelector('#dugme1');
//
//btn.addEventListener('click', function(e){
//    naslov.remove();
//});

const gradovi=[
    {
        ime: "Podgorica",
        populacija: 130000,
        znamenitosti: ['z1', 'z2']
    },
    {
        ime: "BAR",
        populacija: 20000,
        znamenitosti: ['zb1', 'zb2']
    }
];



const tbody = document.querySelector('#tabela_gradova_body');

gradovi.forEach(function(grad){
    var redovi = tbody.innerHTML;
    var znam_temp=grad.znamenitosti;
    var znam_prikaz=znam_temp.map(function(z){return z});
    
    
    redovi = redovi + '<tr>' + '<td>' + grad.ime + '</td>' + '<td>' + grad.populacija + '</td>' + '<td>'+znam_prikaz + '</td></tr>';
    tbody.innerHTML=redovi;
});

