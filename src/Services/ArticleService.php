<?php
/**
 * Articles live in `article`, joined to `category` for display. Rows come back
 * with `category` (display name) and `category_slug` (CSS/URL key) alongside
 * the article's own columns. Public listings only see published articles.
 */
class ArticleService
{
    public const STATUSES = ['draft', 'published'];

    private const SELECT = 'SELECT a.`id`, a.`category_id`, c.`name` AS `category`, c.`slug` AS `category_slug`,
            a.`heading`, a.`content`, a.`date`, a.`status`, a.`created_at`, a.`updated_at`
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

    /** Public listing by default; pass false in the admin to include drafts. */
    public function getAll(bool $publishedOnly = true): array
    {
        $where = $publishedOnly ? " WHERE a.`status` = 'published'" : '';

        return $this->db->query(self::SELECT . $where . self::ORDER)->fetchAll();
    }

    public function getLatest(int $limit): array
    {
        $sth = $this->db->prepare(self::SELECT . " WHERE a.`status` = 'published'" . self::ORDER . ' LIMIT ?');
        $sth->bindValue(1, $limit, PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchAll();
    }

    public function getByCategory(string $slug): array
    {
        $sth = $this->db->prepare(self::SELECT . " WHERE c.`slug` = ? AND a.`status` = 'published'" . self::ORDER);
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
    public function create(int $categoryId, string $heading, string $content, string $date, string $status = 'published'): int
    {
        $sth = $this->db->prepare(
            'INSERT INTO `article` (`category_id`, `heading`, `content`, `date`, `status`) VALUES (?, ?, ?, ?, ?)'
        );
        $sth->execute([$categoryId, $heading, $content, $date, $status]);

        return (int) $this->db->lastInsertId();
    }

    public function update(int $id, int $categoryId, string $heading, string $content, string $date, string $status): bool
    {
        $sth = $this->db->prepare(
            'UPDATE `article` SET `category_id` = ?, `heading` = ?, `content` = ?, `date` = ?, `status` = ?,
                `updated_at` = CURRENT_TIMESTAMP WHERE `id` = ?'
        );

        return $sth->execute([$categoryId, $heading, $content, $date, $status, $id]);
    }

    public function delete(int $id): bool
    {
        $sth = $this->db->prepare('DELETE FROM `article` WHERE `id` = ?');

        return $sth->execute([$id]);
    }
}
