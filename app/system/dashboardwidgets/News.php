<?php

namespace System\DashboardWidgets;

use Admin\Classes\BaseDashboardWidget;
use DOMDocument;

/**
 * TastyIgniter news dashboard widget.
 */
class News extends BaseDashboardWidget
{
    /**
     * @var string A unique alias to identify this widget.
     */
    protected $defaultAlias = 'news';

    public $newsRss = 'https://feeds.feedburner.com/Tastyigniter';

    public function render()
    {
        $this->prepareVars();

        return $this->makePartial('news/news');
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'label' => 'admin::lang.dashboard.label_widget_title',
                'default' => 'admin::lang.dashboard.text_news',
            ],
            'newsCount' => [
                'label' => 'admin::lang.dashboard.text_news_count',
                'default' => 5,
                'type' => 'select',
                'options' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10],
            ],
        ];
    }

    protected function prepareVars()
    {
        $this->vars['newsRss'] = $this->createRssDocument();
    }

    public function createRssDocument()
    {
        return class_exists('DOMDocument', false) ? new DOMDocument() : null;
    }
}
