<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Helpers/sanitize.php';

final class SanitizeHelpersTest extends TestCase
{
    protected function setUp(): void
    {
        $_POST = [];
    }

    public function testPostOrDefaultReturnsValueWhenPresent(): void
    {
        $_POST['category'] = '公告';

        $this->assertSame('公告', post_or_default('category'));
    }

    public function testPostOrDefaultReturnsDefaultWhenMissing(): void
    {
        $this->assertSame('一般消息', post_or_default('category', '一般消息'));
    }

    public function testPostOrDefaultDefaultsToEmptyString(): void
    {
        $this->assertSame('', post_or_default('missing'));
    }

    public function testPostNonemptyStringReturnsValue(): void
    {
        $_POST['select_op'] = '123';

        $this->assertSame('123', post_nonempty_string('select_op'));
    }

    public function testPostNonemptyStringReturnsNullWhenMissing(): void
    {
        $this->assertNull(post_nonempty_string('select_op'));
    }

    public function testPostNonemptyStringReturnsNullWhenEmptyString(): void
    {
        $_POST['select_op'] = '';

        $this->assertNull(post_nonempty_string('select_op'));
    }

    public function testDecodeRichTextDecodesBase64(): void
    {
        $encoded = base64_encode('<p>Hello</p>');

        $this->assertSame('<p>Hello</p>', decode_rich_text($encoded));
    }

    public function testPostTimeOrNowReturnsPostedValue(): void
    {
        $_POST['time'] = '2026-01-01 00:00:00';

        $this->assertSame('2026-01-01 00:00:00', post_time_or_now());
    }

    public function testPostTimeOrNowDefaultsToNowWhenMissing(): void
    {
        $before = time();
        $result = strtotime(post_time_or_now());
        $after = time();

        $this->assertGreaterThanOrEqual($before, $result);
        $this->assertLessThanOrEqual($after, $result);
    }
}
