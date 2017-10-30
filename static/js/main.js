$(document).ready(function() {
  $('#link-btn').on('click', function(event) {
    event.preventDefault();
    $("#not-droids").toggleClass('show');
  });
});
