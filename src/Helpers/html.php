<?php
/**
 * Output-side helpers for admin-authored article HTML.
 */

/**
 * Make every <a target="_blank"> safe from reverse tabnabbing by guaranteeing
 * rel="noopener noreferrer" (merged with any rel the author already set).
 * Articles are stored as raw TinyMCE HTML, so this runs when they are rendered
 * and also covers rows saved before this helper existed.
 */
function harden_external_links(string $html): string
{
    if (stripos($html, '_blank') === false) {
        return $html;
    }

    return preg_replace_callback('/<a\b[^>]*>/i', static function (array $m): string {
        $tag = $m[0];

        if (!preg_match('/\btarget\s*=\s*(?:"\s*_blank\s*"|\'\s*_blank\s*\'|_blank(?=[\s>\/]))/i', $tag)) {
            return $tag;
        }

        $required = ['noopener', 'noreferrer'];

        if (preg_match('/\brel\s*=\s*(?:"([^"]*)"|\'([^\']*)\'|([^\s>"\']+))/i', $tag, $rel, PREG_OFFSET_CAPTURE)) {
            $existing = ($rel[1][0] ?? '') . ($rel[2][0] ?? '') . ($rel[3][0] ?? '');
            $tokens = preg_split('/\s+/', strtolower(trim($existing)), -1, PREG_SPLIT_NO_EMPTY);
            $merged = implode(' ', array_unique(array_merge($tokens, $required)));

            return substr($tag, 0, $rel[0][1]) . 'rel="' . $merged . '"' . substr($tag, $rel[0][1] + strlen($rel[0][0]));
        }

        return preg_replace('/\s*\/?>$/', ' rel="noopener noreferrer"$0', $tag, 1);
    }, $html);
}
