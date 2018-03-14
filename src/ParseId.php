<?php

namespace Waynestate\Youtube;

class ParseId
{
    /**
     * Parse the video ID from a YouTube URL
     *
     * @author Stephan Schmitz <eyecatchup@gmail.com>
     * @param string $url
     * @return string
     */
    public static function fromUrl($url)
    {
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
        preg_match($pattern, $url, $matches);

        return $matches[1] ?? '';
    }
}
