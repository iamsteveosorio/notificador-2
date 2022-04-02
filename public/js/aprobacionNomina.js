$('#aprobarNominaSave').click(function () {
  mApp.blockPage({
    overlayColor: '#000000',
    state: 'primary'
  });
  $('#aprobarNominaTable').not('.noSelect').find('input[type="checkbox"]:checked').each(function () {
    if(!$(this).hasClass('noSelect')){
      $.ajax({
        url: '/pagarNovedadNomina/'+$(this).attr("name"),
        type: 'post',
        success: function(){
        }
      });
    }
  });
  location.reload();
});
$('#noaprobarNominaSave').click(function () {
  mApp.blockPage({
    overlayColor: '#000000',
    state: 'primary'
  });
  $('#aprobarNominaTable').not('.noSelect').find('input[type="checkbox"]:checked').each(function () {
    if(!$(this).hasClass('noSelect')){
      $.ajax({
        url: '/nopagarNovedadNomina/'+$(this).attr("name"),
        type: 'post',
        success: function(){
        }
      });
    }
  });
  location.reload();
});

function selectAll(){
  var checked = false;
  $('#aprobarNominaTable').find('input[type="checkbox"]').each(function () {
    if($(this).hasClass('noSelect')){
      checked = this.checked;
    }else{
      this.checked = checked;
    }
  });

}