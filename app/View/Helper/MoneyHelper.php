<?php
/**
 * Create by: nic
 * Create at: 07/05/13 - 12:34
 */

class MoneyHelper extends AppHelper {
    public function format($valor) {
        return "R$ ".number_format($valor, 2, ",", ".");
    }
    public function formatWithoutRS($valor) {
        return number_format($valor, 2, ",", ".");
    }

}