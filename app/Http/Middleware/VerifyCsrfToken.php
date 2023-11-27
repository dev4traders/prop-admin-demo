<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'postal',
        'statistics',
        'payments/sqala',
        'payments/letknowpay',
        'payments/coingate',
        'payments/fake',
        'payments/coinpayments'
    ];
}
