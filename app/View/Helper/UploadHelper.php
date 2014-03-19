<?php
/**
 * Create by: nic
 * Create at: 22/05/13 - 10:33
 */

class UploadHelper extends AppHelper {
    public function fancyboxImg($uploadArray, $model, $imageField, $wSize, $hSize, $wReduction = null, $hReduction = null) {
        list($directPass, $htmlReduction, $uploadArray) = $this->prepare($uploadArray, $model, $wReduction, $hReduction);

        $out = "";

        $out .= "<a id='fancybox_";
        $out .= $imageField;
        $out .= "' href=\"/files/";
        $out .= strtolower($model);
        $out .= '/';
        $out .= strtolower($imageField);
        $out .= '/';
        $out .= $directPass ? $uploadArray[$imageField . '_dir'] : $uploadArray[$model][$imageField . '_dir'];
        $out .= '/';
        $out .= $directPass ? $uploadArray[$imageField] : $uploadArray[$model][$imageField];
        $out .= '"';
        $out .= ">";

        $out .= $this->imgTag($uploadArray, $model, $imageField, $wSize, $hSize, $wReduction, $hReduction);
        $out .= "</a>";
        $out .= '<script type="text/javascript">$("a#fancybox_' . $imageField . '").fancybox();</script>';
        return $out;
    }


    public function imgTag($uploadArray, $model, $imageField, $wSize, $hSize, $wReduction = null, $hReduction = null) {
        list($directPass, $htmlReduction, $uploadArray) = $this->prepare($uploadArray, $model, $wReduction, $hReduction);

        $out = "";

        $out .= '<img ';
        $out .= 'width="';
        $out .= $htmlReduction ? $wReduction : $wSize;
        $out .= 'px"';
        $out .= ' height="';
        $out .= $htmlReduction ? $hReduction : $hSize;
        $out .= 'px"';
        $out .= ' src="';
        $out .= '/files/';
        $out .= strtolower($model);
        $out .= '/';
        $out .= strtolower($imageField);
        $out .= '/';
        $out .= $directPass ? $uploadArray[$imageField . '_dir'] : $uploadArray[$model][$imageField . '_dir'];
        $out .= '/';
        $out .= $wSize;
        $out .= 'x';
        $out .= $hSize;
        $out .= '_';
        $out .= $directPass ? $uploadArray[$imageField] : $uploadArray[$model][$imageField];
        $out .= '"';
        $out .= ' alt="';
        $out .= $directPass ? $uploadArray['nome'] : $uploadArray[$model]['nome'];
        $out .= '"';
        $out .= '>';

        return $out;
    }

    private function prepare($uploadArray, $model, $wReduction, $hReduction) {
        $directPass = true;
        $htmlReduction = false;

        if (isset($uploadArray[$model]))
            $directPass = false;

        if ($wReduction != null & $hReduction != null)
            $htmlReduction = true;
        return array($directPass, $htmlReduction, $uploadArray);
    }

}