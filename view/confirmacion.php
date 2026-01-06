<div class="header">
    <h1>Kebabwolves.com</h1>
</div>

<div class="container">
    <h1>¡Pedido Confirmado!</h1>
    <p>Gracias <strong><?php echo htmlspecialchars($pedido['NOMBRE']); ?></strong> por tu compra. Tu pedido #<strong><?php echo $pedidoId; ?></strong> ha sido registrado con éxito.</p>
    
    <h2>Resumen del Pedido</h2>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lineas as $linea): ?>
                <tr>
                    <td><?php echo htmlspecialchars($linea['PRODUCTO_NOMBRE']); ?></td>
                    <td><?php echo $linea['CANTIDAD']; ?></td>
                    <td><?php echo number_format($linea['PRECIO_UNITARIO'],2); ?>€</td>
                    <td><?php echo number_format($linea['SUBTOTAL'],2); ?>€</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="total">
        Total a pagar (IVA incluido): <?php echo number_format($total,2); ?>€
    </div>

    <a href="index.php" class="btn-home">Volver al inicio</a>
</div>