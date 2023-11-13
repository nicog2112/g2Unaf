// function validarFormulario() {
//     // Obtener referencias a los elementos del formulario
//     const nombreInput = document.getElementById("nombre");
//     const errorNombre = document.getElementById("errorNombre");
//     const nombreValor = nombreInput.value.trim();

//     const descripcionInput = document.getElementById("descripcion");
//     const errorDescripcion = document.getElementById("errorDescripcion");
//     const descripcionValor = descripcionInput.value.trim();

//     const precioVentaInput = document.getElementById("precio_venta");
//     const errorPrecioVenta = document.getElementById("errorPrecioVenta");
//     const precioVentaValor = precioVentaInput.value.trim();

//     const precioCompraInput = document.getElementById("precio_compra");
//     const errorPrecioCompra = document.getElementById("errorPrecioCompra");
//     const precioCompraValor = precioCompraInput.value.trim();

//     const stockInput = document.getElementById("stock");
//     const errorStock = document.getElementById("errorStock");
//     const stockValor = stockInput.value.trim();

//     const stockMinimoInput = document.getElementById("stock_minimo");
//     const errorStockMinimo = document.getElementById("errorStockMinimo");
//     const stockMinimoValor = stockMinimoInput.value.trim();

//     const codigoBarrasInput = document.getElementById("codigo_barras");
//     const errorCodigoBarras = document.getElementById("errorCodigoBarras");
//     const codigoBarrasValor = codigoBarrasInput.value.trim();

//     const idMarcaInput = document.getElementById("id_marca");
//     const errorIdMarca = document.getElementById("errorIdMarca");
//     const idMarcaValor = idMarcaInput.value.trim();

//     const idRubroInput = document.getElementById("id_rubro");
//     const errorIdRubro = document.getElementById("errorIdRubro");
//     const idRubroValor = idRubroInput.value.trim();

//     // Función para verificar si un valor contiene solo letras
//     const contieneSoloLetras = (valor) => /^[A-Za-z]+$/.test(valor);

//     // Función para verificar si un valor es un número
//     const esNumero = (valor) => !isNaN(parseFloat(valor)) && isFinite(valor);

//     // Validación para el campo de nombre
//     if (nombreValor === "") {
//         errorNombre.textContent = "El nombre es obligatorio.";
//         return false; // Detener el envío del formulario
//     } else if (!contieneSoloLetras(nombreValor)) {
//         errorNombre.textContent = "El nombre debe contener solo letras.";
//         return false; // Detener el envío del formulario
//     } else {
//         errorNombre.textContent = ""; // Limpiar el mensaje de error si la validación es exitosa
//     }

//     // Validación para el campo de descripción (similar al ejemplo anterior)
//     // ...

//     // Validación para el campo de precio de venta
//     if (precioVentaValor === "") {
//         errorPrecioVenta.textContent = "El precio de venta es obligatorio.";
//         return false;
//     } else if (!esNumero(precioVentaValor) || parseFloat(precioVentaValor) <= 0) {
//         errorPrecioVenta.textContent = "El precio de venta debe ser un número mayor que cero.";
//         return false;
//     } else {
//         errorPrecioVenta.textContent = "";
//     }

//     // Puedes seguir agregando validaciones similares para los demás campos...

//     // Si pasa todas las validaciones, se envía el formulario
//     return true;
// }



function validarFormulario() {
    const descripcionInput = document.getElementById("descripcion");
    const errorDescripcion = document.getElementById("errorDescripcion");
    const descripcionValor = descripcionInput.value.trim();

    // Verificar si la descripción está vacía
    if (descripcionValor === "") {
        errorDescripcion.textContent = "La descripción es obligatoria.";
        return false; // Detener el envío del formulario
    }

    // Verificar si la descripción contiene solo letras
    const letras = /^[A-Za-z]+$/;
    if (!letras.test(descripcionValor)) {
        errorDescripcion.textContent = "La descripción debe contener solo letras.";
        return false; // Detener el envío del formulario
    }

    const nombreInput = document.getElementById("nombre");
    const errorNombre = document.getElementById("errorNombre");
    const nombreValor = nombreInput.value.trim();

    // Función para verificar si un valor contiene solo letras
    const contieneSoloLetras = (valor) => /^[A-Za-z]+$/.test(valor);

    // Validación para el campo de nombre
    if (nombreValor === "") {
        errorNombre.textContent = "El nombre es obligatorio.";
        return false; // Detener el envío del formulario
    } else if (!contieneSoloLetras(nombreValor)) {
        errorNombre.textContent = "El nombre debe contener solo letras.";
        return false; // Detener el envío del formulario
    } else {
        errorNombre.textContent = ""; // Limpiar el mensaje de error si la validación es exitosa
    }

    // Si pasa todas las validaciones, se envía el formulario
    return true;
}

