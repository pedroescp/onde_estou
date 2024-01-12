<?php

use App\Enums\CompaniesStatus;

if (!function_exists('getStatusCompanie')) {
    function getStatusCompanie(string $status): string
    {
        return CompaniesStatus::fromValue($status);
    }
}
