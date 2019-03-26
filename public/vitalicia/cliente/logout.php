<?php

session_start();
unset ($SESSION['username']);
session_destroy();

header('Location: http://localhost/netit/cliente/login_cliente.html');

?>