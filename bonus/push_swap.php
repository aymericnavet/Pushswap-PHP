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
        $loading = implode(" - ", $la);
        echo "\e[33mLA : " . $loading . "\e[0m" ."\n";
        usleep(100000);
        $print .= "sa ";
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
        $loading = implode(" - ", $lb);
        echo "\e[34mLB : " . $loading .  "\e[0m" ."\n";
        usleep(100000);
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
        $loading = implode(" - ", $lb);
        echo "\e[34mLB : " . $loading .  "\e[0m" ."\n";
        usleep(100000);
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
        $loading = implode(" - ", $la);
        echo "\e[33mLA : " . $loading . "\e[0m"."\n";
        usleep(100000);
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
        $loading = implode(" - ", $la);
        echo "\e[33mLA : " . $loading . "\e[0m" ."\n";
        usleep(100000);
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
        $loading = implode(" - ", $lb);
        echo "\e[34mLB : " . $loading . "\e[0m" ."\n";
        usleep(100000);
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
        $loading = implode(" - ", $la);
        echo "\e[33mLA : " . $loading . "\e[0m" ."\n";
        usleep(100000);
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
        $loading = implode(" - ", $lb);
        echo "\e[34mLB : " . $loading . "\e[0m" ."\n";
        usleep(100000);
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
    echo "\e[31m----------------------RESULT----------------------\e[0m"."\n";
    $loading = implode(" - ", $la);
    echo "\e[35mLA : ". $loading. "\e[0m" ."\n";
    GLOBAL $print;
    echo "\e[32m".trim($print)."\e[0m"."\n";
    echo "\e[31m--------------------------------------------------\e[0m"."\n";
    }
    echo "\n";
}
main($argv);
?>