/****fetch api de categorias *****/
    document.addEventListener("DOMContentLoaded", fetchCategorias);

    function fetchCategorias() {
        fetch('?controller=Api&action=getCategorias')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            const lista = document.getElementById('listaCategorias');
            lista.innerHTML = ""; 
            data.forEach(cat => {
                const li = document.createElement('li');
                li.textContent = cat.NOMBRE_CATEGORIA;
                lista.appendChild(li);
            });
        })
    };