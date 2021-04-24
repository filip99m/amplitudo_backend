// function callAPI(seconds){
//     return new Promise((resolve, reject) => {
//         $.ajax({
//             type: 'GET',
//             url: '',
//             success: (response) => {
//                 resolve(response);
//             },
//             error: (error) => {
//                 reject(error);
//             }
//         });
//     });
// }

// // Promise + callback
// callAPI(5)
//     .then((result) =>{
//         console.log(result);
//         callAPI(2)
//             .then((result2) => {
//                 console.log(result2)
//             });
//     })
//     .catch((error) => {
//         console.log(error);
//     });

// Promise.all([callAPI(5), callAPI(2)]).then((r)=>{

// })
// .catch((e) => {

// });


// async, await
async function callAPI2(seconds){
    await $.ajax({
        type: 'GET',
        url: 'http://localhost:80/amplitudo/cas12/fake_api/sleep.php?seconds='+seconds,
        success: (response) => {
            console.log(response);
        }
    });
}

$(document).ready(async() => {
    let a1 = await callAPI2(5);
    let a2 = await callAPI2(3);
});