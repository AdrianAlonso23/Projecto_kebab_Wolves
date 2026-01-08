<section class="section-perfil">
    <div class="div-perfil">
        <div class="titulo-perfil">
            <h2>Mi Perfil</h2> 
        </div>

        <div class="imagen-perfil mt-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10.5 8 10.5s4.757.726 5.468 1.87A7 7 0 0 0 8 1z"/>
            </svg>
        </div>

        <form class="form-perfil">
            <div class="mb-3">
                <label for="nombre" class="perfil-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" value="<?= htmlspecialchars($usuario->getNOMBRE()) ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" value="<?= htmlspecialchars($usuario->getCORREO()) ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" value="<?= htmlspecialchars($usuario->getCONTRASENA()) ?>" disabled>
            </div>
        </form>

        <h3 class="pedidos-perfil">Mis Pedidos</h3>
        <?php if(count($pedidos) > 0): ?>
            <table class="tabla-pedidos">
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Productos</th>
                    </tr>
                </thead>
                <tbody>
                    <tbody>
                        <tbody>
                            <?php foreach($pedidos as $pedido): ?>
                                <tr>
                                    <!-- ✅ Usamos getters del objeto -->
                                    <td><?= $pedido->getPEDIDO_ID() ?></td>
                                    <td><?= $pedido->getFECHA() ?></td>
                                    <td><?= $pedido->getTOTAL() ?></td>
                                    <td>
                                        <?php if(!empty($pedido->LINEAS)): ?>
                                            <?php foreach($pedido->LINEAS as $linea): ?>
                                                <?= htmlspecialchars($linea['nombre']) ?> x<?= $linea['cantidad'] ?><br>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </tbody>
                </tbody>
            </table>
        <?php else: ?>
            <p>No has realizado ningún pedido todavía.</p>
        <?php endif; ?>

        
        <form action="?controller=Login&action=logout" method="post" class="boton-perfil" >
            <button type="submit" class="btn btn-warning">Cerrar sesión</button>
        </form>

    </div>    
</section>
