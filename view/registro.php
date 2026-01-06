    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <section class="fondo-registro">
            <div class="titulo-registro">
                <h1>Registro</h1>
            </div>
            <div class="login-container">
                <form class="form-registro" method="POST" action="?controller=Registro&action=registrar">
                    <div class="flex-column">
                        <label>Nombre Usuario:</label></div>
                        <div class="inputForm">
                            <svg viewBox="3 0 22 26" xmlns="http://www.w3.org/2000/svg" width="30px" fill="#fff" stroke="#fff" stroke-width="0.00024000000000000003"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M12 1.2A4.8 4.8 0 1 0 16.8 6 4.805 4.805 0 0 0 12 1.2zm0 8.6A3.8 3.8 0 1 1 15.8 6 3.804 3.804 0 0 1 12 9.8zM20 22H4v-4.5A5.506 5.506 0 0 1 9.5 12h5a5.506 5.506 0 0 1 5.5 5.5zM5 21h14v-3.5a4.505 4.505 0 0 0-4.5-4.5h-5A4.505 4.505 0 0 0 5 17.5z"></path></svg>
                            <input placeholder="Nombre de usuario" name="USUARIO" class="input-registro" type="text" required>
                        </div>
                        <div class="flex-column">
                        <label>Correo:</label></div>
                        <div class="inputForm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30px"  fill="#fff" viewBox="0 0 32 32" height="20"><g data-name="Layer 3" id="Layer_3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
                            <input placeholder="Inserta un correo" name= "CORREO" class="input-registro" type="text" required>
                        </div>
                        
                        <div class="flex-column">
                        <label>Contraseña:</label></div>
                        <div class="inputForm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30px"  fill="#fff" viewBox="-64 0 512 512" height="20"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
                            <input placeholder="Contraseña" name="CONTRASENA" class="input-registro" type="password" required>
                        </div>
                        
                        <div class="flex-column">
                        <label>Telefono:</label></div>
                        <div class="inputForm">
                            <svg viewBox="0 0 25 28" xmlns="http://www.w3.org/2000/svg" width="30px" fill="#fff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M2.725 2.24a4.385 4.385 0 0 0-1.486 4.15 22.028 22.028 0 0 0 5.833 10.537A22.028 22.028 0 0 0 17.61 22.76a3.44 3.44 0 0 0 .851.108 4.804 4.804 0 0 0 3.3-1.594 2.623 2.623 0 0 0 .914-1.686l.316-2.295a1.055 1.055 0 0 0-.766-1.162l-4.468-1.225a1.055 1.055 0 0 0-1.14.409l-1.174 1.661a.626.626 0 0 1-.733.21 15.491 15.491 0 0 1-4.546-3.35 15.491 15.491 0 0 1-3.35-4.546.626.626 0 0 1 .21-.733L8.77 7.384a1.055 1.055 0 0 0 .41-1.141L7.952 1.776A1.054 1.054 0 0 0 6.79 1.01l-2.38.316a2.623 2.623 0 0 0-1.686.914zm.78.633a1.616 1.616 0 0 1 1.074-.56L6.936 2a.056.056 0 0 1 .052.04l1.226 4.468a.093.093 0 0 1-.002.046l-1.783 1.2a1.63 1.63 0 0 0-.548 1.902 16.158 16.158 0 0 0 3.575 4.888 16.158 16.158 0 0 0 4.888 3.575 1.62 1.62 0 0 0 .595.112 1.642 1.642 0 0 0 1.32-.677l1.173-1.662a.053.053 0 0 1 .047-.022l.013.001 4.467 1.226a.055.055 0 0 1 .04.06l-.311 2.261a1.618 1.618 0 0 1-.561 1.077l-.074.073a3.907 3.907 0 0 1-2.593 1.3 2.453 2.453 0 0 1-.604-.076 21.004 21.004 0 0 1-10.08-5.575A20.996 20.996 0 0 1 2.208 6.144a3.476 3.476 0 0 1 1.224-3.197z"></path></svg>        
                            <input placeholder="+34 654 589 045" name="TELEFONO"class="input-registro" type="tel">
                        </div>
                        <div class="flex-row">
                        <div>                    
                        </div></div>
                        <button class="button-submit">Sign Up</button>
                        <p class="p">Have an account?<a href="?controller=Login&action=index"><span class="span">v bSign in</span></a>
                    </div>
                </form>
            </div>
        </section>
    </body>
    </html>