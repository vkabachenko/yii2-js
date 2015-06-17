<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\States;

/* @var $model States */
/* @var $id_country integer */

if ($model) :
?>
<?php
    $action = $model->isNewRecord ? ['create-state','id_country' => $id_country,]
              : ['update-state'];

    $form = ActiveForm::begin([
        'action' => $action,
        'id' => 'state-form',
        'options' => ['data-pjax' => ''],
    ]);

           echo $form->field($model, 'name')->label('Edit state/region');
           echo $form->field($model, 'id')->hiddenInput()->label(false);

           echo Html::beginTag('p');
               echo Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit', 'value' => 'submit',]);
               echo Html::submitButton('Discard', ['class' => 'btn btn-primary', 'name' => 'discard', 'value' => 'discard','style' => 'margin-left:100px;']);
           echo Html::endTag('p');

        if (!$model->isNewRecord) {
           echo Html::beginTag('p');
               echo Html::submitButton('&lt;', ['class' => 'btn btn-default', 'name' => 'prev', 'value' => 'prev', 'data-tooltip' => 'Previous item']);
               echo Html::submitButton('--', ['class' => 'btn btn-default', 'name' => 'del', 'value' => 'del', 'data-confirm' => 'Delete selected item?', 'data-tooltip' => 'Delete item']);
               echo Html::submitButton('&gt;', ['class' => 'btn btn-default', 'name' => 'next', 'value' => 'next','data-tooltip' => 'Next item']);
           echo Html::endTag('p');
        }

    ActiveForm::end();
?>

<?php endif; ?>

    <p>
        <?php if ((!$model || !$model->isNewRecord)) : ?>
            <?= Html::a('+',
                ['ajax/create-state','id_country' => $id_country,],
                ['class' => 'btn btn-default','data-tooltip' => 'New item']); ?>
        <?php endif; ?>
    </p>

<div>
    <?= kartik\alert\AlertBlock::widget(); ?>
</div>



