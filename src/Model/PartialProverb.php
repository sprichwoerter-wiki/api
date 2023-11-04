<?php

namespace App\Model;

class PartialProverb
{
    private string $slug;
    private string $name;
    private ?string $explanation;
    private ?string $coverUrl;

    /**
     * @param string $slug
     * @param string $name
     * @param string|null $coverUrl
     */
    public function __construct(string $slug, string $name, ?string $explanation, ?string $coverUrl)
    {
        $this->slug = $slug;
        $this->name = $name;
        $this->explanation = $explanation;
        $this->coverUrl = $coverUrl;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    public function setExplanation(?string $explanation): void
    {
        $this->explanation = $explanation;
    }

    public function getCoverUrl(): ?string
    {
        return $this->coverUrl;
    }

    public function setCoverUrl(string $coverUrl): void
    {
        $this->coverUrl = $coverUrl;
    }
}