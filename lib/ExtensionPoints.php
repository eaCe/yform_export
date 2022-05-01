<?php

namespace YFormExport;

class ExtensionPoints
{
    /**
     * add export button
     * @param \rex_extension_point $ep
     * @return void
     * @throws \rex_exception
     */
    public static function YFORM_DATA_LIST_LINKS(\rex_extension_point $ep): void {
        $linkSets = $ep->getSubject();
        /** @var \rex_yform_manager_table $table */
        $table = $ep->getParams()['table'];

        $linkParams = [
            'func' => 'yform_table_export',
            'table' => $table->getTableName(),
        ];

        $item = [];
        $item['label'] = '<i class="fa fa-file" aria-hidden="true"></i>&nbsp;&nbsp;' . \rex_i18n::msg('yform_manager_export');
        $item['url'] = \rex_url::currentBackendPage() . '&' . http_build_query($linkParams);
        $item['attributes']['class'][] = 'btn-info';
        $item['attributes']['id'] = 'yform-export-table';
        $item['attributes']['download'] = '';

        /** add export button to table links */
        $linkSets['table_links'][] = $item;
        $ep->setSubject($linkSets);
    }
}