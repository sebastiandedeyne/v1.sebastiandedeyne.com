---
title: Using a Database for Localization in Laravel
date: 30/03/2016
---

When building a website for a client that wants to be able to manage the content, Laravel's language files aren't ideal since you can't really edit them without diving into a bundle of text files. We recently decided to drop all the lang files in favor of saving translations in the database, which allows us to build a pretty interface for managing them.

Overwriting Laravel's default translation loader is actually quite easy. First we'll set up out translation models, then we'll write our custom loader, and finally register it in our application.

## The Translation Model

> There are a few good packages that handle translatable models, I'm just going to use some simple examples for this post

```php
namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $group
 * @property string $key
 * @property \Illuminate\Database\Eloquent\Collection $translations
 */
class Fragment extends Model
{
    public function translations() : HasMany
    {
        return $this->hasMany(FragmentTranslation::class);
    }
    
    public function translate(string $locale) : string
    {
        $translation = $this->translations
            ->where('locale', $locale)
            ->first();

        return $translation ? 
            $translation->text : 
            "{$this->group}.{$this->key}";
    }
    
    public static function getGroup(string $group, string $locale) : array
    {
        return static::with('translations')
            ->where('group', $group)
            ->get()
            ->map(function (Fragment $fragment) use ($locale, $group) {
                return [
                    'key' => $fragment->key,
                    'text' => $fragment->translate($locale)->text,
                ];
            })
            ->pluck('text', 'key')
            ->toArray();
    }
}
```

```php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $text
 * @property \App\Fragment $fragment
 */
class FragmentTranslation extends Model
{
    public function fragment() : BelongsTo
    {
        return $this->belongsTo(Fragment::class);
    }
}
```

## Writing Our Own TranslationLoader

We're not going to start from scratch, so we can keep using namespaced lang files provided by packages.

```php
namespace App;

use Cache;
use Illuminate\Translation\FileLoader;

class TranslationLoader extends FileLoader
{
    public function load($locale, $group, $namespace = null) : array
    {
        if ($namespace !== null && $namespace !== '*') {
            return $this->loadNamespaced($locale, $group, $namespace);
        }
        
        return Fragment::getGroup($group, $locale);
    }
}
```

## Registering Our New Loader

To change the source of our translated strings, we don't need to reimplement the entire translator, just the translation loader. In the base `TranslationServiceProvider` the loader registration happens in it's own method, so we can just extend that class, and overwrite it.

```php
namespace App\Providers;

use App\Locale\TranslationLoader;
use Illuminate\Translation\TranslationServiceProvider as ServiceProvider;

class TranslationServiceProvider extends ServiceProvider
{
    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function ($app) {
            return new TranslationLoader($app['files'], $app['path.lang']);
        });
    }
}
```

Overwrite config...
