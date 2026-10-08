<?php

namespace Tests;

use ArticleService;
use PDO;
use PHPUnit\Framework\TestCase;

final class ArticleServiceTest extends TestCase
{
    private ArticleService $service;

    protected function setUp(): void
    {
        $pdo = new PDO('sqlite::memory:');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec(
            'CREATE TABLE article (
                category TEXT,
                heading TEXT,
                content TEXT,
                date TEXT,
                timer TEXT PRIMARY KEY
            )'
        );

        $this->service = new ArticleService($pdo);
    }

    public function testCreateAndGetByTimer(): void
    {
        $created = $this->service->create('公告', '標題', '內容', '2026-01-01 00:00:00', '1');

        $this->assertTrue($created);

        $row = $this->service->getByTimer('1');
        $this->assertNotNull($row);
        $this->assertSame('標題', $row['heading']);
    }

    public function testGetByTimerReturnsNullWhenMissing(): void
    {
        $this->assertNull($this->service->getByTimer('does-not-exist'));
    }

    public function testUpdate(): void
    {
        $this->service->create('公告', '原標題', '原內容', '2026-01-01 00:00:00', '2');
        $this->service->update('2', '公告', '新標題', '新內容', '2026-02-02 00:00:00');

        $row = $this->service->getByTimer('2');
        $this->assertSame('新標題', $row['heading']);
        $this->assertSame('2026-02-02 00:00:00', $row['date']);
    }

    public function testDelete(): void
    {
        $this->service->create('公告', '標題', '內容', '2026-01-01 00:00:00', '3');
        $this->service->delete('3');

        $this->assertNull($this->service->getByTimer('3'));
    }

    public function testGetAllOrderedByDateDescending(): void
    {
        $this->service->create('公告', 'A', '內容', '2026-01-01 00:00:00', '1');
        $this->service->create('公告', 'B', '內容', '2026-03-01 00:00:00', '2');

        $rows = $this->service->getAll();

        $this->assertSame('B', $rows[0]['heading']);
        $this->assertSame('A', $rows[1]['heading']);
    }

    public function testGetLatestRespectsLimit(): void
    {
        $this->service->create('公告', 'A', '內容', '2026-01-01 00:00:00', '1');
        $this->service->create('公告', 'B', '內容', '2026-02-01 00:00:00', '2');
        $this->service->create('公告', 'C', '內容', '2026-03-01 00:00:00', '3');

        $rows = $this->service->getLatest(2);

        $this->assertCount(2, $rows);
        $this->assertSame('C', $rows[0]['heading']);
    }

    public function testGetByCategory(): void
    {
        $this->service->create('公告', 'A', '內容', '2026-01-01 00:00:00', '1');
        $this->service->create('賽事', 'B', '內容', '2026-01-02 00:00:00', '2');

        $rows = $this->service->getByCategory('賽事');

        $this->assertCount(1, $rows);
        $this->assertSame('B', $rows[0]['heading']);
    }

    public function testGetAllOrderedByTimer(): void
    {
        $this->service->create('公告', 'A', '內容', '2026-01-01 00:00:00', '2');
        $this->service->create('公告', 'B', '內容', '2026-01-01 00:00:00', '1');

        $rows = $this->service->getAllOrderedByTimer();

        $this->assertSame('A', $rows[0]['heading']);
        $this->assertSame('B', $rows[1]['heading']);
    }
}
