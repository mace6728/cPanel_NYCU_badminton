<?php
class ArticleService
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll(): array
    {
        $sth = $this->db->prepare('SELECT * FROM `article` ORDER BY `date` DESC');
        $sth->execute();

        return $sth->fetchAll();
    }

    public function getLatest(int $limit): array
    {
        $sth = $this->db->prepare('SELECT * FROM `article` ORDER BY `date` DESC LIMIT ?');
        $sth->bindValue(1, $limit, PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchAll();
    }

    public function getAllOrderedByTimer(): array
    {
        $sth = $this->db->prepare('SELECT * FROM `article` ORDER BY `timer` DESC');
        $sth->execute();

        return $sth->fetchAll();
    }

    public function getByCategory(string $category): array
    {
        $sth = $this->db->prepare('SELECT * FROM `article` WHERE `category` = ? ORDER BY `date` DESC');
        $sth->execute([$category]);

        return $sth->fetchAll();
    }

    public function getByTimer(string $timer): ?array
    {
        $sth = $this->db->prepare('SELECT * FROM `article` WHERE `timer` = ?');
        $sth->execute([$timer]);
        $row = $sth->fetch();

        return $row === false ? null : $row;
    }

    public function create(string $category, string $heading, string $content, string $date, string $timer): bool
    {
        $sql = 'INSERT INTO `article` (`category`, `heading`, `content`, `date`, `timer`) VALUES (?, ?, ?, ?, ?)';
        $sth = $this->db->prepare($sql);

        return $sth->execute([$category, $heading, $content, $date, $timer]);
    }

    public function update(string $timer, string $category, string $heading, string $content, string $date): bool
    {
        $sql = 'UPDATE `article` SET `category` = ?, `heading` = ?, `content` = ?, `date` = ? WHERE `timer` = ?';
        $sth = $this->db->prepare($sql);

        return $sth->execute([$category, $heading, $content, $date, $timer]);
    }

    public function delete(string $timer): bool
    {
        $sth = $this->db->prepare('DELETE FROM `article` WHERE `timer` = ?');

        return $sth->execute([$timer]);
    }
}
