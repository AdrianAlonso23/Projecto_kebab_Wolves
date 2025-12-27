// Clase Usuario
class Usuario {
    constructor(USUARIO_ID, NOMBRE, CORREO, TELEFONO, ROL) {
        this.USUARIO_ID = USUARIO_ID;
        this.NOMBRE = NOMBRE;
        this.CORREO = CORREO;
        this.TELEFONO = TELEFONO;
        this.ROL = ROL;
    }
}

// Variables globales
let usuariosGlobal = [];
let modalEditarUsuario;

// Inicialización al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    // Inicializar el modal de Bootstrap
    modalEditarUsuario = new bootstrap.Modal(document.getElementById('modalEditarUsuario'));
    
    // Cargar usuarios
    cargarUsuarios();

    // Botón guardar del modal
    document.getElementById('guardarUsuarioBtn').addEventListener('click', guardarEdicion);
});

// Cargar usuarios desde la API
function cargarUsuarios() {
    fetch('?controller=Api&action=getUsuarios')
        .then(res => res.json())
        .then(data => {
            usuariosGlobal = data; // Guardamos globalmente para poder editar
            mostrarUsuarios(data);
        })
        .catch(err => console.error('Error al cargar usuarios:', err));
}

// Mostrar usuarios en pantalla
function mostrarUsuarios(usuarios) {
    const lista = document.getElementById('listaUsuarios');
    lista.innerHTML = '';

    usuarios.forEach(u => {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex align-items-center';

        li.innerHTML = `
            <div class="d-flex gap-4">
                <span>${u.NOMBRE}</span>
                <span>${u.CORREO}</span>
                <span>${u.TELEFONO}</span>
                <span>${u.ROL}</span>
                <button class="btn btn-warning btn-sm me-2" onclick="abrirModal(${u.USUARIO_ID})">Editar</button>
                <button class="btn btn-danger btn-sm" onclick="eliminarUsuario(${u.USUARIO_ID})">Eliminar</button>
            </div>
        `;

        lista.appendChild(li);
    });
}


// Abrir modal de edición
function abrirModal(id) {
    const usuario = usuariosGlobal.find(u => u.USUARIO_ID == id);
    if (!usuario) return;

    document.getElementById('editId').value = usuario.USUARIO_ID;
    document.getElementById('editNombre').value = usuario.NOMBRE;
    document.getElementById('editCorreo').value = usuario.CORREO;
    document.getElementById('editContrasena').value = usuario.CONTRASENA;
    document.getElementById('editTelefono').value = usuario.TELEFONO;
    document.getElementById('editRol').value = usuario.ROL;

    modalEditarUsuario.show();
}

// Guardar cambios de edición (PUT)
function guardarEdicion() {
    const usuario = {
        USUARIO_ID: parseInt(document.getElementById('editId').value),
        NOMBRE: document.getElementById('editNombre').value,
        CORREO: document.getElementById('editCorreo').value,
        CONTRASENA: document.getElementById('editContrasena').value,
        TELEFONO: document.getElementById('editTelefono').value,
        ROL: document.getElementById('editRol').value
    };

    fetch('http://localhost/ejemplos/Proyecto_kebab/index.php?controller=Api&action=updateUsuario', {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json; charset=UTF-8' },
        body: JSON.stringify(usuario)
    })
    .then(res => res.json())
    .then(resp => {
        if (resp.success) {
            modalEditarUsuario.hide();
            cargarUsuarios();
            alert('Usuario actualizado correctamente');
        } else {
            alert(resp.error || 'Error al actualizar usuario');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Error al actualizar');
    });
}
// Crear Usuario 



// Eliminar usuario (DELETE)
function eliminarUsuario(id) {
    if (!confirm('¿Seguro que quieres eliminar este usuario?')) return;

    fetch(`?controller=Api&action=deleteUsuario&id=${id}`, {
        method: 'DELETE'
    })
    .then(res => res.json())
    .then(resp => {
        if (resp.success) {
            alert('Usuario eliminado');
            cargarUsuarios();
        } else {
            alert(resp.error || 'Error al eliminar usuario');
        }
    });
}

// Cancelar edición
function cancelarEdicion() {
    modalEditarUsuario.hide();
}
