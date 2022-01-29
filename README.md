# ValorantAPI

<img src="https://img.shields.io/badge/build-passing-success"> <img src="https://img.shields.io/badge/version-1.0-blue">

PHP wrapper class for "Valorant Unofficial API" by Henrik-3


## Requirements

 - PHP 7 or upper.

## Installation

[Download](https://github.com/BenEgeDeniz/ValorantAPI/releases) ValorantAPI directly and extract it to your web directory.

## Usage

```php
<?php

require __DIR__ . "/src/ValorantAPI.php"; // Requiring ValorantAPI.

$valorantapi = new ValorantAPI(); // Create a new instance for ValorantAPI.

$match_data = $valorantapi->get_match('f87823c6-70e4-45c4-9857-6a0299e4eb9a'); // Get the match info for a spesific match id. (match_id)
$matches_data = $valorantapi->get_matches('eu', 'difftLe', 'A21'); // Get last matches of a spesific player. (region, username, tagline)
$account_data = $valorantapi->get_account('difftLe', 'A21'); // Get account info of a player. (username, tagline)
$current_mmr_data = $valorantapi->get_current_mmr('eu', 'difftLe', 'A21'); // Get the latest matches mmr info of a player. 
$mmr_history_data = $valorantapi->get_mmr_history('eu', 'difftLe', 'A21'); // Get the mmr history of a player. 


?>
```

## Attributions

Unofficial Valorant API from Henrik: https://github.com/Henrik-3/unofficial-valorant-api

## Notes

This project is not affiliated with Valorant nor Riot Games.
Educational purposes only.
