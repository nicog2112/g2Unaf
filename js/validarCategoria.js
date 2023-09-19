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
    
    // Si pasa todas las validaciones, se envía el formulario
    return true;
}

