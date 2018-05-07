<?php

namespace App\ViewComponents;

class HtmlRender implements Render
{
    public function __invoke(string $tag, array $attributes, $children = null)
    {
        if ($this->isVoidTag($tag)) {
            return "<{$tag}{$this->renderAttributes($attributes)}>";
        }

        return "<{$tag}{$this->renderAttributes($attributes)}>{$this->renderChildren($children)}</{$tag}>";
    }

    private function isVoidTag(string $tag): bool
    {
        return $tag === 'meta' || $tag === 'link';
    }

    private function renderAttributes(array $attributes): string
    {
        if (count($attributes) === 0) {
            return '';
        }

        $rendered = array_map(function ($value, $attribute) {
            return "{$attribute}=\"{$value}\"";
        }, $attributes, array_keys($attributes));

        return ' ' . implode(' ', $rendered);
    }

    private function renderChildren($children): string
    {
        if (is_array($children)) {
            $rendered = array_map(function ($child) {
                return $this->renderChild($child);
            }, $children);

            return implode('', $rendered);
        }

        return $this->renderChild($children);
    }

    private function renderChild($child): string
    {
        if (is_null($child)) {
            return '';
        }

        if ($child instanceof Component) {
            return $child->render($this);
        }

        if (is_string($child)) {
            return $child;
        }

        throw new Exception();
    }
}
