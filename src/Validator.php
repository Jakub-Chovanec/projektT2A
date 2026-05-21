<?php
declare(strict_types=1);

class Validator {
    private array $errors = [];

    public function required(string $field, mixed $value, string $message): self {
        if (!isset($this->errors[$field]) && trim((string)$value) === '') {
            $this->errors[$field] = $message;
        }
        return $this;
    }

    public function email(string $field, mixed $value, string $message): self {
        if (!isset($this->errors[$field]) && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $message;
        }
        return $this;
    }

    public function minLength(string $field, mixed $value, int $min, string $message): self {
        if (!isset($this->errors[$field]) && mb_strlen(trim((string)$value)) < $min) {
            $this->errors[$field] = $message;
        }
        return $this;
    }

    public function maxLength(string $field, mixed $value, int $max, string $message): self {
        if (!isset($this->errors[$field]) && mb_strlen(trim((string)$value)) > $max) {
            $this->errors[$field] = $message;
        }
        return $this;
    }

    public function pattern(string $field, mixed $value, string $regex, string $message): self {
        if (!isset($this->errors[$field]) && !preg_match($regex, (string)$value)) {
            $this->errors[$field] = $message;
        }
        return $this;
    }

    public function in(string $field, mixed $value, array $allowed, string $message): self {
        if (!isset($this->errors[$field]) && !in_array($value, $allowed)) {
            $this->errors[$field] = $message;
        }
        return $this;
    }

    public function isValid(): bool {
        return empty($this->errors);
    }

    public function getErrors(): array {
        return $this->errors;
    }

    public function getError(string $field): ?string {
        return $this->errors[$field] ?? null;
    }

    public function hasError(string $field): bool {
        return isset($this->errors[$field]);
    }
}