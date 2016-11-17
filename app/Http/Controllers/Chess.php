<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

use App\Chessboard;
use App\Row;
use App\Cell;
use App\Queen;

/**
 * Description of Chess
 * A controller class for displaying chessboards
 * 
 * @author Tim den Ouden
 */
class Chess extends Controller {
    
    var $cells;
    var $rows;
    var $boards;
    var $queen;
    var $viewBoards;
    
    /* constructor for this Chess class
     */
    public function __construct() {
        
        /* create a new queen and give her a start position
         */
//        $queen = new Queen(1, 1);   // e.g. A1
//        $queen = new Queen(6, 5);   // e.g. F5
//        $queen = new Queen(4, 2);   // e.g. F5
        
        $res = array();
        // for each possible chessboard cell we create a new queen.
        for( $r=1;$r<=7;$r++) {
            
            for( $c=1; $c<=7; $c++ ) {
                $queen = new Queen( $r,$c );

                if( $queen->otherQueens == 6 ) {
                    $res[] = $queen->_arrTable;
                }
            }
            
        }
        

        /* Create all rows and corresponding cells for the table.
         */
         foreach( $res as $k => $tableRows ) {
             foreach( $tableRows AS $s => $tableCell ) {
                 $this->rows[$s] = new Row( );

                 foreach( $tableCell as $u => $cellValue ) {
                     if( $cellValue == TRUE ) {
                         $this->rows[$s]->append( new Cell( 'Queen' ) );
                     }
                     else {
                         $this->rows[$s]->append( new Cell( '&nbsp;' ) );
                     }
                 }
                 
             }
             
            /* create new chessboard
            */
            $this->boards = new Chessboard(  );

            /* Add rows ( and cells ) to the new board
            */
            foreach( $this->rows as $row ) {
                $this->boards->append($row);
            }
             
            $this->viewBoards[] = $this->boards;
        }
        
        
    }
    
    /* 
     * @param 
     * @return 
     */
    public function index() {

//        foreach( $this->viewBoards as $k => $board ) {
//            echo $board;
//            echo "<hr>";
//        }
//die( );
        
//        return view('chessboard', array('title' => 'Tim Time', 'boards' => $this->boards ) );
        return view('chessboard', array('title' => 'Tim Time', 'boards' => $this->viewBoards ) );
    }
    
    
    
    
}
