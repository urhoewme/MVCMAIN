<?php
/** @var $model \app\app\models\User */
?>

<h1>Register</h1>
<?php $form = \app\system\form\Form::begin('', "post") ?>
<div class="row">
    <div class="col"><?php echo $form->field($model, 'firstname') ?></div>
    <div class="col"><?php echo $form->field($model, 'lastname') ?></div>
</div>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<?php echo $form->field($model, 'confirm')->passwordField() ?>

<button type="submit" class="btn btn-primary mt-2">Submit</button>
<?php \app\system\form\Form::end() ?>