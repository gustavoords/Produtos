<?php
session_start();

unlink($_SESSION['usuario']);

$_SESSION['usuario'] = null;

unlink($_SESSION['suporte']);

$_SESSION['suporte'] = null;

unlink($_SESSION);

header("Location: /");