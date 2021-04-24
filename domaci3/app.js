$(document).ready(function(){ 
    $("#movieForm").submit(function(event){
        $("#istrazi").hide(); 
        $("#error").hide();

        event.preventDefault()
        
        let naziv = $('#naziv').val()
        let godina = $('#godina').val()
        let tip = $("#film_serija").val();
        let url = "";

        let rezultat = "";

    // Provjera za godinu
        if(godina !== 0){
            url = `http://www.omdbapi.com/?apikey=d3a6d840&t=${naziv}&type=${tip}&y=${godina}`;
        } else {
            url = `http://www.omdbapi.com/?apikey=d3a6d840&t=${naziv}&type=${tip}`;
        }


        $.ajax({
            method: 'GET',
            url: url,
            success: function(data){
                if(data.Response === "False"){
                    $("#error").html(data.Error);
                    $("#error").show();
                    $("#rezultat").hide();
                    return;
                
                };
                console.log(data)
                $("#rezultat").show();
                rezultat = 
                `   
                    <div">
                    <table class="table table-borderless mt-5">
                        <tr>
                            <td rowspan="10">
                `
                
            //Ako ne postoji slika, prikazi "Image not found" (Probati sa filmom "Otac")
                if(data.Poster === "N/A"){
                    rezultat +=
                    `
                            <img class="img-thumnail mx-auto d-block" src="slike/image_not_found.png"/>
                            </td>
                        </tr>
                    `
                } else{
                    rezultat +=
                    `
                            <img class="img-thumnail mx-auto d-block" src="${data.Poster}"/>
                            </td>
                        </tr>
                    `
                };
                
                rezultat +=
                `
                        <tr>
                            <td class="prva_kolona">Naslov</td>
                            <td class="boldovano druga_kolona">${data.Title}</td>
                        </tr>
                        <tr>
                            <td class="prva_kolona">Godina</td>
                            <td class="druga_kolona">${data.Year}</td>
                        </tr>
                        <tr>
                            <td class="prva_kolona">Datum</td>
                            <td  class="centar druga_kolona">${data.Released}</td>
                        </tr>
                        <tr>
                            <td class="prva_kolona">Trajanje</td>
                            <td class="druga_kolona">${data.Runtime}</td>
                        </tr>
                        <tr>
                            <td class="prva_kolona">Reziser</td>
                            <td class="druga_kolona">${data.Director}</td>
                        </tr>
                        <tr>
                            <td class="prva_kolona">Glumci</td>
                            <td class="druga_kolona">${data.Actors}</td>
                        </tr>
                        <tr>
                            <td class="prva_kolona">Radnja <br> filma</td>
                            <td class="druga_kolona">${data.Plot}</td>
                        </tr>
                `;
                    
                //Ako je serija dodajemo red za sezone
                    if(data.Type === "series"){
                        rezultat += 
                        `
                            <tr>
                                <td class="prva_kolona">Broj sezona</td>
                                <td class="druga_kolona">${data.totalSeasons}</td>
                            </tr>
                        `
                    }
                    rezultat += 
                    `
                        <tr>
                            <td class="prva_kolona">Ocjene</td>
                            <td class="druga_kolona">
                                <ol>
                    `;
                
                //Dodavanje ocjena
                    data.Ratings.forEach(ocjena => {
                        rezultat +=
                        `
                            <li>${ocjena.Source} : ${ocjena.Value}</li>
                        `
                    });
                    
                    rezultat +=
                    `
                                </ol>
                            </td>
                        </tr>
                    </table>
                    </div>
                    `
                $("#rezultat").html(rezultat);
            }
        })
    });
});

