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

    public function getById(int $id): ?ProductDTO {
        $stmt = $this->pdo->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new ProductDTO(
            (int)$row['id'],
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
