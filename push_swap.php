<?php

$print = "";

function sa(array &$la)
{
    GLOBAL $print;
    if (count($la) >= 2 && $la[0] > $la[1]) 
    {
        $temp = $la[0];
        $la[0] = $la[1];
        $la[1] = $temp;
        return $la;
    }
}

function sb(array &$lb)
{
    GLOBAL $print;
    if (count($lb) >= 2 && $lb[0] > $lb[1]) 
    {
        $temp = $lb[0];
        $lb[0] = $lb[1];
        $lb[1] = $temp;
        $print .= "sb ";
        return $lb;
    }
}

function sc(array &$la, array &$lb)
{
    sa($la);
    sb($lb);
}

function pa(array &$lb, array &$la) 
{
    GLOBAL $print;
     if (count($lb) >= 1 ) 
    {
        $firstitem = array_shift($lb);
        array_unshift($la, $firstitem);
        $print .= "pa ";
        return $la;
    }   
}

function pb(array &$la, array &$lb) 
{
    GLOBAL $print;
     if (count($la) >= 1) 
    {
        $firstitem = array_shift($la);
        array_unshift($lb, $firstitem);
        $print .= "pb ";
        return $lb;
    }   
}

function ra(array &$la)
{
    GLOBAL $print;
    if (count($la) >= 2) 
    {
        array_push($la, $la[0]);
        array_shift($la);
        $print .= "ra ";
        return $la;
    }
}

function rb(array &$lb)
{
    GLOBAL $print;
    if(count($lb) >= 2)
    {
        array_push($lb, $lb[0]);
        array_shift($lb);
        $print .= "rb ";
        return $lb;
    }
}

function rr(array &$la,array &$lb)
{
    ra($la);
    rb($lb);
}

function rra(array &$la)
{
    GLOBAL $print;
    if(count($la) >= 2)
    {
        array_unshift($la, end($la));
        array_pop($la);
        $print .= "rra ";
        return $la;
    }
}

function rrb(array &$lb)
{
    GLOBAL $print;
    if(count($lb) >= 2)
    {
        array_unshift($lb, end($lb));
        array_pop($lb);
        $print .= "rrb ";
        return $lb;
    }
}

function rrr(array &$la, array &$lb)
{
    rra($la);
    rrb($lb);
}

function argv_to_la($argv)
{
    $la = array();
    foreach ($argv as $value) {
        array_push($la,(int) $value);
    }
    array_shift($la);
    return $la;
}

function arraySorted($array) {
    $a = $array;
    $b = $array;
    sort($b);
    if ($a == $b){
        return true;
    } else {
        return false;
    }
}


function main($argv)
{
    $la = argv_to_la($argv);
    $lb = array();
    $i = 0;
    $j = 0;
    $size_array = count($la);
    if(!arraySorted($la))
    {
        while ($i < $size_array) {
            while ($j < $size_array) {
                pb($la, $lb);
                $j++;
            }
            while ($lb[0] != max($lb)) {
                rb($lb);

            }
            if ($lb[0] == max($lb)) {
                pa($lb, $la);
            }
            $i++;
        }
    GLOBAL $print;
    echo trim($print);
    }
    echo "\n";
}
main($argv);

?>