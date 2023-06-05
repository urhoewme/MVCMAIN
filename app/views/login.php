<?php
/** @var $model \app\app\models\User */


$this->title = 'Log In';

?>

<h1>Log In</h1>
<?php $form = \app\system\form\Form::begin('', "post") ?>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password')->passwordField() ?>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
<?php \app\system\form\Form::end() ?>