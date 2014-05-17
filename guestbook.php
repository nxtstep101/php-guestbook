<?php
if ($_POST) {
  $comment = $_POST['comment'];
  $handle  = fopen("guestbook.html", "a");
  fwrite($handle, $comment);
  fclose($handle);
}
<!DOCTYPE html>
<html>
   <body>
      <form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         Message:<br /><textarea name="comment" maxlength="1000" cols="25" rows="6"></textarea><br />
         <input type="submit" name="submit" value="submit">
      </form>
   </body>
</html>
