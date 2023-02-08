<?php


class Diamond
{
    public static function creaDiamante($char): array
    {
        if (strtoupper($char) === 'A') {
            return ['A'];
        } else {
            $chars = range('A', $char);
            $result = array();
            for ($i = 0; $i < count($chars); $i++) {
                $el = '';
                for ($j = 0; $j < count($chars)-1-$i; $j++) {
                    $el .= ' ';
                }
                if (!$i) {
                    $temp = $el;
                    $el .= $chars[$i] . $temp;
                }
                else {
                    $temp = '';
                    for ($j = 0; $j < $i-1; $j++) {
                        $temp .= ' ';
                    }
                    $el .= $chars[$i] . $temp;
                    $revEl = strrev($el);
                    $el .= ' ' . $revEl;
                }
                $result[] = $el;
            }
            $revResult = array_reverse($result);
            array_shift($revResult);
            foreach ($revResult as $value) {
                $result[] = $value;
            }
            return $result;
        }
    }
}