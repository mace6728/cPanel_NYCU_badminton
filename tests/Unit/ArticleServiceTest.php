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
        // SQLite stand-in for the MySQL schema in database/schema.sql.
        $pdo = new PDO('sqlite::memory:');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->exec('CREATE TABLE category (id INTEGER PRIMARY KEY AUTOINCREMENT, name TEXT NOT NULL UNIQUE, slug TEXT NOT NULL UNIQUE)');
        $pdo->exec("INSERT INTO category (id, name, slug) VALUES (1, '一般消息', 'newest'), (2, '比賽成果', 'gameResult')");
        $pdo->exec(
            "CREATE TABLE article (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                category_id INTEGER NOT NULL REFERENCES category(id),
                heading TEXT NOT NULL,
                content TEXT NOT NULL,
                date TEXT NOT NULL,
                created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
                updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )"
        );

        $this->service = new ArticleService($pdo);
    }

    public function testCreateReturnsIdAndGetByIdJoinsCategory(): void
    {
        $id = $this->service->create(2, '標題', '內容', '2026-01-01');

        $row = $this->service->getById($id);
        $this->assertNotNull($row);
        $this->assertSame('標題', $row['heading']);
        $this->assertSame('比賽成果', $row['category']);
        $this->assertSame('gameResult', $row['category_slug']);
    }

    public function testGetByIdReturnsNullWhenMissing(): void
    {
        $this->assertNull($this->service->getById(999));
    }

    public function testGetCategories(): void
    {
        $this->assertSame(['一般消息', '比賽成果'], array_column($this->service->getCategories(), 'name'));
    }

    public function testUpdate(): void
    {
        $id = $this->service->create(1, '原標題', '原內容', '2026-01-01');
        $this->service->update($id, 2, '新標題', '新內容', '2026-02-02');

        $row = $this->service->getById($id);
        $this->assertSame('新標題', $row['heading']);
        $this->assertSame('2026-02-02', $row['date']);
        $this->assertSame('比賽成果', $row['category']);
    }

    public function testDelete(): void
    {
        $id = $this->service->create(1, '標題', '內容', '2026-01-01');
        $this->service->delete($id);

        $this->assertNull($this->service->getById($id));
    }

    public function testGetAllOrderedByDateThenIdDescending(): void
    {
        $this->service->create(1, 'A', '內容', '2026-01-01');
        $this->service->create(1, 'B', '內容', '2026-03-01');
        $this->service->create(1, 'C', '內容', '2026-03-01');

        $this->assertSame(['C', 'B', 'A'], array_column($this->service->getAll(), 'heading'));
    }

    public function testGetLatestRespectsLimit(): void
    {
        $this->service->create(1, 'A', '內容', '2026-01-01');
        $this->service->create(1, 'B', '內容', '2026-02-01');
        $this->service->create(1, 'C', '內容', '2026-03-01');

        $rows = $this->service->getLatest(2);

        $this->assertCount(2, $rows);
        $this->assertSame('C', $rows[0]['heading']);
    }

    public function testGetByCategoryFiltersBySlug(): void
    {
        $this->service->create(1, 'A', '內容', '2026-01-01');
        $this->service->create(2, 'B', '內容', '2026-01-02');

        $rows = $this->service->getByCategory('gameResult');

        $this->assertCount(1, $rows);
        $this->assertSame('B', $rows[0]['heading']);
    }
}
