<?php

namespace App\Services;

use App\Models\ShortUrl;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class UrlShortenerService
{
    // Generates random alphanumeric hash.
    public function generateRandomHash(int $length = 6): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomHash = '';

        for ($i = 0; $i < $length; $i++) {
            $randomHash .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomHash;
    }

    // Get all short url records
    public function getAllShortUrls(): Collection
    {
        return ShortUrl::all();
    }

    // Finds and retrieves short url record where entered url is already being used.
    public function getShortUrlWithUsedUrl(string $url): ?ShortUrl
    {
        return ShortUrl::where('url', $url)->first();
    }

    // Creates new short url record.
    public function createShortUrl(string $hash, array $validInputs): void
    {
        ShortUrl::create([
            'hash' => $hash,
            'url' => $validInputs['url']
        ]);
    }

    // Generates short url.
    public function generateShortUrl(object $shortUrl): string
    {
        return 'https://example.com/' . $shortUrl->hash;
        // return env('APP_URL') . '/' . $shortUrl->hash;
    }

    // Get original url from short url record by hash
    public function getUrlFromShortUrlByHash(string $hash): string
    {
        $shortUrl = ShortUrl::where('hash', $hash)->first();

        if (is_null($shortUrl) || !$shortUrl) {
            throw new Exception('Url not found in database.');
        }

        return $shortUrl->url;
    }
}
