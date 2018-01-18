<!DOCTYPE html>
<html>
  <head>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/materialize/css/materialize.css'; ?>"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/css/main.css'; ?>"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() . 'assets/css/superadmin.css'; ?>"/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body>
  	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'assets/materialize/js/materialize.min.js'; ?>"></script>
    <div id="page-container">
    	<nav id="nav-bar" class="nav-extended">
			<div class="nav-wrapper">
				<a href="#" class="brand-logo" id="name">Interface super administrateur</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="sass.html">Déconnexion</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="sass.html">Déconnexion</a></li>
				</ul>
			</div>
			<div class="nav-content">
				<ul class="tabs tabs-transparent">
					<li class="tab"><a class="active" href="#sports-tab">Sports</a></li>
					<li class="tab"><a href="#doc-tab">Documents à rendre</a></li>
					<li class="tab"><a href="#opt-tab">Options</a></li>
				</ul>
			</div>
		</nav>

		<!-- SPORTS -->
		<div id="sports-tab" class="col s12 tab-content">
			<h1 id="title">Gestion des sports proposés</h1>
			<hr class="separator"/>

			<table class="striped">
				<thead>
					<tr>
						<th>Nom du sport</th>
						<th>Description</th>
						<th>Photo</th>
						<th></th>
						<th></th>
					</tr>
				</thead>

				<tbody id="tab-sport">
					<tr value="1">
						<td>sport 1</td>
						<td>c'est le sport 1</td>
						<td>no</td>
						<td class="button-td">
							<button class="btn waves-effect waves-light" type="" name="edit-sport-button">
								<i class="material-icons center">mode_edit</i>
							</button>
						</td>
						<td class="button-td">
							<button class="btn waves-effect waves-light" type="" name="del-sport-button">
								<i class="material-icons center">delete</i>
							</button>
						</td>
					</tr>
				</tbody>
			</table>

			<div class="form-container">
				<form name="add-sport" method="post">
					<div class="row custom-row">
						<div class="input-field col s6">
				          	<input id="sport-name" type="text" name="sport-name" class="validate">
				          	<label for="sport-name">Nom du sport</label>
				        </div>
				    </div>
				    <div class="row custom-row">
						<div class="input-field col s12">
							<textarea id="desc" name="desc" class="materialize-textarea"></textarea>
							<label for="desc">Description (optionnel)</label>
						</div>
					</div>
					<div class="row custom-row">
						<div class="file-field input-field">
							<div class="btn">
								<span>Parcourir</span>
								<input type="file" name="image-sport">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate col s6" type="text" placeholder="Glisser une image décrivant le sport (optionnel)">
							</div>
						</div>
					</div>
					<br>
					<input type="hidden" name="sport-id-add">
					<button class="btn waves-effect waves-light" type="submit" name="add-sport-button">Ajouter
						<i class="material-icons left">add</i>
					</button>
					<button class="btn waves-effect waves-light" type="button" style="display: inline-block;" name="cancel-doc-button">Annuler
						<i class="material-icons left">cancel</i>
					</button>
				</form>
			</div>
		</div>

		<!-- DOCUMENTS A RENDRE -->
		<div id="doc-tab" class="col s12 tab-content">
			<h1 id="title">Gestion des documents à rendre</h1>
			<hr class="separator"/>
			<br>
			<div class="row">
				<div class="input-field col s6">
					<select>
						<option value="" disabled selected>Selectionner le sport</option>
						<option value="1">sport1</option>
					</select>
					<label>Sport</label>
				</div>
			</div>
			<br>
			<table class="striped">
				<thead>
					<tr>
						<th>Nom du document</th>
						<th>Description</th>
						<th>Modèle</th>
						<th></th>
						<th></th>
					</tr>
				</thead>

				<tbody id="tab-doc">
					<tr class="1">
						<td>doc inscription</td>
						<td>Veuillez remplir la fiche d'inscription</td>
						<td>yes</td>
						<td class="button-td">
							<button class="btn waves-effect waves-light" value="" type="submit" name="edit-doc-button">
								<i class="material-icons center">mode_edit</i>
							</button>
						</td>
						<td class="button-td">
							<button class="btn waves-effect waves-light" value="" type="submit" name="del-doc-button">
								<i class="material-icons center">delete</i>
							</button>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="form-container">
				<form name="add-doc" method="post">
					<div class="row custom-row">
						<div class="input-field col s6">
				          	<input id="doc-name" type="text" name="doc-name" class="validate">
				          	<label for="doc-name">Nom du document</label>
				        </div>
				    </div>
				    <div class="row custom-row">
						<div class="input-field col s12">
							<textarea id="desc-doc" name="desc-doc" class="materialize-textarea"></textarea>
							<label for="desc-doc">Description (optionnel)</label>
						</div>
					</div>
					<div class="row custom-row">
						<div class="file-field input-field">
							<div class="btn">
								<span>Parcourir</span>
								<input type="file" name="image-doc">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate col s6" type="text" placeholder="Glisser un modèle du document (optionnel)">
							</div>
						</div>
					</div>
					<br>
					<button class="btn waves-effect waves-light" type="submit" name="add-doc-button">Ajouter
						<i class="material-icons left">add</i>
					</button>
					<button class="btn waves-effect waves-light" type="button" style="display: inline-block;" name="cancel-doc-button">Annuler
						<i class="material-icons left">cancel</i>
					</button>
					<input type="hidden" name="sport-id" value="">
				</form>
			</div>
		</div>

		<!-- OPTION -->
		<div id="opt-tab" class="col s12 tab-content">Test 3

		</div>
		<br/>
		<br/>
		<br/>
    </div>

    <div id="main-bg"></div>
    <script type="text/javascript">
		$(document).ready(function() {
			$('select').material_select();
		});
    </script>
  </body>
</html>