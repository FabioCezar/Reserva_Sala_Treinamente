<?php

   // Include("../includes/connect.php");
    //session_name('CEOSSSID');
    //session_start();

    // if(isset($_SESSION['email']))
    // {
    //     $query="select * from tb_usuario where email='".$_SESSION['email']."'";
    //     $result=mysqli_query($con,$query);
    //     $resultado = mysqli_fetch_assoc($result);
    //     $r_resultado = $resultado;

    //     $usuario = $_SESSION['nomeUser'];
    //     $usrNivel = $_SESSION['nivelUser'];
    //     $empresa = $_SESSION['empresa'];
    //     $prg='0001';

    //     $log = "INSERT INTO tb_logprg (usuario,prg) VALUES ('$usuario','$prg' )";
    //     $rlog = mysqli_query($con, $log);

    //     $q_e="select * from tb_empresas where id='".$_SESSION['empresa']."' and status = 'Ativo'";
    //     $r_e=mysqli_query($con,$q_e);
    //     $rs_e = mysqli_fetch_assoc($r_e);

    //     $_SESSION['nomeEmp'] = $rs_e['empresa'];

     
    // //$nomEmp=$rs_e['empresa'];

    // }
    // else
    // {
    //     header("location:../login.php");
    // }

    // $vendedor = $resultado['email'];

   

    // $hoje = date('d/m/Y');


    // $consulta_versao="select * from tb_setting";
    // $resultado_versao= mysqli_query($con,$consulta_versao);
    // $r_versao = mysqli_fetch_assoc($resultado_versao);

    // $consulta_empresa="SELECT * 
    //                   from tb_empresas
    //                   Where status = 'Ativo' ";
    // $resultado_empresa= mysqli_query($con,$consulta_empresa);


    // $consulta_tUser="SELECT * 
    //                   from tb_usuario_tipo
    //                   Where status = 'Ativo'
    //                   and nivel <> '999' ";
    // $resultado_tUser= mysqli_query($con,$consulta_tUser);

    // $consulta_usr="SELECT count(id) as id
    //                   from tb_usuario
    //                   where status = 'Ativo'
    //                   and nivel <> '999'";
    // $resultado_usr= mysqli_query($con,$consulta_usr);
    // $r_usr = mysqli_fetch_assoc($resultado_usr);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Agendamento Sala</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iconify/2.0.0/iconify.min.js" integrity="sha512-lYMiwcB608+RcqJmP93CMe7b4i9G9QK1RbixsNu4PzMRJMsqr/bUrkXUuFzCNsRUo3IXNUr5hz98lINURv5CNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <link rel="shortcut icon" href="./img/favicon-ea.png" type="image/x-icon">

