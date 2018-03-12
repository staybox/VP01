<?php
if (strpos($_SERVER['REQUEST_URI'], "/") !== false) {
   require_once('../app/template.php');
}