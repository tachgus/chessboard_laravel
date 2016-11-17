<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

/**
 * Description of Chessboard
 * Draw the chessboard.
 *
 * @author Tim den Ouden
 */
//class Chessboard extends Model {
class Chessboard  {
    
    private $_rows;
    
    /* 
     * @param 
     * @return 
     */
    public function __construct() {
        $this->_rows = array();
    }
    
    /*
     * @param  array  $row
     * @return void
     */
    public function append($row) {
        $this->_rows[] = $row;
    }

    /* outputs a complete table/ chessboard
     * @param
     * @return $output
     */
    public function __toString() {
//        $output = '<table border="1">'.PHP_EOL;
//        $output = '<table>'.PHP_EOL;
        $output = '<table border="1">';
        
        foreach($this->_rows as $row) {
            $output .= $row;
        }
        
//        $output .= '</table>'.PHP_EOL;
        $output .= '</table>';
        
        return $output;
    }
    
    
}
