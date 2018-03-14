Parse YouTube Video ID from URL
=====

[![Master Build Status](https://travis-ci.org/waynestate/parse-youtube-id.svg?branch=master)](https://travis-ci.org/waynestate/parse-youtube-id) | [![Coverage Status](https://coveralls.io/repos/github/waynestate/parse-youtube-id/badge.svg?branch=master)](https://coveralls.io/github/waynestate/parse-youtube-id?branch=master)

Given a YouTube video URL, parse out the video ID.

## Usage

Install the package via composer:

```
composer require waynestate/parse-youtube-id
```

Parse full YouTube URL's

```php
use Waynestate\Youtube\ParseId;

...

$youtube_id = ParseId::fromUrl('https://www.youtube.com/watch?v=yCjTG0rOIXQ');
echo $youtube_id; // 'yCjTG0rOIXQ'
```

Parse short YouTube URL's

```php
$youtube_id = ParseId::fromUrl('https://youtu.be/yCjTG0rOIXQ');
echo $youtube_id; // 'yCjTG0rOIXQ'
```

Null strings or non-YouTube URL's return an empty string

```php
$youtube_id = ParseId::fromUrl('');
echo $youtube_id; // ''
```

See [`/tests/UrlParseTest.php`](tests/UrlParseTest.php) for all supported URL variations.

## Regex

```php
$pattern = '#^(?:https?://|//)?' # Optional URL scheme. Either http, or https, or protocol-relative.
         . '(?:www\.|m\.)?'      #  Optional www or m subdomain.
         . '(?:'                 #  Group host alternatives:
         .   'youtu\.be/'        #    Either youtu.be,
         .   '|youtube\.com/'    #    or youtube.com
         .     '(?:'             #    Group path alternatives:
         .       'embed/'        #      Either /embed/,
         .       '|v/'           #      or /v/,
         .       '|watch\?v='    #      or /watch?v=,
         .       '|watch\?.+&v=' #      or /watch?other_param&v=
         .     ')'               #    End path alternatives.
         . ')'                   #  End host alternatives.
         . '([\w-]{11})'         # 11 characters (Length of Youtube video ids).
         . '(?![\w-])#';         # Rejects if overlong id.
```

## Tests

```shell
composer test
```

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) for details

## Credit

Adapted from [https://3v4l.org/GEDT0](https://3v4l.org/GEDT0)

## About

[Wayne State University](https://wayne.edu) (WSU) is an urban public research university located in Detroit, Michigan.