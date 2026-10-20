<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Helpers/html.php';

final class HtmlHelpersTest extends TestCase
{
    public function testAddsRelToBlankLink(): void
    {
        $this->assertSame(
            '<a href="https://example.com" target="_blank" rel="noopener noreferrer">x</a>',
            harden_external_links('<a href="https://example.com" target="_blank">x</a>')
        );
    }

    public function testHandlesSingleQuotedAndUnquotedTarget(): void
    {
        $this->assertStringContainsString('rel="noopener noreferrer"', harden_external_links("<a href='/x' target='_blank'>x</a>"));
        $this->assertStringContainsString('rel="noopener noreferrer"', harden_external_links('<a href=/x target=_blank>x</a>'));
    }

    public function testMergesWithExistingRel(): void
    {
        $out = harden_external_links('<a target="_blank" rel="nofollow" href="/x">x</a>');

        $this->assertStringContainsString('rel="nofollow noopener noreferrer"', $out);
        $this->assertSame(1, substr_count($out, 'rel='));
    }

    public function testDoesNotDuplicateExistingTokens(): void
    {
        $out = harden_external_links('<a target="_blank" rel="noopener" href="/x">x</a>');

        $this->assertStringContainsString('rel="noopener noreferrer"', $out);
    }

    public function testLeavesSameTabLinksAndOtherTagsAlone(): void
    {
        $html = '<p>_blank</p><a href="/x">x</a><a href="/y" target="_self">y</a><abbr target="_blank">z</abbr>';

        $this->assertSame($html, harden_external_links($html));
    }

    public function testOnlyTouchesBlankLinksInMixedContent(): void
    {
        $out = harden_external_links('<a href="/a">a</a> <a href="/b" target="_blank">b</a>');

        $this->assertStringContainsString('<a href="/a">a</a>', $out);
        $this->assertSame(1, substr_count($out, 'rel='));
    }

    public function testPlainTextWithoutLinksIsUnchanged(): void
    {
        $this->assertSame('沒有連結的內文', harden_external_links('沒有連結的內文'));
    }
}
