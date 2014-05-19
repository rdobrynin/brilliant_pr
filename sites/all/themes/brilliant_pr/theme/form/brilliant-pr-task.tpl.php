<?php
$form['opt_time']['date']['#title'] = 'Optimal date/time';
$form['dead_time']['date']['#title'] = 'Deadline date/time';
unset($form['dead_time']['time']['date']);
unset($form['opt_time']['time']['date']);
hide($form['submit']);
hide($form['remove']);
hide($form['cancel']);
global $user;
?>

<div class="row-fluid">
  <div class="span8">
    <fieldset>
      <div class="row">
        <div class="col-lg-2">
          <span class="field-title"><?php print render($form['title']['#title']); ?>&nbsp;<span class="required-note">*</span></span>
        </div>
        <div class="col-lg-4 pull-left">
          <?php print render($form['title']); ?>
        </div>
      </div>
<!--      check if we create task for this project, we hide project ref item-->
      <?php if (arg(3) == 'add' && is_null(arg(4)) ||$user->uid != in_array('customer', $user->roles) && arg(3) == 'add' && is_null(arg(4)) ): ?>
        <div class="row">
          <div class="col-lg-2">
          <span class="field-title">
     <?php print render($form['ref']['#title']); ?>
            &nbsp;<span class="required-note">*</span></span>
          </div>

          <div class="col-lg-4 pull-left">
            <?php print render($form['ref']); ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if (arg(4) == 'edit'): ?>
        <div class="row">
          <div class="col-lg-2">
          <span class="field-title">
     <?php print render($form['ref']['#title']); ?>
            &nbsp;<span class="required-note">*</span></span>
          </div>

          <div class="col-lg-4 pull-left">
            <?php print render($form['ref']); ?>
          </div>
        </div>
      <?php endif; ?>
<!--      curator field hide due to task belongs of current project -->
      <?php if ($user->uid != in_array('customer', $user->roles)): ?>
      <div class="row">
        <div class="col-lg-2">
          <span class="field-title"><?php print render($form['curator']['#title']); ?>&nbsp;<span class="required-note">*</span></span>
        </div>
        <div class="col-lg-4 pull-left">
          <?php print render($form['curator']); ?>
        </div>
      </div>
      <?php endif; ?>
      <?php if ($user->uid != in_array('customer', $user->roles)): ?>
      <div class="row">
      <div class="col-lg-2">
          <span class="field-title">
            <?php print render($form['implementor']['#title']); ?>
            &nbsp;<span class="required-note">*</span></span>
      </div>
      <div class="col-lg-4 pull-left">
        <?php print render($form['implementor']); ?>
      </div>
  </div>
      <?php endif; ?>
      <div class="row">
        <div class="col-lg-2">
          <span class="field-title"><?php print render($form['description']['#title']); ?></span>
        </div>
        <div class="col-lg-10 pull-left"  style="margin-bottom: 20px">
          <?php print render($form['description']); ?>
        </div>
      </div>
      <div class="division">
        <div class="row">
          <div class="col-lg-5">
            <span
              class="field-title"><?php print render($form['opt_time']); ?></span>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5">
            <span
              class="field-title"><?php print render($form['dead_time']); ?></span>
          </div>
        </div>
      </div>
      <?php
      if (!empty($form['status'][0]) || !empty($form['status'][1]) || !empty($form['status'][2]) || !empty($form['status'][3]) || !empty($form['status'][4]) || !empty($form['status'][5])) {
        print_r(' <div class="division">');
        print drupal_render_children($form);
        print_r('</div>');
      }
      else {
        print drupal_render_children($form);
      }
      ?>
      <div class="division">
        <div class="row">
          <div class="col-lg-12 text-right">
            <span class="field-title"><?php print render($form['submit']); ?><?php print render($form['remove']); ?>
<?php print render($form['cancel']); ?></span>

          </div>

        </div>
      </div>

    </fieldset>
  </div>
</div>

