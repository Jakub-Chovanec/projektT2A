<?php
declare(strict_types=1);

require_once __DIR__ . '/../DTO/CategoryDTO.php';

class CategoryRepository {
    public function __construct(private PDO $pdo) {}

    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM categories ORDER BY name ASC");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $categories = [];
        foreach ($data as $row) {
            $categories[] = new CategoryDTO(
                (int)$row['id'],
                $row['name'],
                $row['slug']
            );
        }
        return $categories;
    }

    public function getBySlug(string $slug): ?CategoryDTO {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE slug = :slug");
        $stmt->execute([':slug' => $slug]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return new CategoryDTO(
            (int)$row['id'],
            $row['name'],
            $row['slug']
        );
    }
}