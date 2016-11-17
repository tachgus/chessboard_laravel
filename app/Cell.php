<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

/**
 * Description of Cell
 * Set the cells for the chessboard.
 * 
 * @author Tim den Ouden
 */
//class Cell extends Model {
class Cell  {
    
    protected $_content;
    
    /* 
     * @param $content The cell content
     * @return void
     */
    public function __construct($content) {
        $this->_content = $content;
    }
    
    /* 
     * @param 
     * @return A table cell
     */
    public function __toString() {
//        return '<td>'.$this->_content.'</td>'.PHP_EOL;
        return '<td>'.$this->_content.'</td>';
    }
    
}
