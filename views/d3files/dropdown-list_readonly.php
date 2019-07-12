<?php

use d3yii2\d3files\widgets\D3FilesWidget;
use eaBlankonThema\widget\ThModal;
use yii\helpers\Html;

\d3yii2\d3files\D3FilesAsset::register($this);
/**
 * @var string $url_prefix
 * @var string $viewByFancyBox
 * @var array $fileList
 */

if (empty($fileList)) {
    return;
} ?>
<select class="form-control d3files-list th-dropdown-load">
    <option value="default" selected="selected"><?= Yii::t('d3files', 'Select attachment') ?></option>
    <?php

    foreach ($fileList as $row) {
        $ext = strtolower(pathinfo($row['file_name'], PATHINFO_EXTENSION));
        if ($viewByFancyBox && in_array($ext, $viewByFancyBoxExtensions, true)) {
            $fileUrl =         $fileUrl = [
                $url_prefix . 'd3filesopen',
                'id' => $row['file_model_id']
            ];

            $dataAttributes = D3FilesWidget::getModalLoadAttributes(
                $fileUrl,
                $row,
                '#' . ThModal::MODAL_ID,
                '.' . ThModal::MODAL_CONTENT_CLASS
            );

            $dataAttributesStr = '';

            foreach ($dataAttributes as $key => $val) {
                $dataAttributesStr .= ' ' . $key . '="' . $val . '"';
            } ?>
            <option value="<?= $row['file_name'] ?>"<?= $dataAttributesStr ?>><?= $row['file_name'] ?></option>
            <?php
        }
    }
    ?>
</select>
