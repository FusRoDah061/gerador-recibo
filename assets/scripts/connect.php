<?php
  require_once __DIR__."/../../setup.php";

  //CONECTA NO BANCO DE DADOS//

  //Informação do servidor
  $BD_Server = $_ENV['DB_HOST'];
  $BD_User = $_ENV['DB_USER'];
  $BD_Password = $_ENV['DB_PASSWORD'];
  $BD_Database = $_ENV['DB_NAME'];
  $BD_Connection_url = $_ENV['JAWSDB_URL'];

  //Tabela
  $BD_Users_table = "usuarios";
  $BD_Profiles_table = "user_profiles";
  $BD_Recibos_table = "recibos";

  //Campos usuário
  $BD_Id_field = "id";//PK
  $BD_Name_field = "username";
  $BD_Email_field = "user_email";
  $BD_Password_field = "user_password";
  $BD_Email_hash_field = "email_hash";
  $BD_Email_verified_field = "email_verified";
  $BD_Acc_code_field = "acc_code";
  $BD_User_id_field = "user_id";
  $BD_User_token_field = "user_token";

  //Campos Perfis
  $BD_Profile_id_field = "profile_id";//PK
  $BD_Profile_user_id_field = "user_id";//FK
  $BD_Profile_name_field = "profile_name";
  $BD_Locador_field = "locador";
  $BD_Locatario_field = "locatario";
  $BD_Inicio_contrato_field = "inicio_contrato";
  $BD_Termino_contrato_field = "termino_contrato";
  $BD_Aluguel_valor_field = "valor_aluguel";
  $BD_Rua_field = "rua";
  $BD_Numero_casa_field = "numero_casa";
  $BD_Bairro_field = "bairro";
  $BD_Cidade_field = "cidade";
  $BD_Casa_fundo_field = "casa_fundo";
  $BD_Referente_from_field = "referente_from";
  $BD_Referente_to_field = "referente_to";
  $BD_Data_recibo_field = "data_recibo";

  //Campos Recibos
  $BD_Recibo_id_field = "recibo_id";//PK
  $BD_Recibo_profile_id_field = "profile_id";//FK
  $BD_Recibo_Referente_from_field = "referente_from";
  $BD_Recibo_Referente_to_field = "referente_to";
  $BD_Recibo_Data_recibo_field = "data_recibo";
  $BD_Recibo_temporario_field = "temporario";

  if (!empty($BD_Connection_url)) {
    // Extrai os campos da connection string
    $BD_Database = substr($BD_Connection_url, strpos($BD_Connection_url, '/', 9) + 1);
    $BD_Server = substr($BD_Connection_url, strpos($BD_Connection_url, '@') + 1, strlen($BD_Connection_url) - (strpos($BD_Connection_url, '@') + 1) - (strlen($BD_Database) + 1));
    $BD_User = substr($BD_Connection_url, strpos($BD_Connection_url, '//') + 2, strpos($BD_Connection_url, ':', 9) - (strpos($BD_Connection_url, '//') + 2));
    $BD_Password = substr($BD_Connection_url, strpos($BD_Connection_url, ':', 9) + 1, strpos($BD_Connection_url, '@', 9) - (strpos($BD_Connection_url, ':', 9) + 1));
  }

  $BD_Connection = mysqli_connect($BD_Server, $BD_User, $BD_Password);

  mysqli_select_db($BD_Connection, $BD_Database);

  mysqli_set_charset($BD_Connection,"utf8");

  require_once "database_helper.class.php"

?>
