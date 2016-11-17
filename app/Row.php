<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

/**
 * Description of Row
 * Set the row of the chessboard.
 *
 * @author Tim den Ouden
 */
//class Row extends Model {
class Row  {
    
    private $_cells;
    
    /* 
     * @param 
     * @return 
     */
    public function __construct() {
        $this->_cells = array();
    }
    
    /* 
     * @param $cell add an individual cell to this row.
     * @return 
     */
    public function append($cell) {
        $this->_cells[] = $cell;
    }
    
    /* 
     * @param 
     * @return A table row.
     */
    public function __toString() {
//        $output = '<tr>'.PHP_EOL;
        $output = '<tr>';
        
        foreach($this->_cells as $cell) {
            $output .= $cell;
        }
        
//        $output .= '</tr>'.PHP_EOL;
        $output .= '</tr>';
        
        return $output;
    }
    
}
