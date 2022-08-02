<?php
unset( $_SESSION['ADMIN']);
session_destroy();
redirect(SITE_PATH);
?>
