<?php

namespace App\Services;

interface PetApiServiceInterface
{
	public function getPetsByStatus(string $status): array;
	public function getPetById(int $id): array;
	public function addPet(array $data): array;
	public function updatePet(int $id, array $data): array;
	public function deletePet(int $id): void;
}
