<?php

@include 'server/config.php';

session_start();
session_unset();
session_destroy();

header('location:register_form.php');
