<?php
declare(strict_types=1);

require_once __DIR__ . '/../DTO/PaymentMethodDTO.php';

class PaymentMethodRepository {
    public function __construct(private PDO $pdo) {}

    public function getAll(): array {
        $stmt = $this->pdo->query("SELECT * FROM payment_methods");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $methods = [];
        foreach ($data as $row) {
            $methods[] = new PaymentMethodDTO(
                (int)$row['id'],
                $row['name'],
                (int)$row['price']
            );
        }
        return $methods;
    }

    public function getById(int $id): ?PaymentMethodDTO {
        $stmt = $this->pdo->prepare("SELECT * FROM payment_methods WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }
        return new PaymentMethodDTO(
            (int)$row['id'],
            $row['name'],
            (int)$row['price']
        );
    }
}