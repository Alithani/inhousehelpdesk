//<!-- Custom scripts for this page-->
// Toggle between fixed and static navbar
//    <script>
    $('#toggleNavPosition').click(function() {
      $('body').toggleClass('fixed-nav');
      $('nav').toggleClass('fixed-top static-top');
    });

 //   </script>
//    <!-- Toggle between dark and light navbar-->
//    <script>
    $('#toggleNavColor').click(function() {
      $('nav').toggleClass('navbar-dark navbar-light');
      $('nav').toggleClass('bg-dark bg-light');
      $('body').toggleClass('bg-dark bg-light');
    });

function isPasswordMatch() {
  //uses id to check if they match
  var password = $("#upass").val();
  var confirmPassword = $("#cpass").val();

  if (password != confirmPassword) $("#divCheckPassword").html("Passwords do not match!");
  else $("#divCheckPassword").html("Passwords match.");
}
