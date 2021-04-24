// ES6 2015

/*function sum(a,b){
    return a+b;
}

const sum = a => a*a;
*/

class Student {
    constructor(ime, prezime, godiste){
        this.ime = ime;
        this.prezime = prezime;
        this.godiste = godiste;
    }
}

let s1 = new Student('Marko', 'Markovic', 1999)
let s2 = new Student('Janko', 'Markovic', 1996)
let s3 = new Student('Dejan', 'Markovic', 1996)

console.log(s1) 

const studenti = [s1, s2, s3];

// vraca jedan element niza
let temp = studenti.find((value, index, array) => {
    value.godiste >= 1997;
});

// vraca niz
let studenti2 = studenti.filter((student) => student >= 1997).map( (student) => 2020-student.godiste);

studenti2.splice(0,1);

Number.isInteger();

// state:pending, fulfilled, rejected
// result: undefined, result, error

const myPromise = new Promise( (reslove, reject) => {
    if(result){
        reslove();
    }else{
        reject();
    }
});

myPromise.then( result => {

});

myPromise.catch( error => {

});

async function f1(a,b){
    await $.ajax({
            
    });
};