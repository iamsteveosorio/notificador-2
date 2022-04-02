//== Class definition

var DatatableHtmlTableDemo = (function () {
  //== Private functions

  // demo initializer
  var demo = function () {
    var datatable = $(".m-datatable").mDatatable({
      data: {
        saveState: { cookie: false },
      },
      search: {
        input: $("#generalSearch"),
      },
      displayStart: 100,
    });
  };

  return {
    //== Public functions
    init: function () {
      // init dmeo
      demo();
    },
  };
})();

jQuery(document).ready(function () {
  DatatableHtmlTableDemo.init();
});
