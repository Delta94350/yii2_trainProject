<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title = 'Tzolk\'in - Authentification';

?>
<h1>Authentification </h1>
<br>

<?php

$form = ActiveForm::begin([
            'id' => 'loginForm',
            'action' => '/user/login',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-1 control-label'],
                ],
        ]);
?>

<?= $form->field($model, 'login'); ?>

<?= $form->field($model, 'password')->passwordInput(); ?>

<div class="form-group">
    <label class="col-lg-1 control-label" for="user-login">Mode</label>
    <div class="col-lg-3">
        <?= Html::dropDownList('authMode', 0, ['Default','LDAP-1', 'LDAP-2'], ['class' => 'form-control']); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
