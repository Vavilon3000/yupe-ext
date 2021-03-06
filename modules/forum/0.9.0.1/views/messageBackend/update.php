<?php
$this->breadcrumbs = [
    Yii::t('ForumModule.forum', 'Forums') => ['/forum/forumBackend/index'],
    Yii::t('ForumModule.forum', 'Messages') => ['index'],
    $model->id => ['/forum/messageBackend/view', 'id' => $model->id],
    Yii::t('ForumModule.forum', 'Change'),
];

$this->pageTitle = Yii::t('ForumModule.forum', 'Messages - edit');

$this->menu = array_merge(
    Yii::app()->getModule('forum')->getNavigation(),
    [
        ['label' => Yii::t('ForumModule.forum', 'Forum') . ' «' . mb_substr($model->id, 0, 32) . '»'],
        ['icon' => 'pencil', 'label' => Yii::t('ForumModule.forum', 'Change message'), 'url' => [
            '/forum/messageBackend/update',
            'id' => $model->id
        ]],
        ['icon' => 'eye-open', 'label' => Yii::t('ForumModule.forum', 'View message'), 'url' => [
            '/forum/messageBackend/view',
            'id' => $model->id
        ]],
        ['icon' => 'trash', 'label' => Yii::t('ForumModule.forum', 'Remove message'), 'url' => '#', 'linkOptions' => [
            'submit' => ['/forum/messageBackend/delete', 'id' => $model->id],
            'params' => [Yii::app()->getRequest()->csrfTokenName => Yii::app()->getRequest()->csrfToken],
            'confirm' => Yii::t('ForumModule.forum', 'Do you really want to remove message?'),
            'csrf' => true,
        ]],
    ]
);
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('ForumModule.forum', 'Change message'); ?><br />
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>
