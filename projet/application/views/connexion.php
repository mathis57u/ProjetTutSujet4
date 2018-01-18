<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/materialize/css/materialize.css'; ?>"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/css/main.css'; ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/css/connection.css'; ?>"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/materialize/js/materialize.min.js'; ?>"></script>

    <div id="page-container">
      
      <h1 id="title">Veuillez vous connecter ou vous inscrire</h1>
      
      <hr class="separator"/>
      <div id="error-container" style="display: <?php echo (isset($error)) ? "block" : "none" ?> ;">
        <i class="material-icons inline-block error-icon">error</i>
        <span class="inline-block" id="text-error"><?php echo (isset($error)) ? $error : "" ?></span>
      </div>

      <div id="log-container">
        <ul id="log-sign-tabs" class="tabs">
          <li class="tab col s12"><a class="<?php isset($verif) || isset($form1) ? "active" : ""; ?>" href="#log-in-div">Connexion</a></li>
          <li class="tab col s12"><a class="<?php !isset($verif) && isset($form2) ? "active" : ""; ?>" href="#sign-in-div">Inscription</a></li>
        </ul>
        
        <!-- connection -->
        <div id="log-in-div" class="col s12">
          <form id="log-in-form" name="log-in-form" method="post" action="auth">
            <div class="row custom-row">
              <div class="input-field col s12 first-field">
                <input id="email" type="email" name="email" class="validate" onchange="checkInputs('log-in-form', this)">
                <label for="email">Email</label>
              </div>
            </div>
            <div class="row custom-row">
              <div class="input-field col s12">
                <input id="password" type="password" name="password" class="validate" onchange="checkInputs('log-in-form', null)">
                <label for="password">Mot de passe</label>
              </div>
            </div>
            <button class="btn waves-effect waves-light custom-button" type="submit" name="log-in-button">Se connecter
              <i class="material-icons right">send</i>
            </button>
          </form>
        </div>

        <!-- inscription -->
        <div id="sign-in-div" class="col s12">
          <form id="sign-in-form" name="sign-in-form" method="post" action="insc">
            <div class="row custom-row">
              <div class="input-field col s12 first-field">
                <input id="email-create" type="email" name="insc_email" class="validate" onchange="checkInputs('sign-in-form', this)">
                <label for="email-create">Saisir une adresse mail valide</label>
              </div>
            </div>
            <div class="row custom-row">
              <div class="input-field col s12">
                <input id="password-create" type="password" name="insc_mdp" class="validate" onchange="checkInputs('sign-in-form', null)">
                <label for="password-create">Choisir un mot de passe</label>
              </div>
            </div>
            <div class="row custom-row">
              <div class="input-field col s12">
                <input id="password-validate" type="password" name="insc_val_mdp" class="validate" onchange="checkInputs('sign-in-form', null)">
                <label for="password-validate">Confirmer le mot de passe</label>
              </div>
            </div>
            <button class="btn waves-effect waves-light custom-button" type="submit" name="sign-in-button">S'inscrire
              <i class="material-icons right">send</i>
            </button>
          </form>
        </div>

      </div>
    </div>

    <div id="main-bg"></div>
  </body>
</html>