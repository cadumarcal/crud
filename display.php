<?php 
     include 'connect.php';


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title></title>
     <link rel="stylesheet" href="estilo.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<img src="./img/world-skills.png">
     <h2>
          TELA DE REGISTRO DO COMPETIDOR
     </h2>
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
     <div class="container">
          <button class="btn btn-primary my-5"><a href="index.php" style="color:aliceblue">Adicionar</a>
          </button>
          <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Telefone</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
     <?php 

     $sql="Select * from `users`";
     $result=mysqli_query($con,$sql);
     if($result){
          while($row=mysqli_fetch_assoc($result)){
               $nome=$row['nome'];
               $email=$row['email'];
               $telefone=$row['telefone'];
               $data=$row['data'];
               echo '<tr>
               <th scope="row" class="name">'.$nome.'</th>
               <td>'.$email.'</td>
               <td>'.$telefone.'</td>
               <td>'.$data.'</td>
               <td>
               <button class="btn btn-primary"><a href="update.php?updatenome='.$nome.'" style="color:aliceblue">Editar</a></button>
               <button class="btn btn-danger "><a href="delete.php?deletenome='.$nome.'" style="color:aliceblue">Apagar</a></button>
               </td>
             </tr>';
          }
     }
     ?>
  </tbody>
</table>
     </div>
</body>
</html>