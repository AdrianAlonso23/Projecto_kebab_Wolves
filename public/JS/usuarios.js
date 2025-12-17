 /****fetch api de usuarios *****/
    document.addEventListener("DOMContentLoaded", fetchUsuarios);

    function mostrarUsuarios(usuarios) {
        const container = document.getElementById('UsuariosContainer');
        container.innerHTML = '';

        usuarios.forEach(u => {
            const card = document.createElement('div');
            card.classList.add('card', 'text-dark');
            card.style.width = '18rem';

            card.innerHTML = `
                <div class="card-body">
                    <h4 class="card-title">Usuario ID: ${u.USUARIO_ID}</h4>
                    <h5 class="card-title">${u.NOMBRE}</h5>
                    <p class="card-text">
                        <strong>Email:</strong> ${u.CORREO}<br>
                        <strong>Rol:</strong> ${u.ROL}
                    </p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-warning btn-sm">Editar</button>
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </div>
                </div>
            `;

            container.appendChild(card);
        });
    };

    function fetchUsuarios() {
        fetch('?controller=Api&action=getUsuarios')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            mostrarUsuarios(data);
        })
    };