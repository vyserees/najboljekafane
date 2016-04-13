<?php

/*
 * creation of tables
 * #params:
 *      $header - header of table settings, array of pairs <column_name> => <column_width_in_%>
 * #steps:
 *      inittable() - initialize table by constructing table frame and header($this->header must be entered!)
 *      addrow() - adding row(s). $values - array of values that will be added to every column of ONE row.
 *                                $colspan - string, <number_of_column_to_start>:<number_of_columns_to_merge>
 *                                          example: '2:3' will merge second, third and fourth column of current row('2' - statrt with second column; '3' - 3 columns to merge(2.,3.,4.)
 *      closetable() - closing construction of table
 *
 *
 */

class Tables {
    public $header = array();
    
    public function inittable(){
        $str = '<table class="table table-bordered"><tr>';
        foreach($this->header as $key=>$value){
            $str .= '<th width="'.$value.'">'.$key.'</th>';
        }
        $str .= '</tr>';
        echo $str;
    }
    public function addrow($values,$colspan=null){
        $str .= '<tr>';
        $c = 1;
        if(null!==$colspan){$cs = explode(':', $colspan);}else{$cs = array('');}
        foreach($values as $val){
            $str .= '<td';
            if($cs[0]!==''&&$cs[0]==$c){
                $str .= ' colspan="'.$cs[1].'">';
            }else{
                $str .= '>';
            }
            $str .= $val.'</td>';
            $c++;
        }
        $str .= '</tr>';
        echo $str;
    }
    public function closetable(){
        echo '</table>';
    }
}