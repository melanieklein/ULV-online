<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
$view = views_get_current_view();

if( ($view->name == 'domaines_interets') || ($view->name == 'equipe') || ($view->name == 'collaborateurs') || ($view->name == 'cliniques') || ($view->name == 'footer')){

if($view->name == 'domaines_interets') {
  foreach ($rows as $row): ?>
  <div class="intDetails">
    <?php print $row; ?>
  </div>

<?php endforeach;

} elseif ($view->name == 'equipe' || $view->name == 'collaborateurs' || $view->name == 'cliniques') {

  foreach ($rows as $row): ?>
  <li class="int">
    <?php print $row; ?>
  </li>

<?php endforeach;


}

elseif ($view->name == 'footer') {
	foreach ($rows as $row): ?>
  	<li class="altNavTitle">
    <?php print $row; ?>
  	</li>

<?php endforeach;

}

}
elseif( ($view->name != 'domaines_interets') AND ($view->name != 'equipe') AND ($view->name != 'collaborateurs') AND ($view->name != 'cliniques') AND ($view->name != 'footer') )
{


if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <div <?php if ($classes_array[$id]) { print 'class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach;

}
