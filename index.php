<?php 

     include 'connect.php';

     if(isset($_POST['enviar'])){
          $nome=$_POST['nome'];
          $email=$_POST['email'];
          $telefone=$_POST['telefone'];
          $data=$_POST['data'];
          
          $sql="insert into `users` (nome,email,telefone,data)
          values('$nome','$email','$telefone','$data')";
          $result=mysqli_query($con,$sql);

          if($result){
               // echo "Banco de dados conectado";
               header('Location: display.php');
          } else{
               die(mysqli_error($con));
          }
     }
?>

<!doctype html>
<html lang="pt-br">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
     <title>Cadastro</title>
</head>
<img src="./img/world-skills.png" height="150px">
<body>
     <div class="container my-5">
          <form method="post">
               <h2>
                    Registre os dados do competidor:
               </h2>
               <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" placeholder="Insira seu nome" name="nome" autocomplete="off">
               </div>
               <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" class="form-control" placeholder="Insira seu e-mail" name="email" autocomplete="off">
               </div>
               <div class="form-group">
                    <label>Telefone</label>
                    <input type="number" class="form-control" placeholder="Insira seu telefone" name="telefone" autocomplete="off">
               </div>
               <div class="form-group">
                    <label>Data de Nascimento</label>
                    <input type="date" class="form-control" placeholder="Insira sua data de nascimento" name="data" autocomplete="off">
               </div>
               <button type="submit" class="btn btn-primary" name="enviar">REGISTRAR</button>
          </form>
     </div>
     <style>
           @import url('https://fonts.googleapis.com/css2?family=Poppins%3Awght%40100%3B200%3B300%3B400&display=swap%27%29%3B');
           h2 {
               font-family: 'Poppins';
               font-size: 30px;
               font-weight: bold;
               text-align: center;
               margin-top: 5%;
          }
           img {
               height:150px;
               margin-top: 2%;
               margin-left: 4%;
          }
     </style>
     <script>

     </script>
</body>
</html>