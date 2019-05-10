<?php

namespace App\Providers;

use App\Posts\HeadingRenderer;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\Block\Element\FencedCode;
use League\CommonMark\Block\Element\Heading;
use League\CommonMark\Block\Element\IndentedCode;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;
use Spatie\Sheets\ContentParsers\MarkdownWithFrontMatterParser;

class MarkdownServiceProvider extends ServiceProvider
{
    public function register()
    {
        $environment = Environment::createCommonMarkEnvironment();

        $environment->addBlockRenderer(Heading::class, new HeadingRenderer());

        $environment->addBlockRenderer(FencedCode::class, new FencedCodeRenderer([]));
        $environment->addBlockRenderer(IndentedCode::class, new IndentedCodeRenderer([]));

        $commonMarkConverter = new CommonMarkConverter([], $environment);

        $this->app->instance(CommonMarkConverter::class, $commonMarkConverter);

        $this->app->when(MarkdownWithFrontMatterParser::class)
            ->needs(CommonMarkConverter::class)
            ->give(function () use ($commonMarkConverter) {
                return $commonMarkConverter;
            });
    }
}
