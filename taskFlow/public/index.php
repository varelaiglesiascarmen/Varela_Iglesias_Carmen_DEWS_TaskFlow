<?php
require_once 'functions.php';
?>

<?php
define('SITE_NAME', 'Viaje en bici');
$pageTitle = SITE_NAME . ' - Viaje en bici';
$userName = 'Carmen';
$userAge = 26;
$isPremiumUser = true;

$tasks = [
    ['title' => 'Aprender PHP', 'completed' => true, 'priority' => 'alta'],
    ['title' => 'Hacer tareas de Luis', 'completed' => false, 'priority' => 'media'],
    ['title' => 'Ver documental de Mari Carmen', 'completed' => false, 'priority' => 'baja'],
    ['title' => 'Terminar logo del TFG', 'completed' => true, 'priority' => 'media'],
    ['title' => 'Llamar a mi madre', 'completed' => true, 'priority' => 'alta'],
];

?>
<!-- Llamar al header.php -->
<?php include '../app/views/header.php'; ?>

<main>
    <h2>Perfil de usuario</h2>
    <p><strong>Nombre:</strong> <?php echo $userName; ?></p>
    <p><strong>Edad:</strong> <?php echo $userAge; ?></p>
    <p><strong>Estado de la cuenta:</strong>Usuario<?php echo $isPremiumUser ? ' Premium' : ' Estándar'; ?></p>

    <h3>Lista de tareas</h3>
    <ul>
        <?php
        // llamar a la function renderizarTarea
        foreach ($tasks as $task) {
            echo renderizarTarea($task);
        }
        ?>
    </ul>

</main>

<!-- Llamar al footer.php -->
<?php include '../app/views/footer.php'; ?>