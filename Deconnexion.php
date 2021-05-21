<?php
setcookie('log', 'jeankevin', time() + 7*24*3600, null, null, false, true);
setcookie('mp', 'X0X0', time() + 7*24*3600, null, null, false, true);
header("location: index.php");
?>
