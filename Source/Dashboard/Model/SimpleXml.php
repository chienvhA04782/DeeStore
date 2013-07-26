<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SimpleXml
 *
 * @author vanthuc5433
 */
class SimpleXml {

    public function getAttribute($input) {
        $doc = new DOMDocument();
        $doc->load('../properties.xml');
        $result = $input;
        for ($i = 0; $i < count($input); $i++) {
            $result[$i] = $doc->getElementsByTagName($input[$i])->item(0)->nodeValue != ""
                    ? $doc->getElementsByTagName($input[$i])->item(0)->nodeValue : 0;
        }
        return $result;
    }

}

?>
