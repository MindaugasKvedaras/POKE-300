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
session_start();
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
    <link 
      rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
      crossorigin="anonymous" 
      referrerpolicy="no-referrer" 
    />   
    <link rel="stylesheet" href="css/styling.css">
</head>
<body>
  <nav class="navbar has-background-success is-small mb-6">
    <div class="container">
      <div class="container is-flex is-flex-wrap is-justify-content-space-between is-align-items-center">
        <div>
          <h1 class="title has-text-white">
            Sveiki, <span><?php echo $sender_name ?></span>
          </h1>
        </div>
        <div class="is-flex is-align-items-center is-justify-content-flex-end">
          <div class="navbar-item navbar-padding">
            <div class="buttons">
              <div class="nav has-dropdown is-right" id="message-dropdown">
                <button 
                  class="navbar-button button is-success is-inverted" 
                  id="message-button" 
                  data-button-name="Pranešimai"
                >
                  <i class="fas fa-bell"></i>
                  <span 
                    class="tag has-background-primary-dark has-text-white is-rounded" 
                    id="pokes"
                  >
                  //Here appears the number of notifications
                  </span>
                </button>
                <div 
                  class="navbar-dropdown is-right is-boxed has-background-success-light" 
                  id="notifications-dropdown">
                  //Here appears notifications
                </div>
              </div>
              <button 
                class="navbar-button button is-success is-inverted" 
                data-button-name="Profilis"
              >
                <i class="fas fa-user"></i>
              </button>
              <a 
                href="server/logout.php" 
                class="navbar-button button is-success is-inverted" 
                data-button-name="Atsijungti"
              >
                <i class="fas fa-arrow-right-from-bracket"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

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
        style="min-width:600px;"
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
            //Here appears user table
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="scripts/search_paginate_poke.js"></script>
<script src="scripts/notification_toggling.js"></script>
</body>
</html>
