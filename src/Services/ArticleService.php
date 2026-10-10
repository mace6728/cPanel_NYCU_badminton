<?php
/**
 * Articles live in `article`, joined to `category` for display. Rows come back
 * with `category` (display name) and `category_slug` (CSS/URL key) alongside
 * the article's own columns.
 */
class ArticleService
{
    private const SELECT = 'SELECT a.`id`, a.`category_id`, c.`name` AS `category`, c.`slug` AS `category_slug`,
            a.`heading`, a.`content`, a.`date`, a.`created_at`, a.`updated_at`
        FROM `article` a
        JOIN `category` c ON c.`id` = a.`category_id`';

    private const ORDER = ' ORDER BY a.`date` DESC, a.`id` DESC';

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /** @return array<int, array{id:int,name:string,slug:string}> */
    public function getCategories(): array
    {
        return $this->db->query('SELECT `id`, `name`, `slug` FROM `category` ORDER BY `id`')->fetchAll();
    }

    public function getAll(): array
    {
        return $this->db->query(self::SELECT . self::ORDER)->fetchAll();
    }

    public function getLatest(int $limit): array
    {
        $sth = $this->db->prepare(self::SELECT . self::ORDER . ' LIMIT ?');
        $sth->bindValue(1, $limit, PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchAll();
    }

    public function getByCategory(string $slug): array
    {
        $sth = $this->db->prepare(self::SELECT . ' WHERE c.`slug` = ?' . self::ORDER);
        $sth->execute([$slug]);

        return $sth->fetchAll();
    }

    public function getById(int $id): ?array
    {
        $sth = $this->db->prepare(self::SELECT . ' WHERE a.`id` = ?');
        $sth->execute([$id]);
        $row = $sth->fetch();

        return $row === false ? null : $row;
    }

    /** @return int the new article's id */
    public function create(int $categoryId, string $heading, string $content, string $date): int
    {
        $sth = $this->db->prepare(
            'INSERT INTO `article` (`category_id`, `heading`, `content`, `date`) VALUES (?, ?, ?, ?)'
        );
        $sth->execute([$categoryId, $heading, $content, $date]);

        return (int) $this->db->lastInsertId();
    }

    public function update(int $id, int $categoryId, string $heading, string $content, string $date): bool
    {
        $sth = $this->db->prepare(
            'UPDATE `article` SET `category_id` = ?, `heading` = ?, `content` = ?, `date` = ?,
                `updated_at` = CURRENT_TIMESTAMP WHERE `id` = ?'
        );

        return $sth->execute([$categoryId, $heading, $content, $date, $id]);
    }

    public function delete(int $id): bool
    {
        $sth = $this->db->prepare('DELETE FROM `article` WHERE `id` = ?');

        return $sth->execute([$id]);
    }
}
