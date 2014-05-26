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
<!--        --><?php //print format_date( time());?>
        <span class="time-top"></span>
        <?php if ($user->uid != in_array('customer', $user->roles) && $user->uid != in_array('implementor', $user->roles)): ?>
          <div class="btn-group select-nav-top">
            <button data-toggle="dropdown" class="btn dropdown-toggle" id="select-nav-top"><span class="glyphicon glyphicon-cog"></span><span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li><a href="<?php print $base_url;?>/admin/people"><?php print t('Administer users');?></a></li>
              <li><a href="<?php print $base_url;?>/admin/people/create"><?php print t('Add user');?></a></li>
              <li><a href="<?php print $base_url;?>/admin/people/permissions"><?php print t('Permissions');?></a></li>
              <li class="divider"></li>
              <li><a href="<?php print $base_url;?>/admin/config/people/accounts"><?php print t('Account settings');?></a></li>
            </ul>
          </div>
        <?php endif; ?>
        <?php if (arg(1) == 'brilliant_pr_project' &&  $user->uid != in_array('implementor', $user->roles) && arg(3) != 'add' && arg(4) != 'tasks'): ?>
          <span id="create-project">  <a href="<?php print $base_url;?>/entity/brilliant_pr_project/basic/add"><button type="button" class="btn btn-success" id="create-project-btn"><span class="glyphicon glyphicon-plus">&nbsp;</span><?php print t('Create project');?></button></a></span>
        <?php endif; ?>
        <?php if (arg(1) == 'brilliant_pr_project' &&  $user->uid != in_array('implementor', $user->roles) && arg(3) == 'add'): ?>
          <span id="create-project">  <a href="<?php print $base_url;?>/entity/brilliant_pr_project/basic/add"><button type="button" class="btn btn-success" disabled='disabled' id="create-project-btn"><span class="glyphicon glyphicon-plus">&nbsp;</span><?php print t('Create project');?></button></a></span>
        <?php endif; ?>


        
        <?php if (arg(1) == 'brilliant_pr_task' && arg(3) != 'add'|| arg(4) == 'tasks' ): ?>
          <span id="create-project">  <a href="<?php print $base_url;?>/entity/brilliant_pr_task/basic/add"><button type="button" class="btn btn-success" id="create-project-btn"><span class="glyphicon glyphicon-plus">&nbsp;</span><?php print t('Create task');?></button></a></span>
        <?php endif; ?>
        <?php if (arg(1) == 'brilliant_pr_task'  && arg(3) == 'add'): ?>
          <span id="create-project">  <a href="<?php print $base_url;?>/entity/brilliant_pr_task/basic/add"><button type="button" class="btn btn-success" disabled='disabled' id="create-project-btn"><span class="glyphicon glyphicon-plus">&nbsp;</span><?php print t('Create task');?></button></a></span>
        <?php endif; ?>
        <?php print $content; ?>
      </nav>
    </div>
    <?php endif; ?>
    <?php if ($content_attributes): ?></div><?php endif; ?>
  </header>
<?php endif; ?>


<script>
  (function($){
    $(document).ready(function(){
      function pretty_time_string(num) {
        return ( num < 10 ? "0" : "" ) + num;
      }
      var start = new Date;
      setInterval(function() {
        var d = new Date();
        var weekday = new Array(7);
        weekday[0]=  "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";
        var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";
        var time_date = d.getDate() +  " " + month[d.getMonth()] + " " + weekday[d.getDay()] + " ";
        var time_time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();

// counter
        var total_seconds = (new Date - start) / 1000;
        var hours = Math.floor(total_seconds / 3600);
        total_seconds = total_seconds % 3600;
        var minutes = Math.floor(total_seconds / 60);
        total_seconds = total_seconds % 60;
        var seconds = Math.floor(total_seconds);
        hours = pretty_time_string(hours);
        minutes = pretty_time_string(minutes);
        seconds = pretty_time_string(seconds);
        var currentTimeString = hours + ":" + minutes + ":" + seconds;
//        end counter

        $('.time-top').text(time_date + time_time);

      }, 100);
      });
  })(jQuery);
</script>
