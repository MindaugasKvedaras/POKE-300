<?php

/**
 * Server Code for Logout
 *
 * This file contains the code for users logout procedure
 *
 * PHP version 7.4
 *
 * @category No_Category
 * @package  No_Package
 * @author   Mindaugas Kvedaras <kvedaras.mindaugas@gmail.com>
 * @license  No License
 * @link     No link
 */

require 'config.php';

session_start();
session_unset();
session_destroy();

header('location:../register_form.php');
