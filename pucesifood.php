<?php
// Verificar si se enviaron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados desde el formulario
    $subtotal = isset($_POST['subtotal']) ? floatval($_POST['subtotal']) : 0;
    $propinaCheck = isset($_POST['propinaCheck']);
    $propinaPersonalizada = isset($_POST['propinaPersonalizada']) ? floatval($_POST['propinaPersonalizada']) : 0;

    // Calcular el total
    if ($propinaCheck && $propinaPersonalizada > 0) {
        $total = $subtotal + $propinaPersonalizada;
    } else {
        $propinaAutomatica = $subtotal * 0.35;
        $total = $subtotal + $propinaAutomatica;
    }

    // Mostrar el total de la factura
    echo "<h1>Factura</h1>";
    echo "<p>Subtotal: $" . number_format($subtotal, 2) . "</p>";
    if ($propinaCheck && $propinaPersonalizada > 0) {
        echo "<p>Propina personalizada: $" . number_format($propinaPersonalizada, 2) . "</p>";
    } else {
        echo "<p>Propina automática (35%): $" . number_format($propinaAutomatica, 2) . "</p>";
    }
    echo "<p><strong>Total: $" . number_format($total, 2) . "</strong></p>";
} else {
    echo "<p>No se enviaron datos del formulario.</p>";
}
?>