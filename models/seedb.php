<?php
class Seedb extends AppModel {
	var $name = 'Seedb';
        var $useTable = false;

                // http://twitter.com/SonnyGauran/statuses/10424771246
                // dwarven Differences:
                // * Replaced isset() with array_key_exists() to account for keys with null contents

                // 55 dot php at imars dot com Differences:
                // Key differences:
                // * Removed redundant test;
                // * Returns false bool on exact match (not zero integer);
                // * Use type-precise comparison "!==" instead of loose "!=";
                // * Detect when $array2 contains extraneous elements;
                // * Returns "before" and "after" instead of only "before" arrays on mismatch.
                function array_compare($array1, $array2) {
                    $diff = false;
                    // Left-to-right
                    foreach ($array1 as $key => $value) {
                        if (!array_key_exists($key,$array2)) {
                            $diff[0][$key] = $value;
                        } elseif (is_array($value)) {
                            if (!is_array($array2[$key])) {
                                $diff[0][$key] = $value;
                                $diff[1][$key] = $array2[$key];
                            } else {
                                $new = $this->array_compare($value, $array2[$key]);
                                if ($new !== false) {
                                    if (isset($new[0])) $diff[0][$key] = $new[0];
                                    if (isset($new[1])) $diff[1][$key] = $new[1];
                                };
                            };
                        } elseif ($array2[$key] !== $value) {
                            $diff[0][$key] = $value;
                            $diff[1][$key] = $array2[$key];
                        };
                    };
                    // Right-to-left
                    foreach ($array2 as $key => $value) {
                        if (!array_key_exists($key,$array1)) {
                            $diff[1][$key] = $value;
                        };
                        // No direct comparsion because matching keys were compared in the
                        // left-to-right loop earlier, recursively.
                    };
                    return $diff;
                }
}
?>