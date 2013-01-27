<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<?php
$view = views_get_current_view();

if(($view->name == 'domaines_interets') || ($view->name == 'equipe') || ($view->name == 'collaborateurs') || ($view->name == 'cliniques') || ($view->name == 'publications') || ($view->name == 'contactez_nous') || ($view->name == 'recherche') ){

    if($view->name == "domaines_interets"){
    	?>

    	<h2><?php print $row->node_title; ?></h2>
    	<p><?php print $row->field_field_description[0]["rendered"]["#markup"]; ?></p>
    <?php
    }

    elseif($view->name == 'equipe') {

      ?>

    <div class="wrapInt">

      <div class="imgEq">
        <?php print render($row->field_field_photo); ?>
      </div>

      <div class="descr">
        <hgroup>
          <h2>
            <?php print $row->field_field_pr_nom[0]["rendered"]["#markup"];?> <?php print $row->field_field_nom[0]["rendered"]["#markup"];?>
          </h2>
          <h3 class='descrPoste'><?php print $row->node_title; ?></h3>
        </hgroup>
        <p><?php print $row->field_field_cv[0]["rendered"]["#markup"]; ?></p>

        <span><?php print $row->field_field_nom_specialite[0]["rendered"]["#markup"]; ?></span>
     </div>

    </div>

      <?php
    }


    elseif($view->name == 'collaborateurs' || $view->name == 'cliniques') {

      ?>

    <div class="wrapInt">

      <div class="imgEq">
        <?php print render($row->field_field_photo); ?>
      </div>

      <div class="descr">
        <hgroup>
          <h2>
            <?php print $row->field_field_pr_nom[0]["rendered"]["#markup"];?> <?php print $row->field_field_nom[0]["rendered"]["#markup"];?>
          </h2>
          <h3 class='descrPoste'><?php print $row->node_title; ?></h3>
        </hgroup>
        <p><?php print $row->field_field_cv[0]["rendered"]["#markup"]; ?></p>
     </div>

    </div>

      <?php
    }


    elseif($view->name == 'publications'){
      ?>

      <div class="meta">
        <span class="pubType"><?php print $row->field_field_type_support[0]["rendered"]["#markup"]; ?></span>
        <p class="date">
          <?php print $row->field_field_date_publication[0]["rendered"]["#markup"]; ?>
        </p>
        <p class="langue">
          <span>
            Langue&nbsp;: 
          </span>
          <span class="langue">
            <?php print $row->field_field_langue[0]["rendered"]["#markup"]; ?>
          </span>
        </p>
      </div>

      <div class="content">
        <header>

          <h2 class="title"><?php print $row->node_title; ?></h2>

        <p class="author">Article écrit par&nbsp;: 

          <?php 
          $length = sizeof($row->field_field_auteur);

          for ($i=0;$i<$length;$i++){
          print $row->field_field_auteur[$i]["rendered"]["#markup"] . ", ";
          } 

          ?>
          </p> 
      


      </header>
        <article>
          <h3 class="hiddenTitle">Résumé de l'article</h3>
          <?php print $row->field_field_resume[0]["rendered"]["#markup"]; ?>
          <a href="<?php print $row->field_field_url[0]["rendered"]["#markup"];?>" title="Voir la publication sur le site Orbi">Lire sur Orbi</a>
        </article>
      </div>


<?php
    }

    elseif($view->name == 'contactez_nous'){
?>
      <h2><?php print $row->node_title; ?></h2>
      <span><?php print $row->field_field_contactnom[0]["rendered"]["#markup"]; ?></span>
      <span><?php print $row->field_field_ruenumero[0]["rendered"]["#markup"]; ?></span>
      <span><?php print $row->field_field_code_postal[0]["rendered"]["#markup"]; ?> <?php print $row->field_field_ville[0]["rendered"]["#markup"]; ?></span>
      <?php
      $length2 = sizeof($row->field_field_personne);
      for($j=0;$j<$length2;$j++){
      ?>
      <span><?php print $row->field_field_personne[$j]["rendered"]["#markup"]; ?></span>
<?php
    }

}

    elseif($view->name == 'recherche'){
?>
      <?php print render($row->field_field_photo_partenaire); ?>
      <h1><?php print $row->node_title; ?>, partenaire à <?php print $row->field_field_pays_partenaire[0]["rendered"]["#title"]; ?></h1>
      <p><?php print $row->field_field_raison_partenariat[0]["rendered"]["#markup"]; ?></p>
      <?php
      if($row->field_field_lien_partenaire){?>
      <a href="<?php print $row->field_field_lien_partenaire[0]["rendered"]["#markup"]; ?>">Visiter le site</a>
      <?php
      }

    }

}
else {
	foreach ($fields as $id => $field): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endforeach;
}
