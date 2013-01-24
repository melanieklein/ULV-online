<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
$view = views_get_current_view();

if($view->name == "domaines_interets"){


  foreach ($rows as $row): ?>
  <div class="intDetails">
    <?php print $row; ?>
  </div>
  
<?php endforeach;

}
else
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
 ?>
