document.addEventListener('DOMContentLoaded', function() {
    const barcodeInput = document.getElementById('barcode-input');
    const scanButton = document.getElementById('scan-button');
    const resultDisplay = document.getElementById('result-display');

    scanButton.addEventListener('click', function() {
        const barcodeValue = barcodeInput.value;
        if (barcodeValue) {
            // Simulate a barcode scan result
            processBarcode(barcodeValue);
        } else {
            alert('Please enter a barcode or scan a barcode.');
        }
    });

    function processBarcode(barcode) {
        // Here you would typically send the barcode to the server for processing
        // For demonstration, we will just display the scanned barcode
        resultDisplay.innerText = `Scanned Barcode: ${barcode}`;
        
        // Simulate a server response
        setTimeout(() => {
            // Assume we received asset details from the server
            const assetDetails = {
                id: barcode,
                name: 'Sample Asset',
                location: 'Warehouse A',
                status: 'Available'
            };
            displayAssetDetails(assetDetails);
        }, 1000);
    }

    function displayAssetDetails(details) {
        resultDisplay.innerHTML += `<br>Asset ID: ${details.id}<br>Name: ${details.name}<br>Location: ${details.location}<br>Status: ${details.status}`;
    }
});