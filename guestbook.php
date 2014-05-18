<?php
require "guestbook.html";
if ($_POST) {
    $allowed_tags = '<b><i><br/>';
    $stripName    = strip_tags($_POST['name'], $allowed_tags);
    $stripComment = strip_tags($_POST['comment'], $allowed_tags);
    $name         = $stripName;
    $comment      = $stripComment;
    $handle       = fopen("guestbook.html", "a");
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
