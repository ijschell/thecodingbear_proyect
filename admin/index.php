<?php
$function = require_once('../functions.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php
    $metas = $panelAdmin->selectDataSetting($database);
    ?>
    <title><?php echo $metas[0]['title'] ?></title>
    <meta name="description" content="<?php echo $metas[0]['description'] ?>">
    <meta name="keywords" content="<?php echo $metas[0]['keywords'] ?>">
    <meta name="author" content="Jonathan Schell">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/master.css">
  </head>
  <body>
    <h1>Admin Panel</h1>

    <div class="settings">
      <h2>Settings</h2>
      <div id="resultSaveSetings">
        <!-- Print result -->
      </div>
      <form id="saveDataSetting">
        title<br />
        <input type="text" name="title_setting" value=""><br />
        description<br />
        <input type="text" name="description_setting" value=""><br />
        keywords<br />
        <input type="text" name="keywords_setting" value=""><br />
        <input type="hidden" name="save_settings" value="true">
        <input type="submit" name="" value="guardar">
      </form>
      <hr>
    </div>

    <div class="pages">
      <h2>Pages</h2>
      <div id="resultSavePages">
        <!-- Print result -->
      </div>
      <form id="saveDataPages" action="">
        title<br/>
        <input type="text" name="title_page" value=""><br/>
        content<br/>
        <input type="text" name="content_page" value=""><br/>
        contact<br/>
        <input type="checkbox" name="contact_page" value="yes"><br/>
        <input type="hidden" name="url_page" value=""><br />
        <input type="hidden" name="save_page" value="true"><br />
        <input type="submit" name="" value="Guardar">
      </form>
      <hr>
    </div>

    <div class="menu">
      <h2>Menu</h2>
      <div id="resultSaveMenu">

      </div>
      <form id="saveMenu">
        nombre<br/>
        <input type="text" name="nombre" value=""><br/>
        posición<br/>
        <input type="text" name="position" value=""><br/>
        url (solo si es un enlace externo)<br/>
        <input type="text" name="url" value=""><br/>
        <!-- pages -->
        linkear directamente a una página
        <div id="selectPagesForm">
          <!-- load options pages -->
        </div>
        <input type="hidden" name="save_menu" value="true">
        <input type="submit" name="" value="Guardar">
      </form>

    </div>

    <script src="../libs/jquery-3.2.1.min.js" charset="utf-8"></script>
    <script src="./js/script.js" charset="utf-8"></script>
  </body>
</html>
