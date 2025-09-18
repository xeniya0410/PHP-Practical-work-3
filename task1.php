<?php
function getTextStats($text)
{

    $character_count = mb_strlen($text);


    $words = str_word_count($text, 1, 'А-Яа-яЁё');
    $word_count = count($words);


    $sentence_count = preg_match_all('/[.!?]/u', $text);

    $total_length = 0;
    foreach ($words as $w) {
        $total_length += mb_strlen($w);
    }
    $average_word_length = $word_count > 0 ? $total_length / $word_count : 0;

    $freq = array_count_values(array_map('mb_strtolower', $words));
    $max = max($freq);
    $most_common_word = array_keys($freq, $max);

    return [
        "character_count" => $character_count,
        "word_count" => $word_count,
        "sentence_count" => $sentence_count,
        "average_word_length" => round($average_word_length, 2),
        "most_common_word" => $most_common_word
    ];
}
$text = "The quick brown fox jumps over the lazy dog. The dog was not amused.";
print_r(getTextStats($text));
