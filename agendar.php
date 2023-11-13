<?php
// Conectar ao banco de dados
$conn = mysqli_connect("localhost", "root", "", "sistema_agendamento");

// Verificar a conexão
if (!$conn) {
   die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Obter os dados do formulário
$sala = $_POST['sala'];
$data = $_POST['data'];
$horario_inicio = $_POST['horario_inicio'];
$horario_fim = $_POST['horario_fim'];
$setor = $_POST['setor'];
$tipo = $_POST['tipo'];
$usuario = $_POST['usuario'];

// Verificar se a data já passou
$currentDate = date("Y-m-d");
if ($data < $currentDate) {
   $response = array(
      'success' => false,
      'message' => 'A data selecionada já passou.'
   );
   // Enviar a resposta como JSON
   header('Content-Type: application/json');
   echo json_encode($response);
   exit; // Encerrar o script
}

// Verificar se o horário já está agendado para a sala selecionada
$sql = "SELECT id FROM agendamentos WHERE sala_id = '$sala' AND data = '$data' AND
        (horario_inicio <= '$horario_fim' AND horario_fim >= '$horario_inicio')";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
   $response = array(
      'success' => false,
      'message' => 'Este horário já está agendado para a sala selecionada.'
   );
} else {
   // Inserir o agendamento no banco de dados
   $sql = "INSERT INTO agendamentos (sala_id, data, horario_inicio, horario_fim, setor, tipo, usuario)
           VALUES ('$sala', '$data', '$horario_inicio', '$horario_fim', '$setor', '$tipo', '$usuario' )";

   if (mysqli_query($conn, $sql)) {
      $response = array(
         'success' => true,
         'message' => 'Agendamento realizado com sucesso!'
      );
   } else {
      $response = array(
         'success' => false,
         'message' => 'Erro ao agendar: ' . mysqli_error($conn)
      );
   }
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);

// Enviar a resposta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
