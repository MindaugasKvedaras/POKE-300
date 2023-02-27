<?php

/**
 * Users Information Page
 *
 * This file contains the code for user registration and signin form
 *
 * PHP version 7.4
 *
 * @category No_Category
 * @package  No_Package
 * @author   Mindaugas Kvedaras <kvedaras.mindaugas@gmail.com>
 * @license  No License
 * @link     No link
 */

require 'server/signin_register.php';
require './server/user_id.php';
require './server/count_pokes.php';
require './server/sent_poke.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user page</title>
    <link 
      rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css"
    >
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link 
      rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" 
    />
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<section class="hero is-success mb-4">
  <div class="hero-body">
    <div class="container">
      <div class="container is-flex is-justify-content-space-between">
        <div>
            <h1 class="title">
                Sveiki, <span><?php echo $sender_name ?></span>
            </h1>
        </div>
        <div>
          <a 
            href="server/logout.php" 
            class="button is-primary is-inverted"
          >
            Atsijungti
          </a>
        </div>
      </div>  
      <h2 class="subtitle">
        Žemiau yra pateikta visų prisiregistravusių vartotojų lentelė
      </h2>
    </div>
  </div>
</section>
<div class="container is-flex is-flex-direction-column custom-height">
  <div class="field">
    <div class="control has-icons-left">
      <input 
        id="search-input" 
        class="input is-success" 
        type="text" 
        placeholder="Ieškoti vartotojų"
      >
      <span class="icon is-left has-text-success">
        <i class="fas fa-search"></i>
      </span>
    </div>
  </div>
  <div class="table-container">
    <table 
      class="table is-striped is-fullwidth is-hoverable is-centered" 
      id="myTable" 
      style="min-width:800px;"
    >
      <thead class="has-background-success">
        <tr>
          <th class="has-text-white">ID</th>
          <th class="has-text-white">Vardas</th>
          <th class="has-text-white">Pavardė</th>
          <th class="has-text-white">El. paštas</th>
          <th class="has-text-white">Pokes(gauti)</th>
          <th class="has-text-white">Pokes(išsiųsti)</th>
          <th class="has-text-white">Išsiųsti el. laišką</th>
        </tr>
      </thead>
        <tbody id="tableBody">
        </tbody>
    </table>
    <nav 
      id="pagination" 
      class="pagination is-flex is-justify-content-center" 
      role="navigation" 
      aria-label="pagination"
    >
    </nav>   
  </div>
</div>
  <div id="success-modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content has-text-centered">
      <article class="message is-success">
        <div class="message-body">
            <p class="is-size-3">Žinutė sėkmingai išsiųsta!</p>
        </div>
      </article>
    </div>
</div> 
<script src="scripts/search_paginate_poke.js"></script>

</body>
</html>
