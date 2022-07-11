function onMostrarMateriais(idetapa) {
    var materiais = document.querySelector(`#collapse${idetapa}`);

    if(materiais.style.height !== "0px" && materiais.style.height !== "" && materiais.style.height !== null) {
        materiais.style.height = '0'
        materiais.style.padding = '0'
    } else {
        materiais.style.height = 'auto'
        materiais.style.padding = '10px 0px 10px 10px'
    }
}