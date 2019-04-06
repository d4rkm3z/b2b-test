<?php
function clearUrl(string $str)
{
    $result = parse_url($str);
    preg_match_all("/param\d=[0-2|4-9]/", $result['query'], $query);
    $query = $query[0];
    usort($query, function ($first, $second) {
        $firstIndex = $first[strlen($first) - 1];
        $secondIndex = $second[strlen($second) - 1];
        if ($firstIndex === $secondIndex) {
            return 0;
        }
        return ($firstIndex < $secondIndex) ? -1 : 1;
    });
    $query = implode('&', $query);

    return "{$result['scheme']}://{$result['host']}/?{$query}&" . urlencode($result['path']);
}

var_dump(clearUrl("https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3"));