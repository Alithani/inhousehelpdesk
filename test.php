<?php
  include "link.php";
  $files = glob("images/*.*");

for ($i=0; $i<count($files); $i++) {
    $image = $files[$i];
    if($image== "1.jpg")
    {
      print $image ."<br />";
    echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";
    }
    
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div>
    <a class="quote btn btn-lg" href="#quote_modal" title="">Ask for a quote!</a></div>
  

  <!--Quote Popup Window like Modal-->

  <div id="quote_modal" class="QuoteModal">
    <div class="popup_modal">
      <div>
        <a href="#close" title="Close" class="fclose">X</a>
        <h3>Ask for a Quote</h3>
      </div>
      <div>
        <form role="form" class="text-center">
          <div class="form-group">
            <input type="text" required class="form-control" placeholder="Name" tabindex="1">
          </div>
          <div class="form-group">
            <input type="email" required class="form-control" placeholder="Email" tabindex="2">
          </div>
          <div class="form-group">
            <textarea rows="10" required class="form-control" placeholder="Message" tabindex="3"></textarea>
          </div>
        </form>
      </div>
      <div>

        <button type="button" class="btn btn-warning">Send Quote</button>
      </div>
    </div>
  </div>
</body>
</html>