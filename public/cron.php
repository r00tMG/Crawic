<?php
exit();
echo __DIR__;
$output = shell_exec('python --version');
echo "<pre>$output</pre>";
?>