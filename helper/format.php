<?php
function currency_format($number, $suffix = 'đ'): string
{
    return number_format($number).$suffix;
}