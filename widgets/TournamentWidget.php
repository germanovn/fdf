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
class TournamentWidget extends \yii\base\Widget
{
    public $model;
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
        $message = sprintf( '<h2>%s</h2><div>%s</div>', $this->title, $this->message );
        return $message;
    }

    private function processingData() {
        $model = $this->model;
        $rows = [];
//        foreach( $model->nomination->participants as $participant_nodel ) {
//            $rows[] = [
//                $model->nomination->name => $participant_nodel->fullName,
//            ];
//        }

        return $rows;
    }

    private function buildCell($column, $num, $is_head = false ){
        $cell = sprintf( '%s', $column );

        if($is_head) $html = sprintf( '<th>%s</th>', $cell );
        else $html = sprintf( '<td>%s</td>', $cell );

        return $html;
    }

    private function buildHeadRow($row, $num, $is_head = false ){
        $rows_arr = [];
        foreach($row as $field_name => $column) {
            $rows_arr[] = $this->buildCell($field_name, $num, true);
            $num++;
        }

        return sprintf( '<tr>%s</tr>', implode( '', $rows_arr ) );
    }

    private function buildRow($row, $num, $is_head = false ){
        $rows_arr = [];
        foreach($row as $field_name => $column) {
            $rows_arr[] = $this->buildCell($column, $num);
            $num++;
        }

        return sprintf( '<tr>%s</tr>', implode( '', $rows_arr ) );
    }

    private function buildTable($arr){
        $html_arr = [];
        $num = 1;
        foreach($arr as $titles => $row) {
            if ( $num === 1 ) $html_head = sprintf( '<thead>%s</thead>', $this->buildHeadRow( $row, $num, $num === 1 ) );
            $html_arr[] = $this->buildRow( $row, $num );
            $num++;
        }

        return sprintf( '<table class="table table-striped table-hover">%s<tbody>%s</tbody></table>', $html_head, implode( '', $html_arr ) );
    }
}
