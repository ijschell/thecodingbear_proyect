$(document).on('submit', '#saveDataSetting', function(e){
  e.preventDefault();
  loaderSave('#resultSaveSetings');
  var data = getUrlVars('?'+$(this).serialize());
  $.ajax({
    url: '../functions.php',
    method: 'POST',
    data:{
      save_settings: data['save_settings'],
      title_setting: data['title_setting'],
      description_setting: data['description_setting'],
      keywords_setting: data['keywords_setting']
    },
    success: function(result){
      $('#resultSaveSetings').html(result);
    }
  })
})

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
