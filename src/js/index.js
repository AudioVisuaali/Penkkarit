$(document).ready(function() {
  $("#forgot-user1,#forgot-user2").click(function(){
    myfunction()
    $("#reset-password").slideDown(250);
  });

  $("#create-user-interactivables1,#create-user-interactivables2").click(function(){
    myfunction()
    $("#create-account").slideDown(250);
  });

  $("#login-btn-interactivables1,#login-btn-interactivables2").click(function(){
    myfunction()
    $("#login-tab").slideDown(250);
  });

  function myfunction() {
    $("#create-account").slideUp(250);
    $("#reset-password").slideUp(250);
    $("#login-tab").slideUp(250);
  };

  $("#create-name").keyup(function () {

    if($(this).val().length <= 4) {
      $(this).addClass('is-invalid').removeClass('is-valid');
      $('#register-username-feedback').text('Käyttäjänimen pitää olla ainakin 4 merkkiä pitkä!');
      $("#register-username-feedback").removeClass('hidden').addClass('invalid-feedback');
    }
    else if ($(this).val().length > 32) {
      $(this).addClass('is-invalid').removeClass('is-valid');
      $('#register-username-feedback').text('Käyttäjänimi saa olla korkeintaan 32 merkkiä pitkä!');
      $("#register-username-feedback").removeClass('hidden').addClass('invalid-feedback');
    }
    else {
      $(this).addClass('is-valid').removeClass('is-invalid');
      $("#register-username-feedback").addClass('hidden').removeClass('valid-feedback, invalid-feedback');
    }
    create_button_checker()
  });

  $("#create-first-name").keyup(function () {

      if($(this).val().length <= 1) {
        $(this).addClass('is-invalid').removeClass('is-valid');
        $('#register-firstname-feedback').text('Etunimen pitää olla ainakin 1 merkkiä pitkä!');
        $("#register-firstname-feedback").removeClass('hidden').addClass('invalid-feedback');
      }
      else if ($(this).val().length > 32) {
        $(this).addClass('is-invalid').removeClass('is-valid');
        $('#register-firstname-feedback').text('Etunimi saa olla korkeintaan 32 merkkiä pitkä!');
        $("#register-firstname-feedback").removeClass('hidden').addClass('invalid-feedback');
      }
      else {
        $(this).addClass('is-valid').removeClass('is-invalid');
        $("#register-firstname-feedback").addClass('hidden').removeClass('valid-feedback, invalid-feedback');
      }
      create_button_checker()
    });

  $("#create-last-name").keyup(function () {

    if($(this).val().length <= 1) {
      $(this).addClass('is-invalid').removeClass('is-valid');
      $('#register-lastname-feedback').text('Käyttäjänimen pitää olla ainakin 1 merkkin pitkä!');
      $("#register-lastname-feedback").removeClass('hidden').addClass('invalid-feedback');
    }
    else if ($(this).val().length > 32) {
      $(this).addClass('is-invalid').removeClass('is-valid');
      $('#register-lastname-feedback').text('Etunimi saa olla korkeintaan 32 merkkiä pitkä!');
      $("#register-lastname-feedback").removeClass('hidden').addClass('invalid-feedback');
    }
    else {
      $(this).addClass('is-valid').removeClass('is-invalid');
      $("#register-lastname-feedback").addClass('hidden').removeClass('valid-feedback, invalid-feedback');
    }
    create_button_checker()
  });

  $("#create-password, #create-password-re").keyup(function() {
    var password = $('#create-password').val();
    if (password.length < 6) {
    $('#create-password').addClass('is-invalid').removeClass('is-valid');
    $('#register-password-feedback').text('Salasanan pitää olla ainakin 6 merkkiä pitkä!');
    $("#register-password-feedback").removeClass('hidden').addClass('invalid-feedback');
    }
    // atleast 1 small letter
    else if (!(password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))) {
      $('#create-password').addClass('is-invalid').removeClass('is-valid');
      $('#register-password-feedback').text('Salasanassa pitää ainakin olla yksi iso ja pieni merkki!');
      $("#register-password-feedback").removeClass('hidden').addClass('invalid-feedback');
    }
    // number
    else if (!(password.match(/([0-9])/))) {
      $('#create-password').addClass('is-invalid').removeClass('is-valid');
      $('#register-password-feedback').text('Salasanassa pitää olla ainakin yksi numero!');
      $("#register-password-feedback").removeClass('hidden').addClass('invalid-feedback');
    }
    // everything is firstname
    else {
      $('#create-password').addClass('is-valid').removeClass('is-invalid');
      $("#register-password-feedback").addClass('hidden').removeClass('valid-feedback, invalid-feedback');
    }

    var pass1 = $("#create-password")
    var pass2 = $("#create-password-re")
    if(pass2.val().length < 6) {
      $("#create-password-re").removeClass('is-valid').removeClass('is-invalid');
      $("#register-password-re-feedback").addClass('hidden')
    }
    else if (pass1.val() !== pass2.val()) {
      $("#create-password-re").addClass('is-invalid').removeClass('is-valid');
      $('#register-password-re-feedback').text('Salasanat eivät täsmää!');
      $("#register-password-re-feedback").removeClass('hidden').addClass('invalid-feedback');
    } else {
      $("#create-password-re").addClass('is-valid').removeClass('is-invalid');
      $("#register-password-re-feedback").addClass('hidden').removeClass('valid-feedback, invalid-feedback');
    }
    create_button_checker()
  });

  $("#create-email").keyup(function () {
    if($(this).val().length < 4) {
      $(this).removeClass('is-valid').removeClass('is-invalid');
      $("#register-email-feedback").addClass('hidden')
    }
    else if(!(validateEmail($(this).val()))) {
      $(this).addClass('is-invalid').removeClass('is-valid');
      $('#register-email-feedback').text('Viallinen sähköpostiosoite!');
      $("#register-email-feedback").removeClass('hidden').addClass('invalid-feedback');
    }
    else {
      $(this).addClass('is-valid').removeClass('is-invalid');
      $("#register-email-feedback").addClass('hidden').removeClass('valid-feedback, invalid-feedback');
    }
    create_button_checker()
  });

  $("#create_button").click(function(){
    console.log($('#user-type:checkbox:checked').length )
    $.post("./ajax/register.php",
    { username: $("#create-name").val(),
    firstname : $("#create-first-name").val(),
    lastname: $("#create-last-name").val(),
    password: $("#create-password").val(),
    password_2: $("#create-password-re").val(),
    email: $("#create-email").val(),
    type: $('#user-type:checkbox:checked').length},
    function(returnedData){
         console.log(returnedData);
});
  });


});


function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
};

function create_button_checker() {

  if($("#create-name").parent().find('.is-valid').length == 1) {
    if($("#create-first-name").parent().find('.is-valid').length == 1) {
      if($("#create-last-name").parent().find('.is-valid').length == 1) {
        if($("#create-password").parent().find('.is-valid').length == 1) {
          if($("#create-password-re").parent().find('.is-valid').length == 1) {
            if($("#create-email").parent().find('.is-valid').length == 1) {
              $("#create_button").addClass('button').removeClass('button-not-able');
              return
  }}}}}}
  $("#create_button").addClass('button-not-able').removeClass('button');
}
