<?php

namespace Waynestate\Youtube\Test;

use PHPUnit\Framework\TestCase;
use Waynestate\Youtube\ParseId;

class UrlParseTest extends TestCase
{
    /** @test */
    public function it_can_parse_a_null_string()
    {
        $this->assertEquals('', ParseId::fromUrl(''));
    }

    /** @test */
    public function it_can_parse_non_youtube_url()
    {
        $this->assertEquals('', ParseId::fromUrl('https://wayne.edu/'));
    }

    /** @test */
    public function it_can_parse_valid_youtube_urls()
    {
        $video_ids = [
            'yCjTG0rOIXQ', // Chars only
            '33e9j-i94no', // With a dash
            '_PqP1qHhsyM', // Underscore prefix
            '3G3_im4RyI8', // Underscore in middle
            'uqU4Mkd-_gU', // Underscore and dash
        ];

        $url_variations = [
            // Without scheme and subdomain (Domain: youtu.be, Path: /)
            'youtu.be/%s',
            // Without scheme, with subdomain (Domain: youtu.be, Path: /)
            'www.youtu.be/%s',
            // With HTTP scheme, without subdomain (Domain: youtu.be, Path: /)
            'http://youtu.be/%s',
            // With HTTP scheme and subdomain (Domain: youtu.be, Path: /)
            'http://www.youtu.be/%s',
            // With HTTPS scheme, without subdomain (Domain: youtu.be, Path: /)
            'https://youtu.be/%s',
            // With HTTPS scheme and subdomain (Domain: youtu.be, Path: /)
            'https://www.youtu.be/%s',
            // Without scheme and subdomain (Domain: youtube.com, Path: /embed)
            'youtube.com/embed/%s',
            'youtube.com/embed/%s&other_params',
            // Without scheme, with subdomain (Domain: youtube.com, Path: /embed)
            'www.youtube.com/embed/%s',
            'www.youtube.com/embed/%s&other_params',
            // With HTTP scheme, without subdomain (Domain: youtube.com, Path: /embed)
            'http://youtube.com/embed/%s',
            'http://youtube.com/embed/%s&other_params',
            // With HTTP scheme and subdomain (Domain: youtube.com, Path: /embed)
            'http://www.youtube.com/embed/%s',
            'http://www.youtube.com/embed/%s&other_params',
            // With HTTPS scheme, without subdomain (Domain: youtube.com, Path: /embed)
            'https://youtube.com/embed/%s',
            'https://youtube.com/embed/%s&other_params',
            // With HTTPS scheme and subdomain (Domain: youtube.com, Path: /embed)
            'https://www.youtube.com/embed/%s',
            'https://www.youtube.com/embed/%s&other_params',
            // Without scheme and subdomain (Domain: youtube.com, Path: /v)
            'youtube.com/v/%s',
            'youtube.com/v/%s&other_params',
            // Without scheme, with subdomain (Domain: youtube.com, Path: /v)
            'www.youtube.com/v/%s',
            'www.youtube.com/v/%s&other_params',
            // With HTTP scheme, without subdomain (Domain: youtube.com, Path: /v)
            'http://youtube.com/v/%s',
            'http://youtube.com/v/%s&other_params',
            // With HTTP scheme and subdomain (Domain: youtube.com, Path: /v)
            'http://www.youtube.com/v/%s',
            'http://www.youtube.com/v/%s&other_params',
            // With HTTPS scheme, without subdomain (Domain: youtube.com, Path: /v)
            'https://youtube.com/v/%s',
            'https://youtube.com/v/%s&other_params',
            // With HTTPS scheme and subdomain (Domain: youtube.com, Path: /v)
            'https://www.youtube.com/v/%s',
            'https://www.youtube.com/v/%s&other_params',
            // Without scheme and subdomain (Domain: youtube.com, Path: /watch)
            'youtube.com/watch?v=%s',
            'youtube.com/watch?v=%s&other_params',
            'youtube.com/watch?other_params&v=%s',
            'youtube.com/watch?other_params&v=%s&more_params',
            // Without scheme, with subdomain (Domain: youtube.com, Path: /watch)
            'www.youtube.com/watch?v=%s',
            'www.youtube.com/watch?v=%s&other_params',
            'www.youtube.com/watch?other_params&v=%s',
            'www.youtube.com/watch?other_params&v=%s&more_params',
            // With HTTP scheme, without subdomain (Domain: youtube.com, Path: /watch)
            'http://youtube.com/watch?v=%s',
            'http://youtube.com/watch?v=%s&other_params',
            'http://youtube.com/watch?other_params&v=%s',
            'http://youtube.com/watch?other_params&v=%s&more_params',
            // With HTTP scheme and subdomain (Domain: youtube.com, Path: /watch)
            'http://www.youtube.com/watch?v=%s',
            'http://www.youtube.com/watch?v=%s&other_params',
            'http://www.youtube.com/watch?other_params&v=%s',
            'http://www.youtube.com/watch?other_params&v=%s&more_params',
            // With HTTPS scheme, without subdomain (Domain: youtube.com, Path: /watch)
            'https://youtube.com/watch?v=%s',
            'https://youtube.com/watch?v=%s&other_params',
            'https://youtube.com/watch?other_params&v=%s',
            'https://youtube.com/watch?other_params&v=%s&more_params',
            // With HTTPS scheme and subdomain (Domain: youtube.com, Path: /watch)
            'https://www.youtube.com/watch?v=%s',
            'https://www.youtube.com/watch?v=%s&other_params',
            'https://www.youtube.com/watch?other_params&v=%s',
            'https://www.youtube.com/watch?other_params&v=%s&more_params',
        ];

        foreach ($video_ids as $id) {
            foreach ($url_variations as $url) {
                $this->assertEquals($id, ParseId::fromUrl(sprintf($url, $id)));
            }
        }
    }
}
