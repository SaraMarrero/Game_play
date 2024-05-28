// Almacena los elementos recogidos en ajax
let datos = [];

// Muestra el carrito
$(document).ready(function() {
    $('#mostrar-carrito').click(function() {
        $('#carrito').toggleClass('hidden');
    });
});


$('.agregarCarrito').click(() => mostrarHTML());

// Coge los datos del carrito de php
$(document).ready(function() {
    let ajax = new XMLHttpRequest();

    // Configura la solicitud
    ajax.open('GET', '/carrito/addCarrito', true);

    // Configura la función de respuesta
    ajax.onload = function() {
        if (ajax.status >= 200 && ajax.status < 300) {
                let data = JSON.parse(ajax.responseText);
                datos.push(data);
                // Llama a la función que muestra el html
                mostrarHTML();

        } else {
            console.error('Hubo un problema con la solicitud. Código de estado:', ajax.status);
        }
    };

    // Manejo de errores
    ajax.onerror = function() { 
        console.error('Hubo un error al realizar la solicitud.'); 
    };

    // Envia la solicitud
    ajax.send();
});


// Muestra los elementos del carrito en el html
function mostrarHTML(){

    if(datos !== ''){
        $.each(datos, function(index, element) {
            $.each(element, function(innerIndex, element) {
                const { fotoJuego, nombreJuego, precioJuego, cantidad, id_compra } = element;

                $('.tbody').append(`
                    <tr>
                        <td class='p-1 text-center'><img src='/build/img/${fotoJuego}'></td>
                        <td class='p-1 text-center'>${nombreJuego}</td>
                        <td class='p-1 text-center'>${precioJuego}</td>
                        <td class='p-1 text-center'>${cantidad}</td>
                        <td class="p-1 text-center flex flex-col">
                            <a href='/carrito/addCantidadCarrito?id_compra=${id_compra}'>➕</a>
                            <a href='/carrito/removeElementCarrito?id_compra=${id_compra}'>➖</a>
                            <a href='/carrito/removeCantidadCarrito?id_compra=${id_compra}'>🗑️</a>
                        </td>
                    </tr>
                `);
            });
        });
        
    
        $('.tbody').append(`
            <tr>
                <td colspan="5" class="text-center p-3">
                    <a href='/carrito/vaciarCarrito' class="border border-gray-500 p-2 rounded-lg bg-red-200">Vaciar Carrito</a>
    
                    <a href='/juegos/error' class="border border-gray-500 p-2 rounded-lg bg-green-200">Pagar</a>
                </td>
            </tr>
        `);
    }
}