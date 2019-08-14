<?php

//This preProcess function extends the input so that is enough bits long
function preProcess($message){
  //strlen returns the length of the string, storing it as the originalsize variable
  $originalSize = strlen($message) * 8;
  //chr funciton adds an ascii character to the end of the message
  $message .= chr(128);
  //Make sure that the length of the message, plus 8, modulo by 64 is not identical to 0, and if so add a null ascii value to the end
  while (((strlen($message) + 8) % 64) !== 0) {
      $message .= chr(0);
  }
  //Split the string into a array, then split it and format it with '%064b' then set it into $bin
  foreach (str_split(sprintf('%064b', $originalSize), 8) as $bin) {
      //add a assci character with the $bin value onto the end
      $message .= chr(bindec($bin));
  }
  //Return the character to the function
  return $message;
}

//This function is to add the ability to rotate an array, which is not implimented in php, but this function allows it to happen
function rotl($x, $n) {
  return ($x << $n) | ($x >> (32 - $n));
}

function SHAfunction($step, $b, $c, $d)
{
  switch ($step) {
    case 0;
        return ($b & $c) ^ (~$b & $d);
    case 1;
    case 3;
        return $b ^ $c ^ $d;
    case 2;
        return ($b & $c) ^ ($b & $d) ^ ($c & $d);
  }
}
function hash_sha1($input) {
    //Initialize variables
    $h0 = 0x67452301;
    $h1 = 0xEFCDAB89;
    $h2 = 0x98BADCFE;
    $h3 = 0x10325476;
    $h4 = 0xC3D2E1F0;
    $K = [0x5a827999, 0x5a827999, 0x8f1bbcdc, 0xca62c1d6];
    $message = preProcess($input);
    // Process the message in successive 512-bit chunks:
    // break message into 512-bit chunks
    $chunks = str_split($message, 64);
    foreach ($chunks as $chunk) {
        // break chunk into sixteen 32-bit big-endian words w[i], 0 ≤ i ≤ 15
        $words = str_split($chunk, 4);
        foreach ($words as $i => $chrs) {
            $chrs = str_split($chrs);
            $word = '';
            foreach ($chrs as $chr) {
                $word .= sprintf('%08b', ord($chr));
            }
            $words[$i] = bindec($word);
        }
        // Extend the sixteen 32-bit words into eighty 32-bit words:
        for ($i = 16; $i < 80; $i++) {
        // for i from 16 to 79
        //     w[i] = (w[i-3] xor w[i-8] xor w[i-14] xor w[i-16]) leftrotate 1
            $words[$i] = rotl($words[$i-3] ^ $words[$i-8] ^ $words[$i-14] ^ $words[$i-16], 1) & 0xffffffff;
        }
        // Initialize hash value for this chunk:
        $a = $h0; $b = $h1; $c = $h2; $d = $h3; $e = $h4;
        // Main loop:[39]
        foreach ($words as $i => $word) {
            $s = floor($i / 20);
            $f = SHAfunction($s, $b, $c, $d);
            $temp = rotl($a, 5) + $f + $e + $K[$s] + ($word) & 0xffffffff;
            $e = $d;
            $d = $c;
            $c = rotl($b, 30);
            $b = $a;
            $a = $temp;
        }
        // Add this chunk's hash to result so far:
        $h0 = ($h0 + $a) & 0xffffffff;
        $h1 = ($h1 + $b) & 0xffffffff;
        $h2 = ($h2 + $c) & 0xffffffff;
        $h3 = ($h3 + $d) & 0xffffffff;
        $h4 = ($h4 + $e) & 0xffffffff;
    }
    return sprintf('%08x%08x%08x%08x%08x', $h0, $h1, $h2, $h3, $h4);;
}
// echo sha1('password'), PHP_EOL;
// echo hash_sha1('password'), PHP_EOL;
// echo hash_sha1(file_get_contents(__FILE__)), PHP_EOL;
// echo sha1_file(__FILE__), PHP_EOL;

?>
