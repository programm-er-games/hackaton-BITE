<?php
if(isset($_COOKIE['is_auth']) && $_COOKIE['is_auth'] === 'yes') $access = true; 
else $access = false;