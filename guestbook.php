<?php
require "guestbook.html";
if ($_POST) {
    $name    = $_POST['name'];
    $comment = $_POST['comment'];
    $handle  = fopen("guestbook.html", "a");
    fwrite($handle, $name . "<br/>" . $comment);
    fclose($handle);
}
?>
<!DOCTYPE html>
<html>
   <body>
      <form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
         Name:<br /><input type="text" title="Enter your Username" name="name" /><br />
         Message:<br /><textarea name="comment" maxlength="1000" cols="25" rows="6"></textarea><br />
         <input type="submit" name="submit" value="submit">
      </form>
   </body>
</html>
