<?php

namespace App;

/**
 * Description of Queen
 *
 * @author Tim den Ouden
 */
class Queen {
    
    public $positionX;
    public $positionY;
    
    public $_arrTable;
    
    public $otherQueens;
    
    public function __construct( $x, $y ) {
        
        $this->positionX = $x;
        $this->positionY = $y;
        
        $this->otherQueens = 0;
        
        /* Create all table rows with cells.
         */
        for( $r=1;$r<=7;$r++) {
            
            for( $c=1; $c<=7; $c++ ) {
                if( $r == $this->positionX && $c == $this->positionY ) {
                    $this->_arrTable[$r][$c] = TRUE;
                }
                else {
                    $this->_arrTable[$r][$c] = FALSE;
                }
                
            }
            
        }
        

        $this->getOtherQueens( $this->_arrTable );

    }
    
    /* Check for other queens against a given cell.
     * 
     * @param $table The table wich holds the queens..
     * @return void
     */
    public function getOtherQueens( $table ) {
        
//        foreach( $this->_arrTable as $row => $column ) {
        foreach( $table as $row => $column ) {
            
            foreach( $column as $col => $blnQueen ) {
                if( $blnQueen == FALSE ) {
                    
                    // Check for existing queen in all directions
                    if( $this->calculateNorth( $row, $col ) == FALSE ) {
                        if( $this->calculateEast( $row, $col ) == FALSE ) {
                            if( $this->calculateSouth( $row, $col ) == FALSE ) {
                                if( $this->calculateWest( $row, $col ) == FALSE ) {
                                    if( $this->calculateNorthEast( $row, $col ) == FALSE ) {
                                        if( $this->calculateSouthEast($row, $col) == FALSE ) {
                                            if( $this->calculateSouthWest($row, $col) == FALSE ) {
                                                if( $this->calculateNorthWest($row, $col) == FALSE ) {
                                                    // Yep! set new queen :)
                                                    $this->_arrTable[$row][$col] = TRUE;
                                                    $blnQueen = TRUE;
//                                                    echo "New queen added at: $row | $col<br>";
                                                    $this->otherQueens++;
                                                    $this->getOtherQueens( $this->_arrTable );
                                                }
                                                else {
//                                                    echo "Get one to the north-west of me! $row | $col<br>";
                                                }
                                            }
                                            else {
//                                                echo "Get one to the south-west of me! $row | $col<br>";
                                            }
                                        }
                                        else {
//                                            echo "Get one to the south-east of me! $row | $col<br>";
                                        }
                                    }
                                    else {
//                                        echo "Get one to the north-east of me! $row | $col<br>";
                                    }
                                }
                                else {
//                                    echo "Get one to the west of me! $row | $col<br>";
                                }
                            }
                            else {
//                                echo "Get one at south side of me! $row | $col<br>";
                            }
                        }
                        else {
//                            echo "Got one at east side of me! $row | $col<br>";
                        }
                    }
                    else {
//                        echo "Got one up north of me! $row | $col<br>";
                    }
                    
                    
                }
                else {
//                    echo "Already got a queen at: $row | $col<br>";
                }
            }
            
            
        }

    }
    
    /* Check if there already exists a queen north of $row and $col
     * 
     * @param $row The x-position of a cell
     * @param $col The y-position of a cell
     * 
     * @return TRUE on existense, FALSE otherwise
     */
    public function calculateNorth( $row, $col ) {
        
        if( $row >= 1 ) {
            
            for( $i=$row; $i>=1; $i--) {
                if( $this->_arrTable[$i][$col] == TRUE ) {
                    return TRUE;
                    break;
                }
            }
            
        }
        
        return FALSE;
    }
    
