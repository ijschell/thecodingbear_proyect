<?php
namespace Medoo;
use PDO;
require_once 'medoo.php';

//error_reporting(0);

//connect
$database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'thecodingbear_proyect',
	'server' => 'localhost',
	'username' => 'thecodingbear_user',
	'password' => 'YK5QsGztB53sCREX',
	'charset' => 'utf8'

]);

//Admin section
//select
class panelAdmin {

  //save settings
  function saveDataSetting($database, $title, $description, $keywords){

    $return = '';

    if($title != ''){
      $database->update("setting", [
        "title" => $title
      ]);
      $return = $return . ' Título guardado.';
    }

    if($description != ''){
      $database->update("setting", [
        "description" => $description
      ]);
      $return = $return . ' Descripción guardada.';
    }

    if($keywords != ''){
      $database->update("setting", [
        "keywords" => $keywords
      ]);
      $return = $return . ' Keywords guardados.';
    }

    return $return;

  }

  //select settings
  function selectDataSetting($database){
    $datas = $database->select("setting", [
    	"title",
    	"description",
      "keywords"
    ]);
    return $datas;
  }

  //save Pages (new page)
  function saveDataPage($database, $title, $content, $contact, $url){
    $return = 'Datos guardados';
    $database->insert("pages", [
    	"title" => $title,
    	"content" => $content,
    	"contact" => $contact,
      "url" => $url
    ]);
    return $return;
  }

}
$panelAdmin = new panelAdmin;


//save data settings
if(isset($_POST['save_settings'])){
  echo $panelAdmin->saveDataSetting($database, $_POST['title_setting'], $_POST['description_setting'], $_POST['keywords_setting']);
}
?>
