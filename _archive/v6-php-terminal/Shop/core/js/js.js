$(function() {
  M.AutoInit();
  showSection();
  $(document).on("scroll", showSection);
});

function showSection() {
  var pageTop = $(document).scrollTop()
  var pageBottom = pageTop + $(window).height()
  var tags = $("section")
  for (var i = 0; i < tags.length; i++) {
    var tag = tags[i]
    if ($(tag).position().top < pageBottom) {
      $(tag).addClass("visible")
    } else {
      $(tag).removeClass("visible")
    }
  }
}

function sendForm() {
  let email_name = $("#email_name").val()+' '+$("#email_first").val();
  let email_address = $("#email_address").val();
  let email_message = $("#email_objet").val()+' '+email_address+' '+$("#email_message").val();
  $.ajax({
    url: "../Site/api.php?action=mail&name="+email_name+"&address="+email_address+"&message="+email_message,
    success: function (data, text) {
      $('#responseApi').html("Votre message a bien été reçu ! Je reviens vers vous dès que possible, à bientôt !")
    },
    error: function (request, status, error) {
      alert("Oups, une erreur s'est produite lors de votre prise de contact. Veuillez retenter d'ici quelques instants")
    }
  });
}
