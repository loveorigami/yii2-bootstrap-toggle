<?php
/**
 * @link https://github.com/loveorigami/yii2-bootstrap-toggle
 * @license http://opensource.org/licenses/BSD-3-Clause
 */
 
namespace lo\widgets;

use yii\helpers\Html;
use yii\widgets\InputWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * Toogle renders a checkbox type toggle switch control. For example:
 *
 * ```
 * <?= \lo\widgets\Toggle::widget([
 *      'name' => 'Test',
 *      'options' => [
 *          'data-size' => 'large',
 *      ]
 *  ]);?>
 * ```
 *
 * @author Andrey Lukyanov <loveorigami@mail.ru>
 * @link http://www.loveorigami.info
 * @package lo\widgets\Toogle
 */
class Toggle extends InputWidget
{
	/**
     * @var bool specifies whether the checkbox should be checked or unchecked, when not used with a model. If [[items]],
     * [[$checked]] will specify the value to select.
     */
    public $checked = false;
	
    /**
     * @var array the options for the Bootstrap Toogle plugin.
     * Please refer to the Bootstrap Toogle plugin Web page for possible options.
     * @see http://www.bootstraptoggle.com
     */
    public $options = [];
	
	 /**
     * @var array the default options for the widget.
     */
    protected $woptions = [
	'data-toggle' => 'toggle',
	'data-onstyle' => 'success',
	'data-offstyle' => 'danger',
	'label' => false,	
	];
	
    /**
     * @var array the event handlers for the underlying Bootstrap Toggle input JS plugin.
     * Please refer to the [Bootstrap Toggle](http://www.bootstraptoggle.com/#events) plugin
     * Web page for possible events.
     */
    public $clientEvents = [];
	
    /**
     * @var string the DOM element selector
     */ 
    protected $selector;
	
    /**
     * @var bool whether to display the label inline or not. Defaults to true.
     */
    public $inlineLabel = true;
	
	
    /**
     * Registers Bootstrap Switch plugin and related events
     */
    public function registerClientScript()
    {
        $view = $this->view;
        ToggleAsset::register($view);
        //$this->clientOptions['animate'] = ArrayHelper::getValue($this->clientOptions, 'animate', true);
        $options = Json::encode($this->options);
        $js[] = "jQuery('$this->selector').bootstrapToggle($options);";
        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "jQuery('$this->selector').on('$event', $handler);";
            }
        }
        $view->registerJs(implode("\n", $js));
    }

    public function run()
    {

	$this->options = ArrayHelper::merge($this->woptions, $this->options);

        if ($this->hasModel()) {
            $input = Html::activeCheckbox($this->model, $this->attribute, $this->options);
        } else {
            $input = Html::checkbox($this->name, $this->checked, $this->options);
        }
		
        echo $this->inlineLabel ? $input : Html::tag('div', $input);
        $this->selector = "#{$this->options['id']}";
		
        $this->registerClientScript();
		
    }
}
