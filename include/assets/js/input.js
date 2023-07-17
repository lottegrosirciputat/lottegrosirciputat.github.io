function ais(el) {

    // object ajax
    var xhr = new XMLHttpRequest();

    // cek ajax
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            document.getElementById('loc').value = xhr.responseText;
            // console.log(xhr.responseText)

            if (el.value.length > 2) {

                if( xhr.responseText == '' ) {

                    el.value = '';

                } else {

                document.querySelector('.by').focus();

                }
            }
        }
    }

    // eksekusi
    xhr.open('GET', 'include/assets/ajax/location.php?aisle=' + el.value, true);
    xhr.send();            

};

function by(el) {

    var aisle = document.querySelector('.aisle1');

    // object ajax
    var xhr = new XMLHttpRequest();

    // cek ajax
    xhr.onreadystatechange = function() {
        if( xhr.readyState == 4 && xhr.status == 200 ) {
            // el.value = xhr.responseText;
            // console.log(xhr.responseText)
            var response = JSON.parse(this.responseText);
            // var no = el.getAttribute("id");
            if (el.value.length > 2) {

                if( response == '' ) {

                    el.value = '';

                } else if( response == 'bay' ) {

                    Swal.fire({
                        title: 'Oops!',
                        text: 'Bay terdaftar sebagai bay kosong!',
                        width: 400,
                        icon: 'warning',
                        color: '#464141',
                        confirmButtonColor: '#2481C1'
                    })
                    el.value = '';

                } else {

                    document.querySelector('.barcode1').focus();

                }
            }
        }
    }

    // eksekusi
    xhr.open('GET', 'include/assets/ajax/src_bay.php?aisle=' + aisle.value + '&bay=' + el.value, true);
    xhr.send();            

};

const load = document.getElementById('load');
let jumlah = 2;

function barc(el) {

    var aisle = document.querySelector('.aisle1');
    var bay = document.querySelector('.bay');
    
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {

        if( xhr.readyState == 4 && xhr.status == 200 ) {

            var response = JSON.parse(this.responseText);
            var no = el.getAttribute("id");           
            
            
            if ( el.value.length <= 12 ) {
                
                if ( response != '' ) {    
                    
                    var barcode = response['barcode'];
                    var cd = response['cd'];
                    var nm = response['nm'];
                    el.value = barcode;
                    document.querySelector('.prodcd'+el.id).value = cd;
                    document.querySelector('.prodnm'+el.id).value = nm;
                    const load = document.getElementById('load');
                    let newCart =  "<tr id='d"+jumlah+"'><td><input type='number' name='barcode[]' class='barcode"+jumlah+"' id='"+jumlah+"' oninput='barc(this)'></td>"+
                                    "<td><input type='number' name='prodcd[]' class='prodcd"+jumlah+"' id='"+jumlah+"' readonly></td>"+
                                    "<td><input type='text' name='prodnm[]' class='prodnm"+jumlah+"' id='"+jumlah+"' readonly></td>"+
                                    "<td><button type='button' class='del"+jumlah+"' id='"+jumlah+"' onclick='del(this)'><img src='include/assets/img/icons/remove.png'></button></td>"+
                                    "</tr>";

                    load.insertAdjacentHTML('beforeend', newCart);

                    document.querySelector('.barcode'+jumlah+'').focus();
                    
                    jumlah++;

                }

            } else if ( el.value.length == 13 ) {

                if( el.value.length == 13 && response == '' ) {

                    el.value = '';

                } else if( response == 'reg' ) {

                    Swal.fire({
                        title: 'Oops!',
                        text: 'Barcode telah terdaftar!',
                        width: 400,
                        icon: 'warning',
                        color: '#464141',
                        confirmButtonColor: '#2481C1'
                    })
                    el.value = '';

                } else {

                    var barcode = response['barcode'];
                    var cd = response['cd'];
                    var nm = response['nm'];
                    el.value = barcode;
                    document.querySelector('.prodcd'+el.id).value = cd;
                    document.querySelector('.prodnm'+el.id).value = nm;
                    // console.log(response)
                    // document.querySelector('.add').focus();
                    const load = document.getElementById('load');
                    let newCart =  "<tr id='d"+jumlah+"'><td><input type='number' name='barcode[]' class='barcode"+jumlah+"' id='"+jumlah+"' oninput='barc(this)'></td>"+
                                    "<td><input type='number' name='prodcd[]' class='prodcd"+jumlah+"' id='"+jumlah+"' readonly></td>"+
                                    "<td><input type='text' name='prodnm[]' class='prodnm"+jumlah+"' id='"+jumlah+"' readonly></td>"+
                                    "<td><button type='button' class='del"+jumlah+"' id='"+jumlah+"' onclick='del(this)'><img src='include/assets/img/icons/remove.png'></button></td>"+
                                    "</tr>";

                    load.insertAdjacentHTML('beforeend', newCart);

                    document.querySelector('.barcode'+jumlah+'').focus();
                    jumlah++;

                }

            }
            
        }

    }

    // eksekusi
    xhr.open('GET', 'include/assets/ajax/query.php?aisle=' + aisle.value + '&bay=' + bay.value + '&barc=' + el.value, true);
    xhr.send();

};


function add(el) {

    const load = document.getElementById('load');
    let jumlah = 2;

    // let newCart =  "<tr id='d"+jumlah+"'><td id='n'>" + jumlah + "</td>"+
    let newCart =  "<tr id='d"+jumlah+"'><td><input type='number' name='barcode[]' class='barcode"+jumlah+"' id='"+jumlah+"' oninput='barc(this)'></td>"+
                "<td><input type='number' name='prodcd[]' class='prodcd"+jumlah+"' id='"+jumlah+"' readonly></td>"+
                "<td><input type='text' name='prodnm[]' class='prodnm"+jumlah+"' id='"+jumlah+"' readonly></td>"+
                "<td><button type='button' class='del"+jumlah+"' id='"+jumlah+"' onclick='del(this)'><img src='include/assets/img/icons/remove.png'></button></td>"+
                "</tr>";

load.insertAdjacentHTML('beforeend', newCart);

document.querySelector('.barcode'+jumlah+'').focus();

jumlah++;

}

function del(el) {
    var nomor = document.querySelectorAll("#n");
    var urut = el.id;
    var bay = document.querySelector('#d'+urut+'');
    var focus = parseInt(urut) + 1;

    bay.remove();

}