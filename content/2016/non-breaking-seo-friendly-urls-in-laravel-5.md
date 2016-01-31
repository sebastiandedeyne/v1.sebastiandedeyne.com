---
title: Non-breaking, SEO Friendly URL's in Laravel 5
date: 13/01/2016
---

When admins create or update a news article—or any other entity—in [our homegrown CMS](https://github.com/spatie-custom/blender), a URL slug is generated based on it's title. The downside here is that when the title changes, the old URL would break. On the other hand, if we wouldn't regenerate the URL on updates, redacted titles would never be reflected in the URL, which isn't an ideal situation either.

Our solution: add an immutable, unique identifier to the URL while keeping the slug intact. This provides links that are both readable and unbreakable.

Here's the gameplan:

1) Determine what our identifier will look like.
2) Retrieve models via their identifier.
3) Redirect invariant URL's to the correct one.

## Determining the Identifier

The simplest form of an identifier is something you already have: the model's ID which is stored in the database.

```md
https://thelaraveltimes.com/news/24/laravel-5-2-new-features
```

An incrementing ID says a lot though. It makes it easy for someone to crawl through your entire dataset (which mostly won't matter for public data), and it provides an indication of how large your dataset is (you might not want to publicly share the estimated size of your user base). Phil Sturgeon has a nice writeup about obfuscated ID's [on his blog](https://philsturgeon.uk/http/2015/09/03/auto-incrementing-to-destruction/).

```md
https://laravelbuddies.com/user/cndjfomj/sebastian-de-deyne
```

If we want to obfuscate your ID's, we could either use a library which encodes integers like [Jens Seger's  Optimus](#), or we could generate a random string on model creation. [Here](https://github.com/jenssegers/optimus)'s a quick snippet illustrating the latter.

```php
trait HasObfuscatedId
{
    protected static function bootHasObfuscatedId()
    {
        static::creating(function (Model $model) {
            $model->setObfuscatedId();
        });
    }

    public function setObfuscatedId()
    {
        // Note: This only compares with existing records. If you want to
        // avoid potential clashes with old records you'll need to enable
        // soft deleting.

        $allRecords = static::all()->pluck('obfuscated_id')->toBase();

        do {
            $obfuscatedId = str_random(8);
        } while ($allRecords->contains($obfuscatedId));

        // Another note: As your record count grows larger, you'll
        // probably want to index the `obfuscated_id` column.

        $this->obfuscated_id = $obfuscatedId;
    }
}
```

## Routing and Retrieving Models

Todo

This is the part that everyone will put somewhere else. You could add a method to a repository, create a query object, add an Eloquent query scope, etc. For now I'll just add the latter to our `HasSeoId` trait.

```php
public function scopeWithSeoId(Builder $query, $seoId)
{
    return $query->where('seo_id', $seoId);
}
```

<aside>

Todo: StackOverflow example

</aside>

## Validating a URL in Your Controller

Links to your old page won't break, but having multiple URL's pointing to the same piece of content isn't a good idea either. To prevent this, old links should respond with a redirect to the correct URL. First let's assume our model has a `url` accessor, which returns the valid slug. Note that I'll be putting this function in my model instead of the trait so I can potentially use other attributes than `url`.

```php
public function getSeoUrlAttribute() : string
{
    return "{$this->seo_id}-{$this->url}";
}
```

When our controller receives an incoming request, we'll start with retrieving the model. If nothing is found we'll return a 404.

```php
public function detail(NewsItemRepository $newsItemRepository, $seoUrl)
{
    $newsItem = $newsItemRepository->findBySeoUrl($seoUrl);

    if ($newsItem === null) {
        abort(404);
    }

    // ...
}
```

Next, we'll compare the incoming slug with the model's slug. If they're not equal, we'll perform a redirect to the correct slug.

```php
public function detail(NewsItemRepository $newsItemRepository, $seoUrl)
{
    // ...

    if ($newsItem->seoUrl !== $seoUrl) {
        return redirect()->action('NewsController@detail', [$newsItem->seoUrl]);
    }

    return view('news.detail', compact('newsItem'));
}
```

An alternative would be to not redirect on invalid URL's, but add a `rel=canonical` `link` tag to your page.

## That's it!

We've succesfully made our links unbreakable! If you want a more detailed example in the wild, feel free to browse through Blender's source code, the CMS-esque Laravel boilerplate we use for most greenfield projects here at Spatie.
