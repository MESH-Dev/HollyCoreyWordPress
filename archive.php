<?php get_header();
global $wp_query;
$archiveOBJ = get_queried_object();
?>

<div id="content">
  <div class="container">
    <h1 id="title"><?php post_type_archive_title(); ?></h1>
    <div class="gl-row">
      <div class="gl-col gl-col_12">
        <?php include_once( locate_template('partials/archive-featured.php') ); ?>
      </div>
      <div class="gl-col gl-col_4">
        <?php include_once( locate_template('partials/archive-additional.php') ); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
