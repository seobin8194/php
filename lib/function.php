<?php
    function print_string(){
            echo "<p>안녕</p>";
    }

    function print_sum($x, $y){
        //{}안에서 연산은 불가
        echo "<p>{$x} + {$y} = ".($x + $y)."</p>";
    }

    function get_sum($x, $y){
        return $x + $y;
    }
?>