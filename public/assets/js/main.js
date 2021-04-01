
async function getKabupaten(id_province,method) {
    const url = getUrl(method);
    const data = await fetch(url + `/${id_province}`,{
        method : "GET"
    }).then(response => response.json());

    if(data.code == "404") {
        throw new Error("URL API salah...");
    } else {
        return data.rajaongkir.results;
    }
    
}

async function Kabupaten() {
    const provinsi = document.getElementById('provinsi');
    clear('Kabupaten');
    try {
        const data = await getKabupaten(provinsi.value, 'getCity');
        display(data,'kabupaten');
    } catch(error) {
        alert(error);
    }
    
}

//  TODO : function get service

async function getService(id_city,method) {
    const url = getUrl(method);
    const body = {
        'origin' : "154",
        'destination' : id_city,
        'weight' : "100",
        'courier' : 'jne'
    };
    const data = await fetch(url,{
        method : "POST",
        headers : {
            'Content-Type' : 'application/json'
        },
        body : JSON.stringify(body)
    }).then(response => response.json());

    if(data.code == "404") {
        throw new Error("URL API salah...");
    } else {
        return data.rajaongkir.results;
    }
    
}

async function service() {
    const kabupaten = document.getElementById('kabupaten');
    clear('service');
    try {
        const data = await getService(kabupaten.value,'getCost');
        display(data,'service');
    } catch(error) {
        alert(error);
        console.log(error);
    }
}

function estimasi() {
    const valueEstimasi = document.getElementById('service').value;
    const estimasi  = document.querySelectorAll('#service option');
    
    estimasi.forEach(element => {
        if(valueEstimasi == element.value) {
            
            const estimasi = document.getElementById('estimasi');
            const etd = element.getAttribute('etd');
            estimasi.textContent = `${etd} Hari`;

            const ongkir = document.getElementById('ongkir');
            ongkir.value = `Rp. ${rupiah(element.value)}`
            
        }
    })
}


// TODO:  function Utility

function getUrl(method) {
    return "http://localhost/ci4-olshop/etalase/"+method;
}

function clear(element) {
    const kabupaten = document.getElementById(element.toLowerCase());
    kabupaten.textContent = '';
    kabupaten.insertAdjacentHTML('afterbegin',`<option>-- Pilih ${element} --</option>`);

}

function display(data,element) {
    data.forEach(data => {
        updateUI(data,element);
    });
}

function updateUI(data,element) {
    const Element = document.getElementById(element);

    if(element == 'kabupaten') {
        const option = document.createElement('option');
        option.setAttribute('value',`${data.city_id}`);
        option.textContent = data.city_name;
        Element.appendChild(option);
    } else {
        data.costs.forEach(data => {
            const option = document.createElement('option');
            option.setAttribute('value',`${data.cost[0].value}`);
            option.setAttribute('etd',`${data.cost[0].etd}`);
            option.textContent = `${data.description} (${data.service})`;
            Element.appendChild(option);
        });
    }
}

function rupiah(bilangan) {
    var	number_string = bilangan.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
		
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    return rupiah;
}

function jumlahHarga() {
    
    const total_harga = document.getElementById('total_harga');
    const jumlah = document.getElementById('jumlah').value;

    if(jumlah == 0) {
        total_harga.value = '';
        return;
    }

    const harga = document.getElementById('harga').value;
    const ongkir = document.getElementById('ongkir').value;
    const pecah_ongkir = ongkir.replace('Rp. ','');
    const split_ongkir = pecah_ongkir.split('.');
    const join_ongkir = split_ongkir.join('');
    const total = (parseInt(jumlah)*parseInt(harga)) + parseInt(join_ongkir);

    total_harga.value = `Rp. ${rupiah(total)}`;
}