$.ajax({
    type: "get", //method
    url: "/wilayah", //url ke controller
    dataType: "json",
    success: function (response) { //response membawa $wilayah dari siswa controller (wilayah) 
        // looping buat namoilin
        response.map((value) => {
            $('#provinces').append($('<option>',{
                value : value.id,
                text : value.name,
            }));
        });
    }
});

// Menggunakan 1 fungsi
function daerah(jenis, id){
    let dr;

    if(jenis == 'provinces'){
        dr = 'regencies'
    }else if(jenis == 'regencies'){
        dr = 'districts'
    }else if(jenis == 'districts'){
        dr = 'villages'
    }

    $.ajax({
        type: "get",
        url: `https://www.emsifa.com/api-wilayah-indonesia/api/${dr}/${id}.json`, //menggunakan titik satu agar value php bisa dibaca
        dataType: "json",
        success: function (response) {
            console.log(response);
            $(`#${dr}`).children().remove()
            response.map((value) => {
                $(`#${dr}`).append($('<option>',{
                    value : value.id,
                    text : value.name
                }));
            });
        }
    });
}

// function daerah(id){
//     $.ajax({
//         type: "get",
//         url: `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${id}.json`, //menggunakan titik satu agar value php bisa dibaca
//         dataType: "json",
//         success: function (response) {
//             $('#kabupaten').children().remove()
//             response.map((value) => {
//                 $('#kabupaten').append($('<option>',{
//                     value : value.id,
//                     text : value.name
//                 }));
//             });
//         }
//     });
// }

// function kecamatan(id){
//     $.ajax({
//         type: "get",
//         url: `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${id}.json`, //menggunakan titik satu agar value php bisa dibaca
//         dataType: "json",
//         success: function (response) {
//             $('#kecamatan').children().remove()
//             response.map((value) => {
//                 $('#kecamatan').append($('<option>',{
//                     value : value.id,
//                     text : value.name
//                 }));
//             });
//         }
//     });
// }

// function kelurahan(id){
//     $.ajax({
//         type: "get",
//         url: `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${id}.json`, //menggunakan titik satu agar value php bisa dibaca
//         dataType: "json",
//         success: function (response) {
//             $('#kelurahan').children().remove()
//             response.map((value) => {
//                 $('#kelurahan').append($('<option>',{
//                     value : value.id,
//                     text : value.name
//                 }));
//             });
//         }
//     });
// }