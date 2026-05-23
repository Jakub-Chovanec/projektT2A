<?php
declare(strict_types=1);

require_once __DIR__ . '/../DTO/ShippingMethodDTO.php';

class ShippingMethodRepository {
    public function __construct(private PDO $pdo) {}

    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM shipping_methods");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $methods = [];
        foreach ($data as $row) {
            $methods[] = new ShippingMethodDTO(
                (int)$row['id'],
                $row['name'],
                (int)$row['price'],
                $row['delivery_time']
            );
        }
        return $methods;
    }

    public function getById(int $id): ?ShippingMethodDTO {
        $stmt = $this->pdo->prepare("SELECT * FROM shipping_methods WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }
        return new ShippingMethodDTO(
            (int)$row['id'],
            $row['name'],
            (int)$row['price'],
            $row['delivery_time']
        );
    }
}