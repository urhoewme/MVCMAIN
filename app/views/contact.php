<?php
/** @var $model app\app\models\ContactForm */

use app\system\form\TextareaField;

$this->title = 'Contact Us';
?>

<h1>Contact Us</h1>

<?php $form = \app\system\form\Form::begin('', 'post') ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'body')?>
<button type="submit" class="btn btn-primary mt-2">Submit</button>
<?php \app\system\form\Form::end(); ?>

