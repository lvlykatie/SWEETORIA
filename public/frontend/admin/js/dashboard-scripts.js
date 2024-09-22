
document.getElementById('inputImage').addEventListener('change', function (event) {
    const files = event.target.files; // This will contain the selected files
    if (files.length > 0) {
        console.log('Selected file:', files[0].name);
    }
    else {
        console.log('cc');

    }
});
function previewImage (event) {
    const inputImage = document.getElementById('inputImage')
    console.log(inputImage.value);
    
}