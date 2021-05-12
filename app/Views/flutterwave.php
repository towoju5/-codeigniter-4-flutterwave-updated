<?php 

  echo "<pre>";

   print_r($transfer); 

  echo "</pre><hr>";

   print_r($cards);

  echo "<pre><hr>";

    // print_r($bills); //GET BILL REQUIRES SOME ARG SOME AM NOT USING IT HERE

  echo "</pre><hr>";
?>

<!DOCTYPE html>
<html>
        <head>
                <meta charset="utf-8">
                <title>CKEditor</title>
                <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
        </head>
        <body>
                <textarea name="editor1"></textarea>
                <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
        </body>
</html>