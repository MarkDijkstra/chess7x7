<?php 

class Chessboard 
{
    private $board = [];
    private $totalQueens = 7;
    private $boardSize = 7;
    private $numberOfFields = 49;

    public function __construct()
    {
		for ($i = 0; $i < $this->totalQueens; $i++) {
			$this->board[$i] = array_fill(0, $this->totalQueens, 0);
		}
    }

    /**
     * Method oddOrEven
     *
     * @param int $i Increment
     * @return string
     */
    private function oddOrEven(int $i) : string
    {
        $oddEven = 'even';
        if ($i % 2 === 0) {
            $oddEven = 'odd';
        }
        return $oddEven;
    }

    /**
     * Method buildBoard
     *
     * @return void
     */
    public function buildBoard()
    {    
        $this->setPattern();           
        echo '<table class="chessboard">';
            for ($i = 1; $i <= $this->boardSize; $i++) {
                $row = $this->oddOrEven($i);
                echo '<tr class="'.$row.'">';              
                for ($ii = 1; $ii <= $this->boardSize; $ii++) {
                    $cell = $this->oddOrEven($ii);                
                    echo '<td class="'.$cell.'">';
                        echo '<div class="field">';
                            if ($this->board[$i-1][$ii-1] == 1) {
                                echo '<div class="piece">Queen</div>';
                            }
                        echo '</div>'; 
                    echo '</td>';
                }
            echo '</tr>';
            }
        echo '</table>';        
    }
	
	/**
	 * Method setPattern
	 *
	 * @param int $queenNumber Number of queens
	 * @param int $row Col index/increment
	 * @return void
	 */
	private function setPattern(int $numberOfQueens = 0, int $row = 0)
	{
		for ($col = 0; $col < $this->totalQueens; $col++) {
			if ($this->checkPossibilities($row, $col)) {
				$this->board[$row][$col] = 1;				
				if ($numberOfQueens === $this->totalQueens - 1 || $this->setPattern($numberOfQueens + 1, $row + 1) === true) { 
                    return true;
                }
				$this->board[$row][$col] = 0;
			}
		}		
		return false;
	}
	
	/**
	 * Method checkPossibilities
	 *
	 * @param int $row Row index/increment
	 * @param int $col Coll index/increment
	 * @return bool
	 */
	private function checkPossibilities(int $row, int $col) : bool
	{
		for ($i = 0; $i < $row; $i++) {
			if ($this->board[$i][$col] === 1) { 
                return false; 
            }
			$diaX = $row - 1 - $i;
			$diaY = $col - 1 - $i;
			if ($diaY >= 0 && $this->board[$diaX][$diaY] === 1) {
                return false;
            }
			$diaY = $col + 1 + $i;
			if ($diaY < $this->totalQueens && $this->board[$diaX][$diaY] === 1) { 
                return false; 
            }
		}		
		return true;
	}
}