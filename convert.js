const axios = require('axios');
const jsontoxml = require('jsontoxml');
const fs = require('fs');


function Json2Xml(rootElement, jsonData) {
    const xmlData = jsontoxml({ [rootElement]: jsonData });
    return xmlData;
}

async function fetchAndConvert() {
    const url = 'http://localhost/tugasapijson/book_json.php'; 

    try {
       
        const response = await axios.get(url);

        if (response.status === 200) {
            const jsonData = response.data;

            // Mengonversi data JSON menjadi XML
            const xmlData = Json2Xml('root', jsonData);

            // Menyimpan hasil konversi XML ke file 'data.xml'
            fs.writeFileSync('data.xml', xmlData);

            console.log('Data berhasil dikonversi dan disimpan sebagai XML di file data.xml.');
        } else {
            console.error('Gagal mendapatkan data dari API, status:', response.status);
        }
    } catch (error) {
        console.error('Error:', error.message);
    }
}


fetchAndConvert();
