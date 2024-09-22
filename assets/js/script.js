const req = async({link, bodyRequest = {}, method = 'GET'}) => {
    const config = {
        method: method,
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {'Content-Type': 'application/json'},
        redirect: 'follow',
        referrerPolicy: 'no-referrer'
    };
    if(method != 'GET') config.body = JSON.stringify(bodyRequest);
    const response = await fetch(url+link, config);
    return response.json();
};

const toCapitalCase = str => {
    return str
        .toLowerCase()
        .split(' ')
        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
        .join(' ');
};

const alertHTML = (warna, teks) => `<div class="alert alert-${warna} alert-dismissible fade show" role="alert">
    ${teks}<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>`;

const tableToCsv = idTabel => {
    const csv = [];
    const tabel = document.querySelector(`#${idTabel}`);
    const rows = tabel.querySelectorAll(`tr`);
    rows.forEach(row => {
        const text = [];
        let cols = row.querySelectorAll('th, td');
        cols.forEach(col => text.push(col.innerText));
        csv.push(text);
    });
    return csv.join('\n');
};

const sekarang = () => {
    const currentDate = new Date();
    const year = currentDate.getFullYear();
    const month = String(currentDate.getMonth() + 1).padStart(2, '0');
    const day = String(currentDate.getDate()).padStart(2, '0');
    const hours = String(currentDate.getHours()).padStart(2, '0');
    const minutes = String(currentDate.getMinutes()).padStart(2, '0');
    const seconds = String(currentDate.getSeconds()).padStart(2, '0');
    return `${year}${month}${day}-${hours}${minutes}${seconds}`;
}

const downloadCsv = (idTabel, fileName) => {
    const csv = tableToCsv(idTabel);
    const file = new Blob([csv], {type: 'text/csv'});
    const downloadLink = document.createElement('a');
    downloadLink.download = `${fileName}_${sekarang()}`;
    downloadLink.href = window.URL.createObjectURL(file);
    downloadLink.style.display = 'none';
    document.body.appendChild(downloadLink);
    downloadLink.click();
};