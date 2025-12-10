<?php

namespace App\Services;

class Jkt48ScraperService
{
    protected string $nodeScript;

    public function __construct()
    {
        // Pastikan path sesuai dengan folder yang kamu pakai
        $this->nodeScript = base_path('node-scripts/jkt-news.cjs');
    }

    public function getAllNews(): array
    {
        if (!file_exists($this->nodeScript)) {
            \Log::error("Node script not found: " . $this->nodeScript);
            return [];
        }

        // Command: node /full/path/node-scripts/jkt-news.cjs
        $command = "node " . escapeshellarg($this->nodeScript);

        $output = shell_exec($command);

        if (!$output) {
            \Log::error("Node script returned empty result");
            return [];
        }

        $json = json_decode($output, true);

        if (!is_array($json)) {
            \Log::error("Invalid JSON from Node script");
            return [];
        }

        // Ambil hanya 15 teratas
        return array_slice($json, 0, 15);
    }
}
