<?php
declare(strict_types = 1);
namespace App\Mailer;

use Origin\Mailer\Mailer;

class ApplicationMailer extends Mailer
{
    protected $defaults = [
        'from' => [
            'no-reply@example.com' => 'Web Application'
        ],
    ];

    protected $layout = 'default';

    protected $account = 'default';
}
