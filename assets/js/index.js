// Obtén la ruta actual del script
var scriptElement = document.getElementById('linkscript');
var scriptSrc = scriptElement.src;

// Divide la ruta en partes utilizando "/" como separador
var parts = scriptSrc.split('/');

// Obtiene el último elemento de la matriz que es el nombre del archivo
var fileName = parts[parts.length - 1];

// Reemplaza el atributo 'src' con el nuevo nombre de archivo
scriptElement.src = '../assets/js/' + fileName;