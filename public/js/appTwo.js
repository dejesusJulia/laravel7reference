// Variables
var addImg = document.querySelector('#file-group');

addImg.addEventListener('change', showFileName);

function showFileName(e){
    var fileName = document.getElementById('image').files[0].name;
    var sibling  = e.target.nextElementSibling;
    sibling.innerText = fileName;
}