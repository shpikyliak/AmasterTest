<?php

/**
 * Class ChessBoard create checkmate board.
 *
 *
 * Create checkmate board from 3 colors, which save  colors offset for every cell in each row.
 *
 * @author Shpukyliak Olesakndr
 */
class ChessBoard
{
    private $rows;
    private $columns;
    private $colors = [
        "userColor" => "",
        "black" => "#0000000",
        "white" => "#FFFFFFF"
    ];
    private $board;


    /**
     * ChessBoard constructor, which saves all parameters and call buildBoard function.
     * @param $rows
     * @param $columns
     * @param $userColor
     *
     */

    public function __construct($rows, $columns, $userColor)
    {

        $this->rows = $rows;
        $this->columns = $columns;
        $this->colors['userColor'] = $userColor;
        $this->board = $this->buildBoard();
        echo $this->board;

    }

    /**
     * buildBoard creates html code with chess board and gives colors to cells
     *
     * @return string
     */
    private function buildBoard()
    {
        $board = "<table>";
        for ($i = 0; $i < $this->rows; $i++) {
            $board .= "<tr id='row" . ($i + 1) . "'>";
            for ($j = 0; $j < $this->columns; $j++) {
                $color = $this->getColor();
                $board .= "<td id='row" . ($i + 1) . "col" . ($j + 1) . "'  bgcolor='" . $color . "'></td>";
            }
            $board .= "</td>";
        }
        $board .= "</table>";
        return $board;
    }

    /**
     * @return mixed - value of needed color
     */
    private function getColor()
    {

        if (!each($this->colors)) {
            reset($this->colors);
            return current($this->colors);
        }

        return each($this->colors)['value'];

    }

}