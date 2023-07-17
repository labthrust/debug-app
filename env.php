<?php
echo json_encode(array_filter(
    $_ENV,
    fn($v, $k) => !str_starts_with($k, "PHP") && !str_starts_with($k, "APACHE"),
    ARRAY_FILTER_USE_BOTH
));
