<?php 
// Usuário do banco oracle.
$oracle_usuario = "RHMETA"; 
//Senha do usuário no banco de dados.
$oracle_senha = "X3ba405f22b"; 


$oracle_bd = "(DESCRIPTION=
          (ADDRESS_LIST=
            (ADDRESS=(PROTOCOL=TCP) 
              (HOST=192.168.1.19)(PORT=1521)
            )
          )
          (CONNECT_DATA=(SERVICE_NAME=ORCL))
     )"; 

// Aqui, nós validamos se a conexão foi feita com sucesso ou não.
if (ora_conexao = OCILogon($oracle_usuario,$oracle_senha,$oracle_bd));   
  echo "Conexão com o banco Oracle foi feita com sucesso"; 
else														   
  echo "Erro na conexão com o Oracle.";					   
?>