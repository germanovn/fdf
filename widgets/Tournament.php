<?php
namespace app\widgets;

use Yii;
use yii\helpers\Html;

/**
 * Created by Nick.
 * User: Nick
 * Date: 14.06.2019
 * Time: 19:40
 */
class Tournament extends \yii\base\Widget
{
    public $dataProvider;
    public $title = '';
    public $message = '';
    public $options = [
        'controller_action' => 'participant-nomination/view',
    ];

    public function init()
    {
        parent::init();
        $data_arr = $this->processingData();
        $message = $this->buildTable($data_arr);
//        $message = sprintf( '<pre>%s</pre>', print_r($data_arr, true) );
        $this->message = $message;
    }
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $message = sprintf( '<h2>%s</h2><div class="table">%s</div>', $this->title, $this->message );
        return $message;
    }

    private function processingData() {
//        $models = $this->dataProvider->getModels();
////        $keys = $this->dataProvider->getKeys();
//        $rows = [];
//        foreach (array_values($models) as $index => $model) {
//            $rows[$model->nomination->name][] = [
//                'name' => $model->participant->fullName,
//                'participant_id' => $model->participant_id,
//                'nomination_id' => $model->nomination_id,
//            ];
//        }

        $rows = [
            [
                'name' => '+++',
                'value' => '123',
                'test' => '000',
            ],
            [
                'name' => '+++',
                'value' => '123',
                'test' => '000',
            ]
        ];

        return $rows;
    }

    private function buildCell($column, $num, $is_head = false ){
        $cell = sprintf( '%s', $column );

        if($is_head) $html = sprintf( '<th>%s</th>', $cell );
        else $html = sprintf( '<td>%s</td>', $cell );

        return $html;
    }

    private function buildRow($row, $topic = ''){
        $rows_arr = [];
        $num = 1;
        foreach($row as $field_name => $column) {
            if( $num === 1 ) $rows_arr[] = $this->buildCell($field_name, $num, true);
            $rows_arr[] = $this->buildCell($column, $num);
            $num++;
        }

        return sprintf( '<tr>%s</tr>', implode( '', $rows_arr ) );
    }

    private function buildTable($arr, $topic = ''){
        $html_arr = [];
        foreach($arr as $titles => $row) {
            $html_arr[] = $this->buildRow($row, $titles);
        }
        ;
        return sprintf( '<table>%s</table>', implode( '', $html_arr ) );
    }
}
