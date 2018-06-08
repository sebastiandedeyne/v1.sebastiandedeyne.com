<?php

namespace App\Http\ViewComponents\Schema;

use Spatie\SchemaOrg\Schema as Builder;
use Illuminate\Contracts\Support\Htmlable;

class WebPage implements Htmlable
{
    public function toHtml()
    {
        return Builder::webPage()->author(
            Builder::person()
                ->name('Sebastian De Deyne')
                ->givenName('Sebastian')
                ->familyName('De Deyne')
                ->email('mailto:sebastiandedeyne@gmail.com')
                ->url('https://sebastiandedeyne.com')
                ->sameAs([
                    'https://twitter.com/sebdedeyne',
                    'https://github.com/sebastiandedeyne',
                ])
        );
    }
}