    /* Check if there already exists a queen east of $row and $col
     * 
     * @param $row The x-position of a cell
     * @param $col The y-position of a cell
     * 
     * @return TRUE on existense, FALSE otherwise
     */
    public function calculateEast( $row, $col ) {
        
        if( $col <= 7 ) {
            
            for( $i= $col; $i<=7; $i++) {
                
                if( $this->_arrTable[$row][$i] == TRUE ) {
                    return TRUE;
                    break;
                }
                
            }
            
        }
        
        return FALSE;
    }
    
    
    /* Check if there already exists a queen south of $row and $col
     * 
     * @param $row The x-position of a cell
     * @param $col The y-position of a cell
     * 
     * @return TRUE on existense, FALSE otherwise
     */
    public function calculateSouth( $row, $col ) {
        
        if( $row <= 7 ) {
            
            for( $i=$row; $i<=7; $i++) {
                
                if( $this->_arrTable[$i][$col] == TRUE ) {
                    return TRUE;
                    break;
                }
                
            }
            
        }
        
        return FALSE;
        
    }
    
    /* Check if there already exists a queen west of $row and $col
     * 
     * @param $row The x-position of a cell
     * @param $col The y-position of a cell
     * 
     * @return TRUE on existense, FALSE otherwise
     */
    public function calculateWest( $row, $col ) {
        
        if( $col >= 1 ) {
            
            for( $i=$col; $i>=1; $i-- ) {
                
                if( $this->_arrTable[$row][$i] == TRUE ) {
                    return TRUE;
                    break;
                }
                
            }
            
        }
        
        return FALSE;
        
    }
    
    /* Check if there already exists a queen north-east of $row and $col
     * 
     * @param $row The x-position of a cell
     * @param $col The y-position of a cell
     * 
     * @return TRUE on existense, FALSE otherwise
     */
    public function calculateNorthEast( $row, $col ) {
        
        if( $row >= 1 && $row <= 7 && $col <= 7 && $col > 0 ) {
            if( $this->_arrTable[$row][$col] == TRUE ) {
                return TRUE;
            }
            else {
                $row = $row - 1;
                $col = $col + 1;
                return $this->calculateNorthEast($row, $col);
            }
                    
        }
        
        return FALSE;
    }
    
    /* Check if there already exists a queen south-east of $row and $col
     * 
     * @param $row The x-position of a cell
     * @param $col The y-position of a cell
     * 
     * @return TRUE on existense, FALSE otherwise
     */
    public function calculateSouthEast( $row, $col ) {
        
        if( $row <= 7 && $col <= 7 ) {
                        
            if( $this->_arrTable[$row][$col] == TRUE ) {
                return TRUE;
            }
            else {
                $row = $row + 1;
                $col = $col + 1;
                return $this->calculateSouthEast($row, $col);
            }

        }
        
        return FALSE;
        
    }
    
    /* Check if there already exists a queen south-west of $row and $col
     * 
     * @param $row The x-position of a cell
     * @param $col The y-position of a cell
     * 
     * @return TRUE on existense, FALSE otherwise
     */
    public function calculateSouthWest( $row, $col ) {
        
        if( $row >= 1 && $row <= 7 && $col <= 7 && $col > 0 ) {
                        
            if( $this->_arrTable[$row][$col] == TRUE ) {
                return TRUE;
            }
            else {
                $row = $row + 1;
                $col = $col - 1;
                return $this->calculateSouthWest($row, $col);
            }
        }
        
        return FALSE;
        
    }
    
    
    /* Check if there already exists a queen north-west of $row and $col
     * 
     * @param $row The x-position of a cell
     * @param $col The y-position of a cell
     * 
     * @return TRUE on existense, FALSE otherwise
     */
    public function calculateNorthWest( $row, $col ) {
        
        if( $row >= 1 && $col >= 1 ) {
            
            if( $this->_arrTable[$row][$col] == TRUE ) {
                return TRUE;
            }
            else {
                $row = $row - 1;
                $col = $col - 1;
                return $this->calculateNorthWest($row, $col);
                
            }
        }
        
        return FALSE;
        
    }
    
}
