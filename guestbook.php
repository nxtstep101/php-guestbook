<?php
require "guestbook.html";
if ($_POST) {
    if (empty($_POST["name"]) || empty($_POST["comment"])) {
        echo "<script type='text/javascript'>alert('Please fill out the form before submitting.');</script>";
    } else {
        $allowed_tags = '<b><i><br/>';
        $stripName    = strip_tags($_POST['name'], $allowed_tags);
        $stripComment = strip_tags($_POST['comment'], $allowed_tags);
        $name         = $stripName;
        $comment      = $stripComment;
        $handle       = fopen("guestbook.html", "a");
        fwrite($handle, "<b>" . $name . "</b>:<br/>" . $comment . "<br/><br/>");
        fclose($handle);
    }
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
