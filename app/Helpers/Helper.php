<?php


use Carbon\Carbon;

if (!function_exists('time_format')) {
    function time_format($time)
    {
        return Carbon::createFromFormat('H:i:s',$time)->format('h:i A');
    }
}
if (!function_exists('date_time')) {
    function date_time($date)
    {
        return date('d-M-y h:i A', strtotime($date));
    }
}

if (! function_exists('method_field')) {
    /**
     * Generate a form field to spoof the HTTP verb used by forms.
     *
     * @param  string  $method
     * @return \Illuminate\Support\HtmlString
     */
    function method_field($method)
    {
        return new HtmlString('<input type="hidden" name="_method" value="'.$method.'">');
    }
}

if(! function_exists('currencyFormat')) {
    function currencyFormat($currency)
    {
        return Setting::get('currency_code').number_format($currency, 2);
    }
}

/**
 * Get domain (host without sub-domain)
 *
 * @param null $url
 * @return string
 */
function getDomain($url = null)
{
    if (!empty($url)) {
        $host = parse_url($url, PHP_URL_HOST);
    } else {
        $host = getHost();
    }

    $tmp = explode('.', $host);
    if (count($tmp) > 2) {
        $itemsToKeep = count($tmp) - 2;
        $tlds = config('tlds');
        if (isset($tmp[$itemsToKeep]) && isset($tlds[$tmp[$itemsToKeep]])) {
            $itemsToKeep = $itemsToKeep - 1;
        }
        for ($i = 0; $i < $itemsToKeep; $i++) {
            \Illuminate\Support\Arr::forget($tmp, $i);
        }
        $domain = implode('.', $tmp);
    } else {
        $domain = @implode('.', $tmp);
    }

    return $domain;
}

/**
 * Get host (domain with sub-domain)
 *
 * @param null $url
 * @return array|mixed|string
 */
function getHost($url = null)
{
    if (!empty($url)) {
        $host = parse_url($url, PHP_URL_HOST);
    } else {
        $host = (trim(request()->server('HTTP_HOST')) != '') ? request()->server('HTTP_HOST') : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');
    }

    if ($host == '') {
        $host = parse_url(url()->current(), PHP_URL_HOST);
    }

    return $host;
}

function isValidJson($string)
{
    try {
        json_decode($string);
    } catch (\Exception $e) {
        return false;
    }

    return (json_last_error() == JSON_ERROR_NONE);
}
