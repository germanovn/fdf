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
    public $caption = '';
    public $message = '';
    public $participants = [];
    public $options = [
        'controller_action' => 'nomination-tournament/view',
    ];

    public function init()
    {
        parent::init();
        $data_arr = $this->processingData();
        $message = '';
//        $message .= sprintf( '<pre>%s</pre>', print_r($data_arr, true) );
        $message .= $this->buildTable($data_arr);
        $this->message = $message;
    }
    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $this->options['class'][] = 'tournament-grid';
        $class = implode( ' ', $this->options['class'] );
        $message = sprintf( '<div class="%s">%s</div>', $class, $this->message );
        return $message;
    }

    private function processingData() {
        $model = $this->model;
        $rows = [];
        $nominations_names = [];
        $nominations = $model->nominations;

        // полчуить все номинации
        if ( is_array( $nominations ) ) {
            if ( !empty( $nominations ) ) {
                foreach ($nominations as $nominations_model)
                    $nominations_names[$nominations_model->name] = [
                        'value' => false,
                        'link'  => '',
                        'nomination_id' => $nominations_model->id
                    ];

                // создать матрицу номинаций - участников
                foreach ($nominations as $nominations_model)
                    foreach ( $nominations_model->participants as $participant_model ) {
                        foreach ( $nominations_names as $nominations_name_key => $nominations_name_val ) {
                            $nominations_name_val['participant_id'] = $participant_model->id;
                            $link_nominations_names[$nominations_name_key] = $nominations_name_val;
                        }
                        $rows[$participant_model->id] = $link_nominations_names;
                        $this->participants[$participant_model->id] = [
                            'value' => $participant_model->fullName,
                            'link'  => sprintf( '/participant/view?id=%d', $participant_model->id ),
                        ];
                    }

                // заполнить матрицу
                foreach ($nominations as $index_1 => $nominations_model)
                    foreach ($nominations_model->participants as $index => $participant_model)
                        $rows[$participant_model->id][$nominations_model->name] = [
                            'value' => true,
                            'link'  => sprintf( '/participant-nomination/view?nomination_id=%d&participant_id=%d', $nominations_model->id, $participant_model->id ),
                        ];
            }
            else {
                $rows = 'Empty Tournament. Please add nominations.';
            }
        }
        else {
            $rows = 'Nominations is not array';
        }

        return $rows;
    }

    private function buildCell($column, $options, $is_head = false ){

        if ( empty($options[ 'cell_class' ]) ) $cell_class = '';
        else $cell_class = sprintf( ' class="%s"', $options[ 'cell_class' ] );

        if ( is_array( $column ) ) {

//            if ( is_bool($column['value']) ) $value = $column['value'] ? '+' : '-';
            if ( is_bool($column['value']) ) $value = Html::checkbox( 'participant-nomination', $column['value'], ['class' => $options[ 'cell_class' ]] );
            else $value = $column['value'];

//            if ( empty($column['link']) )
//                $column['link'] = $cell_link = sprintf( '/participant-nomination/create?nomination_id=%d&participant_id=%d', $column['nomination_id'], $column['participant_id'] );
//                  Html::a('', ['/example/pjax/pjax-example-6', 'vote' => 'up'], ['class' => 'btn btn-lg btn-warning glyphicon glyphicon-arrow-up'])
//            $cell = sprintf( '<a href="%s"%s>%s</a>', $column['link'], $cell_class, $value );

            $cell = sprintf( '<label%s>%s</label>', $cell_class, $value );

//            $cell = $value;
        }
        else $cell = sprintf( '<span%s>%s</span>', $cell_class, $column );

//        if($is_head) $html = sprintf( '<th%s>%s</th>', $cell_class, $cell );
//        else $html = sprintf( '<td%s>%s</td>', $cell_class, $cell );

        if($is_head) $html = sprintf( '<th>%s</th>', $cell );
        else $html = sprintf( '<td>%s</td>', $cell );

        return $html;
    }

    private function buildHeadRow($row, $options, $is_head = false ){

        $rows_arr[] = $this->buildCell('', $options, true);

        foreach($row as $field_name => $column) {
            $rows_arr[] = $this->buildCell($field_name, $options, $is_head);
        }

        return sprintf( '<tr>%s</tr>', implode( '', $rows_arr ) );
    }

    private function buildRow($row, $options, $is_head = false ){

        $rows_arr[] = $this->buildCell( $this->participants[ $options['name_row'] ], $options, true );

        foreach($row as $field_name => $column) {
            if ( $column['value'] ) $rows_arr[] = $this->buildCell($column, [ 'cell_class' => $this->options['true_cell_class'] ], $is_head);
            else $rows_arr[] = $this->buildCell($column, [ 'cell_class' => $this->options['false_cell_class'] ], $is_head);
        }

        return sprintf( '<tr>%s</tr>', implode( '', $rows_arr ) );
    }

    private function buildTable($data){
        $html_arr = [];
        $num = 1;
        $caption = sprintf( '<caption>%s</caption>', $this->caption );
        $table_class = sprintf( ' class="%s"', $this->options['table_class'] );

        if ( is_array( $data ) ) {
            foreach ( $data as $name_row => $row ) {
                $options = [
                    'num' => $num,
                    'name_row' => $name_row
                ];
                if ($num === 1) $html_head = sprintf( '<thead>%s</thead>', $this->buildHeadRow( $row, $options, true ) );
                $html_arr[] = $this->buildRow( $row, $options, false );
                $num++;
            }

            return sprintf( '<table%s>%s%s<tbody>%s</tbody></table>', $table_class, $caption, $html_head, implode('', $html_arr) );
        }
        else {
            return sprintf( '%s<div class="alert alert-warning">%s</div>', $caption, $data );
        }
    }
}
