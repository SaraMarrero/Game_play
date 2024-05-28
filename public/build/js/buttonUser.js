// Agregar el evento click para mostrar/ocultar las opciones del menú
document.getElementById('dropdownInformation').addEventListener('click', function(event) {
    event.stopPropagation(); // Evitar que el evento llegue al body
    var dropdown = document.getElementById('dropdownInformation');
    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
    } else {
        dropdown.style.display = 'block';
    }
});

// Agregar un evento para cerrar el menú al hacer clic fuera del botón
document.addEventListener('click', function(event) {
    var dropdown = document.getElementById('dropdownInformation');
    if (dropdown.style.display === 'block' && event.target !== document.getElementById('dropdownInformationButton')) {
        dropdown.style.display = 'none';
    }
});