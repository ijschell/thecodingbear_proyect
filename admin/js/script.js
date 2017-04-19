$(document).on('submit', '#saveDataSetting', function(e){
  e.preventDefault();
  loaderSave('#resultSaveSetings');
  var data = getUrlVars('?'+$(this).serialize());
  settings.saveSettings(data['save_settings'], data['title_setting'], data['description_setting'], data['keywords_setting']);
})

$(document).on('submit', '#saveDataPages', function(e){
  e.preventDefault();
  loaderSave('#resultSavePages');
  var data = getUrlVars('?'+$(this).serialize());
  if($('#saveDataPages input[name="contact_page"]').is(":checked")){
    data['contact_page'] = 1;
  }else {
    data['contact_page'] = 0;
  }
  pages.savePages(data['save_page'], data['title_page'], data['content_page'], data['contact_page']);
})

$(document).on('submit', '#saveMenu', function(e){
  e.preventDefault();
  loaderSave('#resultSaveMenu');
  var data = getUrlVars('?'+$(this).serialize());
  menu.saveNewMenu(data['save_menu'], data['nombre'], data['position'], data['url']);
})

var settings = {

  saveSettings : function(save, title, description, keywords){
    $.ajax({
      url: '../functions.php',
      method: 'POST',
      data:{
        save_settings: save,
        title_setting: title,
        description_setting: description,
        keywords_setting: keywords
      },
      success: function(result){
        $('#resultSaveSetings').html(result);
      }
    })
  },

}

var pages = {

  savePages : function(save, title, content, contact, url){
    $.ajax({
      url: '../functions.php',
      method: 'POST',
      data:{
        save_page: save,
        title_page: title,
        content_page: content,
        contact_page: contact
      },
      success: function(result){
        $('#resultSavePages').html(result);
        pages.loadPagesSelect();
      }
    })
  },

  loadPagesSelect : function(){

    var get = true;

    $.ajax({
      url: '../functions.php',
      method: 'POST',
      data:{
        get_page: get
      },
      success: function(result){
        $('#selectPagesForm').html(result);
      }
    })

  }

}

var menu = {

  saveNewMenu : function(save, name, position, url){
    $.ajax({
      url: '../functions.php',
      method: 'POST',
      data:{
        save_menu: save,
        name_menu: name,
        position_menu: position,
        url_menu: url
      },
      success: function(result){
        $('#resultSaveMenu').html(result);
      }
    })
  }

}

function getUrlVars(string) {
  var vars = {};
  var parts = string.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
    vars[key] = value;
  });
  return vars;
}

function loaderSave(cont){
  $(cont).html('<img src="./images/loader.gif" />');
}

$(document).ready(function(){
  pages.loadPagesSelect();
})
