<?php
/**
 * @file
 * region--navigation.tpl.php
 *
 * Default theme implementation to display the "navigation" region.
 *
 * Available variables:
 * - $content: The content for this region, typically blocks.
 * - $attributes: String of attributes that contain things like classes and ids.
 * - $content_attributes: The attributes used to wrap the content. If empty,
 *   the content will not be wrapped.
 * - $region: The name of the region variable as defined in the theme's .info
 *   file.
 * - $page: The page variables from bootstrap_process_page().
 *
 * Helper variables:
 * - $is_admin: Flags true when the current user is an administrator.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 *
 * @see bootstrap_preprocess_region().
 * @see bootstrap_process_page().
 *
 * @ingroup themeable
 */
global $user;
global $base_url;
?>
<?php if ($page['logo'] || $page['site_name'] || $page['primary_nav'] || $page['secondary_nav'] || $content): ?>
  <header<?php print $attributes; ?>>
    <?php if ($content_attributes): ?><div<?php print $content_attributes; ?>><?php endif; ?>
    <div class="navbar-header">
      <?php if ($page['logo']): ?>
        <a class="logo navbar-btn pull-left" href="<?php print $page['front_page']; ?>" title="<?php print t('Project management'); ?>">
          <img src="<?php print $page['logo']; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>
      <?php if ($page['site_name']): ?>
        <a class="name navbar-brand" href="<?php print $page['front_page']; ?>" title="<?php print t('Home'); ?>"><?php print $page['site_name']; ?></a>
      <?php endif; ?>
      <?php if ($page['primary_nav'] || $page['secondary_nav'] || $content): ?>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php endif; ?>
    </div>
    <?php if ($page['primary_nav'] || $page['secondary_nav'] || $content): ?>
    <div class="navbar-collapse collapse">
      <nav role="navigation">
        <?php print render($page['primary_nav']); ?>
        <?php print render($page['secondary_nav']); ?>

        <!--        add select list-->
        <?php if (arg(1) == 'brilliant_pr_project' && $user->uid != in_array('customer', $user->roles) && $user->uid != in_array('implementor', $user->roles)): ?>
          <div class="btn-group select-nav-top">
            <button data-toggle="dropdown" class="btn dropdown-toggle" id="select-nav-top"><span class="glyphicon glyphicon-cog"></span><span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="<?php print $base_url;?>/admin/structure/brilliant_pr_project/manage/approve">Approve projects</a></li>
              <li><a href="<?php print $base_url;?>/admin/structure/brilliant_pr_project/manage">Current projects</a></li>
              <li><a href="<?php print $base_url;?>/admin/structure/brilliant_pr_project/manage/complete">Complete projects</a></li>
              <li class="divider"></li>
              <li><a href="<?php print $base_url;?>/admin/structure/brilliant_pr_project/manage/remove">Deleted projects</a></li>
            </ul>
          </div>
        <?php endif; ?>
        <?php if (arg(1) == 'brilliant_pr_task' && $user->uid != in_array('customer', $user->roles) && $user->uid != in_array('implementor', $user->roles)): ?>
          <div class="btn-group select-nav-top">
            <button data-toggle="dropdown" class="btn dropdown-toggle" id="select-nav-top"><span class="glyphicon glyphicon-cog"></span><span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="<?php print $base_url;?>/admin/structure/brilliant_pr_task/manage/approve">Approve tasks</a></li>
              <li><a href="<?php print $base_url;?>/admin/structure/brilliant_pr_task/manage">Current tasks</a></li>
              <li class="divider"></li>
              <li><a href="<?php print $base_url;?>/admin/structure/brilliant_pr_task/manage/remove">Deleted tasks</a></li>
            </ul>
          </div>
        <?php endif; ?>

        <?php print $content; ?>
      </nav>
<!--  --><?php //if($user->uid == 0) {
//    print '<span class="pull-right">Login</span>';
//  }
//  ?>


    </div>
    <?php endif; ?>
    <?php if ($content_attributes): ?></div><?php endif; ?>
  </header>
<?php endif; ?>
