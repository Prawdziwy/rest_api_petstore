<?php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PetApiService implements PetApiServiceInterface
{
	protected Client $client;

	public function __construct()
	{
		$this->client = new Client([
			'base_uri' => env('API_BASE_URL'),
			'timeout' => 2.0,
		]);
	}

	public function getPetsByStatus(string $status): array
	{
		return $this->apiRequest('get', '/v2/pet/findByStatus', ['query' => ['status' => $status]]);
	}

	public function getPetById(int $id): array
	{
		return $this->apiRequest('get', "/v2/pet/$id");
	}

	public function addPet(array $data): array
	{
		return $this->apiRequest('post', '/v2/pet', ['json' => $data]);
	}

	public function updatePet(int $id, array $data): array
	{
		return $this->apiRequest('put', '/v2/pet', ['json' => array_merge($data, ['id' => $id])]);
	}

	public function deletePet(int $id): void
	{
		$this->apiRequest('delete', "/v2/pet/$id");
	}

	private function apiRequest(string $method, string $endpoint, array $options = []): array
	{
		try {
			$response = $this->client->$method($endpoint, $options);
			return json_decode($response->getBody()->getContents(), true);
		} catch (RequestException $e) {
			if ($e->hasResponse()) {
				$responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
				if (isset($responseBody['message'])) {
					throw new \Exception($responseBody['message']);
				}
			}
			throw new \Exception('Wystąpił błąd podczas wykonywania żądania.');
		}
	}
}
