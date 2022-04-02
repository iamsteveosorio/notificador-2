function aprobarNovedad(id){
  $('#aprobarNovedad').attr('action','/pagarNovedad/'+id);
  $('#m_modal_1').modal();
}