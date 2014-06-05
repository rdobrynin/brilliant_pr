<?php
$form['actions']['submit']["#attributes"]['class'][] = 'btn-success';
//hide($form['actions']['submit']);
$form['name']['#title'] = _bootstrap_icon('user') . ' ' . 'Username';
$form['pass']['#title'] = _bootstrap_icon('lock') . ' ' . 'Password';
$form['actions']['submit']['#id'] = 'login_btn';
//dsm($form)
?>
    <div class="row">
      <div class="col-lg-3">
        <span class="grey"><?php print render($form['name']); ?></span>
      </div>
      <div class="col-lg-3">
        <span class="grey"><?php print render($form['pass']); ?></span>
      </div>
      <div class="col-lg-3">
        <?php print drupal_render_children($form); ?>
      </div>
    </div>


<div class="modal fade" id="test_modal">
  <div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Modal Header</h3>
  </div>
  <div class="modal-body">
    <p>Test Modal</p>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
    <a href="#" class="btn btn-primary">Save Changes</a>
  </div>
</div>