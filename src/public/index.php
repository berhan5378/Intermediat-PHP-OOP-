<?php

class Solution {

    /**
     * @param String $s
     * @param Integer[][] $shifts
     * @return String
     */
    function shiftingLetters($s, $shifts) {
        $n = strlen($s);
        $diff = array_fill(0, $n + 1, 0); // Difference array to store cumulative shifts

        // Apply shifts to the difference array
        foreach ($shifts as $shift) {
            $start = $shift[0];
            $end = $shift[1];
            $direction = $shift[2];

            // Apply shift value based on direction
            $value = ($direction === 1) ? 1 : -1;
            $diff[$start] += $value;
            $diff[$end + 1] -= $value;
        }

        // Compute the cumulative shifts using the difference array
        $cumulativeShift = 0;
        $result = '';

        for ($i = 0; $i < $n; $i++) {
            $cumulativeShift += $diff[$i];
            $shift = ($cumulativeShift % 26 + 26) % 26; // Normalize the shift within [0, 25]

            // Calculate the new character after applying the shift
            $newChar = chr((ord($s[$i]) - ord('a') + $shift) % 26 + ord('a'));
            $result .= $newChar;
        }

        return $result;
    }
}

$solution = new Solution();
echo $solution->shiftingLetters("abc", [[0,1,0],[1,2,1],[0,2,1]]); // Output: "ace"
echo $solution->shiftingLetters("dztz", [[0,0,0],[1,1,1]]);        // Output: "catz"