</head>
<body class="sb-nav-fixed">
       
         <nav class="navbar bg-light fixed-top" style="background-color: #844fc1;">
         <div class="container-fluid">
            <a class="navbar-brand" href="sala.php">Agendar sala</a>
         </div>
         </nav>      
         <br><br>

   <div class="container">
   <h3 style="text-align: center">Listagem de Agendamentos</h3>

   <!-- Menssagem excluída com sucesso --> 
   <div class="container">
   <?php
    if (isset($_GET['mensagem']) && $_GET['mensagem'] === 'excluido') {
        echo '<div class="alert alert-success" role="alert">Registro excluído com sucesso.</div>';
    }
    ?>
    </div>
    <!-- Menssagem excluída com sucesso --> 
      

      <?php
         // Conectar ao banco de dados
         $conn = mysqli_connect("localhost", "root", "", "sistema_agendamento");

         // Verificar a conexão
         if (!$conn) {
            die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
         }

         // Consultar os agendamentos existentes
         $hoje = date('Y-m-d');
         $sql = "SELECT agendamentos.*, salas.nome AS sala_nome FROM agendamentos
                 INNER JOIN salas ON agendamentos.sala_id = salas.id
                 WHERE data >= '$hoje'
                 ORDER BY data, horario_inicio";
         $result = mysqli_query($conn, $sql);

         // Verificar se existem agendamentos
         if (mysqli_num_rows($result) > 0) {
            echo '<table id="agendamentos-table" class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>ID</th>';
            echo '<th>Sala</th>';
            echo '<th>Data</th>';
            echo '<th>Horário de Início</th>';
            echo '<th>Horário de Término</th>';
            echo '<th>Setor</th>';
            echo '<th>Descrição</th>';
            echo '<th>Usuário</th>';
            echo '<th>Ação</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
               echo '<tr>';
               echo '<td>' . $row['id'] . '</td>';
               echo '<td>' . $row['sala_nome'] . '</td>';
               echo '<td>' . date('d/m/Y', strtotime($row['data'])) . '</td>';
               echo '<td>' . $row['horario_inicio'] . '</td>';
               echo '<td>' . $row['horario_fim'] . '</td>';
               echo '<td>' . $row['setor'] . '</td>';
               echo '<td>' . $row['tipo'] . '</td>';
               echo '<td>' . $row['usuario'] . '</td>';
               echo '<td><a href="#" class="btn btn-danger delete-button" data-delete-url="excluir_agendamento.php?id=' . $row['id'] . '">Excluir</a></td>';
               echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
         } else {
            echo '<h3>Nenhum agendamento encontrado.</h3>';
         }

         // Fechar a conexão com o banco de dados
         mysqli_close($conn);
      ?>
   </div>

   <!-- Modal de Confirmação de Exclusão -->  
   <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja apagar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a id="confirmDeleteButton" href="#" class="btn btn-danger">Apagar</a>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- FIM Modal de Confirmação de Exclusão -->

  <!-- javascript Exclusão -->
 <script>
    $(document).ready(function() {
        // Controlar o clique no botão de exclusão
        $('.delete-button').on('click', function(event) {
            event.preventDefault();
            var deleteUrl = $(this).attr('data-delete-url');
            $('#confirmDeleteButton').attr('href', deleteUrl); // Atualizar URL do botão "Apagar"
            $('#confirmDeleteModal').modal('show'); // Exibir modal de confirmação
        });

        // Quando o modal for fechado, verificar se houve uma exclusão bem-sucedida
        $('#confirmDeleteModal').on('hidden.bs.modal', function() {
            if ($('#confirmDeleteModal').data('deleted')) {
                location.reload(); // Recarregar a página após a exclusão
            }
        });
    });
</script>
<!-- Fim javascript Exclusão -->

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
   <script>
      $(document).ready(function() {
         $('#agendamentos-table').DataTable({
            "language": {
               "sEmptyTable": "Nenhum registro encontrado",
               "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
               "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
               "sInfoFiltered": "(Filtrados de _MAX_ registros)",
               "sInfoPostFix": "",
               "sInfoThousands": ".",
               "sLengthMenu": "_MENU_ resultados por página",
               "sLoadingRecords": "Carregando...",
               "sProcessing": "Processando...",
               "sZeroRecords": "Nenhum registro encontrado",
               "sSearch": "Pesquisar",
               "oPaginate": {
                  "sNext": "Próximo",
                  "sPrevious": "Anterior",
                  "sFirst": "Primeiro",
                  "sLast": "Último"
               },
               "oAria": {
                  "sSortAscending": ": Ordenar colunas de forma ascendente",
                  "sSortDescending": ": Ordenar colunas de forma descendente"
               }
            }
         });
      });
   </script>  


<script>
    $(document).ready(function() {
        // Controlar o clique no botão de exclusão
        $('.delete-button').on('click', function(event) {
            event.preventDefault();
            var deleteUrl = $(this).attr('data-delete-url');
            $('#confirmDeleteButton').attr('href', deleteUrl); // Atualizar URL do botão "Apagar"
            $('#confirmDeleteModal').modal('show'); // Exibir modal de confirmação
        });

        // Quando o modal for fechado, verificar se houve uma exclusão bem-sucedida
        $('#confirmDeleteModal').on('hidden.bs.modal', function() {
            if ($('#confirmDeleteModal').data('deleted')) {
                location.reload(); // Recarregar a página após a exclusão
            }
        });
    });
</script>

 <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright Grupo EA &copy; 2023 : Equipe Tecnologia <?php ?></div> <!--echo $r_versao['versao'];-->
                        </div>
                    </div>
                </footer>
</body>
</html>
