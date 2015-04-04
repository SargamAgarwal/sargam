<?php
require_once ('database.inc');
 $connection = mysql_connect(HOSTNAME,USERNAME,PASSWORD);
  mysql_select_db(DATABASE,$connection);
?>