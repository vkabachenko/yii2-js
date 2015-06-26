<?php

namespace app\widgets\slider;

use yii\helpers\Html;
use yii\helpers\Json;


class Widget extends \yii\base\Widget
{
    /* @var $items array */
    /* List of items in carousel. Each item wraps with div.
    * The set of items wraps with div too*/
    public $items = [];

    /* @var $options array */
    /* the HTML attributes for the widget container div. */
    public $options = [];

    /* @var $clientOptions array */
    /* array the options for the underlying widget. */
    /* @see http://kenwheeler.github.io/slick/ */
    public $clientOptions = [];

    /* @var $clientEvents array */
    /* array the event handlers for the underlying widget. */
    /* @see http://kenwheeler.github.io/slick/ */
    public $clientEvents = [];

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
    }


    /**
     * Renders the widget.
     */
    public function run()
    {

        echo Html::beginTag('div', $this->options) . "\n";
        echo $this->renderItems() . "\n";
        echo Html::endTag('div') . "\n";
        $this->registerWidget();
    }

    /**
     * Renders widget items
     */
    private function renderItems()
    {

        $items = [];
        foreach ($this->items as $item) {
            $items[] = Html::tag('div',$item);
        }
        return implode("\n", $items);
    }


    /**
     * Registers widget with assets
     */
    private function registerWidget()
    {
        SliderAsset::register($this->getView());
        $this->registerClientEvents();
        $this->registerClientOptions();
    }

    /**
     * Registers widget events
     */
    private function registerClientEvents()
    {
        $id = $this->options['id'];
        if (!empty($this->clientEvents)) {
            $js = [];
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "$('#$id').on('$event',$handler);";
            }
            $this->getView()->registerJs(implode("\n", $js));
        }
    }

    /**
     * Registers widget options
     */
    private function registerClientOptions()
    {
        $id = $this->options['id'];
        $options = empty($this->clientOptions) ? '' : Json::htmlEncode($this->clientOptions);
        $js = "$('#$id').slick($options);";
        $this->getView()->registerJs($js);
    }

} 