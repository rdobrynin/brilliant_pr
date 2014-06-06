<?php
$form['actions']['submit']["#attributes"]['class'][] = 'btn-success';
//hide($form['actions']['submit']);
$form['name']['#title'] = _bootstrap_icon('user') . ' ' . 'Username';
$form['pass']['#title'] = _bootstrap_icon('lock') . ' ' . 'Password';
$form['actions']['submit']['#id'] = 'login_btn';
//dsm($form)
?>
<!--    <div class="row">-->
<!--      <div class="col-lg-3">-->
<!--        <span class="grey">--><?php //print render($form['name']); ?><!--</span>-->
<!--      </div>-->
<!--      <div class="col-lg-3">-->
<!--        <span class="grey">--><?php //print render($form['pass']); ?><!--</span>-->
<!--      </div>-->
<!--      <div class="col-lg-3">-->
<!--        --><?php //print drupal_render_children($form); ?>
<!--      </div>-->
<!--    </div>-->
<!--data-keyboard="false" data-backdrop="static"-->

<div class="modal fade" id="login_modal"  data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header window-login">

        <h4 class="modal-title"><?php print t('Login');?></h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-block alert-danger messages error" id="login-error">
          <a class="close" data-dismiss="alert" href="#">×</a>
          <h4 class="element-invisible">Error message</h4>
          Sorry, unrecognized username or password. <a href="/brilliant_pr/user/password?name=qws">Have you forgotten your password?</a></div>

        <div class="row">
          <div class="col-lg-6">
            <span class="grey"><?php print render($form['name']); ?></span>
          </div>
          <div class="col-lg-6">
            <span class="grey"><?php print render($form['pass']); ?></span>
          </div>
          <div class="col-lg-12">
            <?php print drupal_render_children($form); ?>
          </div>
        </div>
      </div>
      <div class="modal-footer" id="login_footer">
        <a href="user/refister"> <button type="button" class="btn btn-info"><?php print t('Create new account');?></button></a>
        <a href="user/password"> <button style="float: left;" type="button" class="btn btn-info"><?php print t('Request new password');?></button></a>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->