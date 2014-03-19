<?php
/**
 * Create by: nic
 * Create at: 04/11/12 - 07:55
 */

class ListHelper extends AppHelper {
    public function names($listOfNames) {
        $out = "";
        $virg = "";
        $cont = 1;
        $siz = sizeof($listOfNames);
        foreach ($listOfNames as $name) {
            $out .= $virg . $name;
            $virg = ", ";
            if (++$cont == $siz)
                $virg = " e ";
        }
        return $out;
    }
    public function namesWithAttribute($listOfNames, $attribute) {
        $out = "";
        $virg = "";
        $cont = 1;
        $siz = sizeof($listOfNames);
        foreach ($listOfNames as $name) {
            $out .= $virg . $name[$attribute];
            $virg = ", ";
            if (++$cont == $siz)
                $virg = " e ";
        }
        return $out;
    }
}