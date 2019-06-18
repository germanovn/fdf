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
        $message = sprintf( '<h2>%s</h2><div>%s</div>', $this->title, $this->message );
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
                    $nominations_names[$nominations_model->name] = ' - ';

                // создать матрицу номинаций - участников
                foreach ($nominations as $nominations_model)
                    foreach ($nominations_model->participants as $participant_model)
                        $rows[$participant_model->id] = $nominations_names;

                // заполнить матрицу
                foreach ($nominations as $index_1 => $nominations_model)
                    foreach ($nominations_model->participants as $index => $participant_model)
                        $rows[$participant_model->id][$nominations_model->name] = $participant_model->fullName;
            }
            else {
                $rows = 'Empty Tournament';
            }
        }
        else {
            $rows = 'Not array';
        }

        return $rows;
    }

    private function buildCell($column, $options, $is_head = false ){
        $cell = sprintf( '%s', $column );

        if($is_head) $html = sprintf( '<th>%s</th>', $cell );
        else $html = sprintf( '<td>%s</td>', $cell );

        return $html;
    }

    private function buildHeadRow($row, $options, $is_head = false ){
        $rows_arr[] = $this->buildCell('', $options, true);
        foreach($row as $field_name => $column) {
            $rows_arr[] = $this->buildCell($field_name, $options, true);
        }

        return sprintf( '<tr>%s</tr>', implode( '', $rows_arr ) );
    }

    private function buildRow($row, $options, $is_head = false ){
        $rows_arr[] = $this->buildCell($options['num'], $options, true);
        foreach($row as $field_name => $column) {
            $rows_arr[] = $this->buildCell($column, $options);
        }

        return sprintf( '<tr>%s</tr>', implode( '', $rows_arr ) );
    }

    private function buildTable($data){
        $options = [];
        $html_arr = [];
        $num = 1;
        if ( is_array( $data ) ) {
            foreach ( $data as $titles => $row ) {
                $options = [ 'num' => $num ];
                if ($num === 1) $html_head = sprintf( '<thead>%s</thead>', $this->buildHeadRow( $row, $options, $num === 1 ) );
                $html_arr[] = $this->buildRow( $row, $options );
                $num++;
            }

            $table_class = sprintf(' class="%s"', $this->options['table_class']);

            return sprintf('<table%s>%s<tbody>%s</tbody></table>', $table_class, $html_head, implode('', $html_arr));
        }
        else {
            return sprintf( '<div class="alert alert-info">%s</div>', $data );
        }
    }
}
