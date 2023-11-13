<?php
// Include("../includes/connect.php");
//     session_name('CEOSSSID');
//     session_start();

//     if(isset($_SESSION['email']))
//     {
//         $query="select * from tb_usuario where email='".$_SESSION['email']."'";
//         $result=mysqli_query($con,$query);
//         $resultado = mysqli_fetch_assoc($result);
//         $r_resultado = $resultado;

//         $usuario = $_SESSION['nomeUser'];
//         $usrNivel = $_SESSION['nivelUser'];
//         $empresa = $_SESSION['empresa'];
//         $prg='0001';

//         $log = "INSERT INTO tb_logprg (usuario,prg) VALUES ('$usuario','$prg' )";
//         $rlog = mysqli_query($con, $log);

//         $q_e="select * from tb_empresas where id='".$_SESSION['empresa']."' and status = 'Ativo'";
//         $r_e=mysqli_query($con,$q_e);
//         $rs_e = mysqli_fetch_assoc($r_e);

//         $_SESSION['nomeEmp'] = $rs_e['empresa'];

     
//     //$nomEmp=$rs_e['empresa'];

//     }
//     else
//     {
//         header("location:../login.php");
//     }

//     $vendedor = $resultado['email'];

   

//     $hoje = date('d/m/Y');


//     $consulta_versao="select * from tb_setting";
//     $resultado_versao= mysqli_query($con,$consulta_versao);
//     $r_versao = mysqli_fetch_assoc($resultado_versao);

//     $consulta_empresa="SELECT * 
//                       from tb_empresas
//                       Where status = 'Ativo' ";
//     $resultado_empresa= mysqli_query($con,$consulta_empresa);


//     $consulta_tUser="SELECT * 
//                       from tb_usuario_tipo
//                       Where status = 'Ativo'
//                       and nivel <> '999' ";
//     $resultado_tUser= mysqli_query($con,$consulta_tUser);

//     $consulta_usr="SELECT count(id) as id
//                       from tb_usuario
//                       where status = 'Ativo'
//                       and nivel <> '999'";
//     $resultado_usr= mysqli_query($con,$consulta_usr);
//     $r_usr = mysqli_fetch_assoc($resultado_usr);
    
// ?>

<!DOCTYPE html>
<html>
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

   <style>
      .success-message {
         background-color: #c3e6cb;
         color: #155724;
         padding: 10px;
         margin-bottom: 10px;
         border-radius: 4px;
      }

      .error-message {
         background-color: #f8d7da;
         color: #721c24;
         padding: 10px;
         margin-bottom: 10px;
         border-radius: 4px;
      }

        #agendamento-form {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
   }
   </style>
</head>
<body class="sb-nav-fixed">

         <nav class="navbar bg-light fixed-top" style="background-color: #844fc1;">
         <div class="container-fluid">
            <a class="navbar-brand" href="listar_agenda.php">Ver Agendamentos</a>
         </div>
         </nav>      
         <br><br><br>

      <div class="form-row">
         <div class="container">
            <h3 style="text-align: center">Agendamento da Sala de Treinamento</h3>  
                    

   <form id="agendamento-form">
   <div class="col-sm-4 col-md-5">
      <label for="sala">Sala:</label>
      <select class="form-control" id="sala" name="sala">
         <option value="1">Sala Treinamento</option>
         <option value="2">Sala Reunião</option>
         <!-- <option value="3">Sala 3</option> -->
      </select>
   </div>
   <br>
   <div class="col-sm-4 col-md-5">
      <label for="data">Data:</label>
      <input type="date" class="form-control" id="data" name="data">
   </div>
   <br>
   <div class="col-sm-4 col-md-5">
      <label for="horario_inicio">Horário de Início:</label>
      <input type="time" class="form-control" id="horario_inicio" name="horario_inicio">
   </div>
   <br>
   <div class="col-sm-4 col-md-5">
      <label for="horario_fim">Horário de Término:</label>
      <input type="time" class="form-control" id="horario_fim" name="horario_fim">
   </div>
   <br>
   <div class="col-sm-4 col-md-5">
      <label for="setor">Setor:</label>      
       <select id="tipo" name="setor">            
         <option value="#">Selecione o setor</option> 
         <option value="RH">RH</option>        
         <option value="Administrativo">Administrativo</option>
         <option value="Cobrança">Cobrança</option>
         <option value="Comercial">Comercial</option>
         <option value="Diretoria">Diretoria</option>
         <option value="Financeiro">Financeiro</option>
         <option value="Jurídico">Jurídico</option>
         <option value="TI">TI</option>
         
      </select>
   </div>
   <br>
   <div class="col-sm-4 col-md-5">
      <label for="tipo">Descrição:</label>
      <select id="tipo" name="tipo">            
         <option value="Treinamento">Treinamento</option>
         <option value="Reunião">Reunião</option>
         <option value="Seleção">Seleção</option>
         <option value="Evento">Evento</option>
      </select>
   </div>
   <br>
   <div class="col-sm-4 col-md-5">
      <label for="usuario">Usuário:</label>
      <input type="text" class="form-control" id="usuario" name="usuario">
   </div>
   <br>
   <button type="submit" class="btn btn-primary">Agendar</button>
</form>


            <!-- Modal -->
            <div class="modal fade" id="agendamento-modal" tabindex="-1" role="dialog" aria-labelledby="agendamento-modal-label" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="agendamento-modal-label">Agendamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div id="modal-message"></div>
                     </div>
                     <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal" id="fechar-modal">Fechar</button> <!--Clicar no botão fechar Modal (id="fechar-modal")-->
                     </div>
                  </div>
               </div>
            </div>
   </div>

   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <script>
      $(document).ready(function() {
         $('#agendamento-form').submit(function(event) {
            event.preventDefault();

            // Enviar o formulário usando AJAX
            var formData = $(this).serialize();

            $.ajax({
               type: 'POST',
               url: 'agendar.php',
               data: formData,
               dataType: 'json',
               success: function(response) {
                  if (response.success) {
                     $('#modal-message').html('<div class="alert alert-success success-message">' +
                        response.message +
                        '</div>');
                     $('#agendamento-form')[0].reset(); // Limpar o formulário
                  } else {
                     $('#modal-message').html('<div class="alert alert-danger error-message">' +
                        response.message +
                        '</div>');
                  }

                  $('#agendamento-modal').modal('show'); // Exibir o modal
               },
               error: function(xhr, status, error) {
                  console.log(xhr.responseText);
               }
            });
         });
      });
   </script>

    <!--Clicar no botão fechar Modal -->
   <script>
      $(document).ready(function() {
         $('#fechar-modal').click(function() {
            $('#agendamento-modal').modal('hide'); // Ocultar o modal
         });
      });
   </script>
   <!-- Fim Clicar no botão fechar Modal-->

<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright Grupo EA &copy; 2023 : Equipe Tecnologia <?php ?></div><!--echo $r_versao['versao'];-->
                        </div>
                    </div>
                </footer>
                       
</body>
</html>
