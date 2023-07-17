<?php
header("content-type: application/json; charset=utf-8");
$runtimeEnvironmentVariables = array_filter(
    $_ENV,
    fn($v, $k) => !str_starts_with($k, "PHP") && !str_starts_with($k, "APACHE"),
    ARRAY_FILTER_USE_BOTH
);
$lastCommit = parseCommit(trim(file_get_contents(__DIR__ . "/commit.txt")));
echo json_encode([
    "currentBranch" => trim(file_get_contents(__DIR__ . "/branch.txt")),
    "lastCommit" => $lastCommit,
    "buildTimeEnvironmentVariables" => json_decode(file_get_contents(__DIR__ . "/env.json")),
    "runtimeEnvironmentVariables" => $runtimeEnvironmentVariables,
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

function parseCommit(string $input): array {
    $output = [];
    $parts = explode("|||", $input);
    foreach ($parts as $part) {
        [$key, $value] = explode(":::", $part);
        $output[$key] = $value;
    }
    return $output;
}