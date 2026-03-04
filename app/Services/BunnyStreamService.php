<?php

namespace App\Services;

use GuzzleHttp\Client;

class BunnyStreamService
{
    protected Client $client;
    protected string $libraryId;
    protected string $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->libraryId = config('filesystems.disks.bunny_stream.library_id');
        $this->apiKey = config('filesystems.disks.bunny_stream.api_key');
    }

    public function createVideo(string $title): string
    {
        $response = $this->client->post(
            "https://video.bunnycdn.com/library/{$this->libraryId}/videos",
            [
                'headers' => [
                    'AccessKey' => $this->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => ['title' => $title],
            ]
        );

        return json_decode($response->getBody(), true)['guid'];
    }

    public function uploadVideo(string $guid, string $path): void
    {
        $this->client->put(
            "https://video.bunnycdn.com/library/{$this->libraryId}/videos/{$guid}",
            [
                'headers' => [
                    'AccessKey' => $this->apiKey,
                    'Content-Type' => 'application/octet-stream',
                ],
                'body' => fopen($path, 'r'),
                'timeout' => 0,
            ]
        );
    }

    public function deleteVideo(string $guid): void
    {
        $this->client->delete(
            "https://video.bunnycdn.com/library/{$this->libraryId}/videos/{$guid}",
            [
                'headers' => [
                    'AccessKey' => $this->apiKey,
                ],
            ]
        );
    }

    public function getVideo(string $guid): array
    {
        $response = $this->client->get(
            "https://video.bunnycdn.com/library/{$this->libraryId}/videos/{$guid}",
            [
                'headers' => [
                    'AccessKey' => $this->apiKey,
                ],
            ]
        );

        return json_decode($response->getBody(), true);
    }

    public function setThumbnail(string $guid, string $path)
    {
        $this->client->post(
            "https://video.bunnycdn.com/library/{$this->libraryId}/videos/{$guid}/thumbnail",
            [
                'headers' => [
                    'AccessKey'    => $this->apiKey,
                    'Content-Type' => 'application/octet-stream',
                ],
                'body' => fopen($path, 'r'),
            ]
        );
    }
}
