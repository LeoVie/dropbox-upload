<?php

use Symfony\Component\Dotenv\Dotenv;
use Spatie\Dropbox\Client;

require_once __DIR__ . '/../vendor/autoload.php';

function assertOptionIsSet(string $option): void
{
    $options = getopt('l:r:');
    if (!array_key_exists($option, $options)) {
        throw new Exception("Please pass option '$option'.");
    }
}

function loadDropboxAccessToken(): string
{
    $dotenv = new Dotenv();
    $dotenv->load('/environment/.env');

    return $_ENV['DROPBOX_ACCESS_TOKEN'];
}

function getLocalAndRemoteFilePaths(): array
{
    $options = getopt('l:r:');
    $local = $options['l'];
    $remote = $options['r'];

    return [$local, $remote];
}

assertOptionIsSet('l');
assertOptionIsSet('r');

[$local, $remote] = getLocalAndRemoteFilePaths();
$content = file_get_contents($local);
$client = new Client(loadDropboxAccessToken());
$client->upload($remote, $content);