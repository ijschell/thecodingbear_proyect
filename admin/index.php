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
      
    </div>

    <script src="../libs/jquery-3.2.1.min.js" charset="utf-8"></script>
    <script src="./js/script.js" charset="utf-8"></script>
  </body>
</html>
