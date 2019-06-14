<?php
namespace app\widgets;

use Yii;
use yii\helpers\Html;

/**
 * Created by Nick.
 * User: Nick
 * Date: 14.06.2019
 * Time: 15:51
 *
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * Yii::$app->session->setFlash('error', 'This is the message');
 * Yii::$app->session->setFlash('success', 'This is the message');
 * Yii::$app->session->setFlash('info', 'This is the message');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * Yii::$app->session->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 */
class ParticipantNominationTable extends \yii\base\Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - key: the name of the session flash variable
     * - value: the bootstrap alert type (i.e. danger, success, info, warning)
     */
    public $dataProvider;
    public $title = '';
    public $message = '';
    public $options = [];

    public function init()
    {
        parent::init();
        $data_arr = $this->processingData();
        $message = $this->allNominationBlock($data_arr);
//        $message = print_r($data_arr, true);
        $this->message = $message;
    }
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $message = sprintf( '<h2>%s</h2><div class="row">%s</div>', $this->title, $this->message );
        return $message;
    }

    private function processingData() {
        $models = $this->dataProvider->getModels();
//        $keys = $this->dataProvider->getKeys();
        $rows = [];
        foreach (array_values($models) as $index => $model) {
            $rows[$model->nomination->name][] = [
                'name' => $model->participant->fullName,
                'participant_id' => $model->participant_id,
                'nomination_id' => $model->nomination_id,
            ];
        }

        return $rows;
    }

    private function rowNominationBlock($column, $topic = ''){
        $controller_action = 'participant-nomination/view';
        $columns = '';
        $i = 1;
        foreach($column as $column_val) {
            $href = sprintf(
                '/%s?participant_id=%d&nomination_id=%d',
                $controller_action,
                $column_val['participant_id'],
                $column_val['nomination_id']
            );
            if ( empty( trim($column_val['name']) ) ) $column_val['name'] = sprintf( '<span style="color:red">%s</span>', Yii::t('app', 'No name ;)') );
            $cell = sprintf( '%d. <a href="%s">%s</a>', $i, $href, $column_val['name'] );
            $columns .= sprintf( '<div class="block-item">%s</div>', $cell );
            $i++;
        }
        $html = sprintf(
            '<div class="col-md-4"><div class="wrapper-block"><div class="block-title h3">%s</div>%s</div></div>',
            $topic,
            $columns
        );
        return $html;
    }

    private function allNominationBlock($arr, $topic = ''){
        $html_arr = [];
        foreach($arr as $titles => $column) {
            $html_arr[] = $this->rowNominationBlock($column, $titles);
        }
        return implode( '', $html_arr );
    }
}
