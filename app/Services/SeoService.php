<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Str;

class SeoService
{
    private ?string $title = null;

    private ?string $description = null;

    private ?string $image = null;

    private ?string $url = null;

    private ?string $type = 'website';

    private ?string $canonical = null;

    private array $breadcrumbs = [];

    private array $jsonLd = [];

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function setCanonical(?string $url): static
    {
        $this->canonical = $url;

        return $this;
    }

    public function setBreadcrumbs(array $crumbs): static
    {
        $this->breadcrumbs = $crumbs;

        return $this;
    }

    public function addJsonLd(array $data): static
    {
        $this->jsonLd[] = $data;

        return $this;
    }

    public function title(): ?string
    {
        return $this->title;
    }

    public function description(): ?string
    {
        return $this->description;
    }

    public function image(): ?string
    {
        return $this->image;
    }

    public function url(): ?string
    {
        return $this->url ?? url()->current();
    }

    public function type(): string
    {
        return $this->type ?? 'website';
    }

    public function canonical(): ?string
    {
        return $this->canonical;
    }

    public function breadcrumbJsonLd(): array
    {
        if (empty($this->breadcrumbs)) {
            return [];
        }

        $items = [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ];

        foreach ($this->breadcrumbs as $i => $crumb) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => $i + 2,
                'name' => $crumb['label'],
                'item' => $crumb['url'] ?? url()->current(),
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $items,
        ];
    }

    public function schoolJsonLd(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'EducationalOrganization',
            'name' => school_setting('school_name', config('app.name')),
            'description' => $this->description ?? school_setting('school_tagline', ''),
            'url' => url('/'),
            'telephone' => school_setting('phone', ''),
            'email' => school_setting('email', ''),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => school_setting('address', ''),
            ],
        ];
    }

    public function render(): string
    {
        $html = '';

        if ($this->title) {
            $html .= "<title>{$this->title}</title>\n";
            $html .= '<meta property="og:title" content="' . e($this->title) . "\">\n";
            $html .= '<meta name="twitter:title" content="' . e($this->title) . "\">\n";
        }

        if ($this->description) {
            $html .= '<meta name="description" content="' . e($this->description) . "\">\n";
            $html .= '<meta property="og:description" content="' . e($this->description) . "\">\n";
            $html .= '<meta name="twitter:description" content="' . e($this->description) . "\">\n";
        }

        if ($this->image) {
            $html .= '<meta property="og:image" content="' . e($this->image) . "\">\n";
            $html .= '<meta name="twitter:image" content="' . e($this->image) . "\">\n";
        }

        $html .= '<meta property="og:url" content="' . e($this->url()) . "\">\n";
        $html .= '<meta property="og:type" content="' . e($this->type) . "\">\n";
        $html .= '<meta name="twitter:card" content="summary_large_image">' . "\n";

        if ($this->canonical) {
            $html .= '<link rel="canonical" href="' . e($this->canonical) . "\">\n";
        }

        foreach ($this->jsonLd as $ld) {
            $html .= '<script type="application/ld+json">' . json_encode($ld, JSON_UNESCAPED_SLASHES) . "</script>\n";
        }

        return $html;
    }
}
