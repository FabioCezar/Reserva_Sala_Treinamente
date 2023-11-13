<?php
$conn = mysqli_connect("localhost", "root", "", "sistema_agendamento");

if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the agendamento
    $sql = "DELETE FROM agendamentos WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: listar_agenda_rh.php?mensagem=excluido"); // Redirecionar com mensagem
    } else {
        echo "Erro ao excluir o agendamento: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
