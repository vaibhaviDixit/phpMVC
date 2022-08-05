<?php
unset( $_SESSION['CURRENT_USER_ID']);
session_destroy();
redirect(SITE_PATH."?page=login");

?>