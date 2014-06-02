<?php
include "guestbook.html";
if ($_POST) {
    if (isset($_COOKIE['posts'])) {
        if ($_COOKIE['posts'] < 5) {
            $posts = $_COOKIE['posts'] + 1;
            setcookie('posts', $posts, time() + 100 * 10);
        } else {
            echo "<div style='text-align:center;'>You've attempted to submit too many posts at once.</div>";
            return "<style>form{display:none;}</style>";
        }
    } else {
        setcookie('posts', 1, time() + 120 * 10);
    }
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
