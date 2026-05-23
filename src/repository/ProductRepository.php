<?php
declare(strict_types=1);

require_once __DIR__ . '/../DTO/ProductDTO.php';

class ProductRepository {
    public function __construct(private PDO $pdo) {}

    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM products");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $products = [];
        foreach ($data as $row) {
            $products[] = new ProductDTO(
                (int)$row['id'],
                $row['slug'],
                $row['name'],
                (int)$row['price'],
                $row['image'],
                $row['description'] ?? '',
                $row['specs'] ?? '',
                $row['gallery'] ?? ''
            );
        }
        return $products;
    }

    public function getBySlug(string $slug): ?ProductDTO {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE slug = :slug");
        $stmt->execute([':slug' => $slug]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new ProductDTO(
            (int)$row['id'],
            $row['slug'],
            $row['name'],
            (int)$row['price'],
            $row['image'],
            $row['description'] ?? '',
            $row['specs'] ?? '',
            $row['gallery'] ?? ''
        );
    }

    public function getById(int $id): ?ProductDTO {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new ProductDTO(
            (int)$row['id'],
            $row['slug'],
            $row['name'],
            (int)$row['price'],
            $row['image'],
            $row['description'] ?? '',
            $row['specs'] ?? '',
            $row['gallery'] ?? ''
        );
    }

    /**
     * Vrátí omezený počet produktů pro sekci Doporučené
     */
    public function getFeatured(int $limit): array {
        $stmt = $this->pdo->prepare("SELECT * FROM products LIMIT :limit");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $products = [];
        foreach ($data as $row) {
            $products[] = new ProductDTO(
                (int)$row['id'],
                $row['slug'],
                $row['name'],
                (int)$row['price'],
                $row['image'],
                $row['description'] ?? '',
                $row['specs'] ?? '',
                $row['gallery'] ?? ''
            );
        }
        return $products;
    }

    /**
     * Vrátí produkty podle kategorie a volitelně i značky (hledá značku v názvu)
     */
    public function getByCategory(int $categoryId, ?string $brand = null): array {
        $sql = "SELECT * FROM products WHERE category_id = :category_id";
        $params = [':category_id' => $categoryId];

        if ($brand) {
            $sql .= " AND name LIKE :brand";
            $params[':brand'] = '%' . $brand . '%'; // Hledá značku kdekoli v názvu
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $products = [];
        foreach ($data as $row) {
            $products[] = new ProductDTO(
                (int)$row['id'],
                $row['slug'],
                $row['name'],
                (int)$row['price'],
                $row['image'],
                $row['description'] ?? '',
                $row['specs'] ?? '',
                $row['gallery'] ?? ''
            );
        }
        return $products;
    }
}
