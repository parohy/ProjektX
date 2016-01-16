// using default options
$(window).endlessScroll();
// using some custom options
$(document).endlessScroll({
  fireOnce: false,
  fireDelay: false,
  loader: '<div class="loading"><div>',
  callback: function(p){
    //alert("test");
  }
});