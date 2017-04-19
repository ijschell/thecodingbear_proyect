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
  function saveDataPage($database, $title, $content, $contact){
		$url_base = 'http://localhost/thecodingbear_proyect';
    $return = 'Datos guardados';

    $database->insert("pages", [
    	"title" => $title,
    	"content" => $content,
    	"contact" => $contact
    ]);

		$max = $database->max("pages", "id");

		$database->update("pages", [
			"url" => $url_base.'/?page_'.$max
		],[
			"id" => $max
		]);

    return $return;
  }

	//get pages
	function loadDataPage($database){
		$datas = $database->select("pages", [
    	"title",
    	"content",
      "contact",
			"url"
    ]);
    return $datas;
  }

	//save menu
	function saveNewMenu($database, $name_menu, $position_menu, $url_menu){

		$return = 'Datos guardados';

		$database->insert("menu", [
    	"nombre" => $name_menu,
    	"position" => $position_menu,
    	"url" => $url_menu
    ]);

		return $return;

	}

}
$panelAdmin = new panelAdmin;


//save data settings
if(isset($_POST['save_settings'])){
  echo $panelAdmin->saveDataSetting($database, $_POST['title_setting'], $_POST['description_setting'], $_POST['keywords_setting']);
}

//save new page
if(isset($_POST['save_page'])){
  echo $panelAdmin->saveDataPage($database, $_POST['title_page'], $_POST['content_page'], $_POST['contact_page']);
}

//get pages
if(isset($_POST['get_page'])){
	$array = $panelAdmin->loadDataPage($database);
	echo '<select name="url">';
	foreach ($array as $key => $value) {
		echo '<option value="'.$value['url'].'">'.$value['title'].'</option>';
	}
	echo '</select>';
}

//save_menu
if(isset($_POST['save_menu'])){
  echo $panelAdmin->saveNewMenu($database, $_POST['name_menu'], $_POST['position_menu'], $_POST['url_menu']);
}
?>
