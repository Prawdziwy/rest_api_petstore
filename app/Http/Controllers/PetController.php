<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Services\PetApiServiceInterface;

class PetController extends Controller
{
    protected PetApiServiceInterface $petApiService;

    public function __construct(PetApiServiceInterface $petApiService)
    {
        $this->petApiService = $petApiService;
    }

    public function index(): View
    {
        $pets = $this->petApiService->getPetsByStatus('available');
        return view('pets.index', compact('pets'));
    }

    public function show(int $id): View
    {
        try {
            $pet = $this->petApiService->getPetById($id);
        } catch (\Exception $e) {
            return view('errors.api', ['message' => $e->getMessage()]);
        }
        return view('pets.show', compact('pet'));
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            $pet = $this->petApiService->addPet($request->all());
        } catch (\Exception $e) {
            return redirect()->route('pets.create')->withErrors($e->getMessage());
        }
        return redirect()->route('pets.show', $pet['id']);
    }

    public function edit(int $id): View
    {
        try {
            $pet = $this->petApiService->getPetById($id);
        } catch (\Exception $e) {
            return view('errors.api', ['message' => $e->getMessage()]);
        }
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        try {
            $pet = $this->petApiService->updatePet($id, $request->all());
        } catch (\Exception $e) {
            return redirect()->route('pets.edit', $id)->withErrors($e->getMessage());
        }
        return redirect()->route('pets.show', $pet['id']);
    }

    public function create(): View
    {
        return view('pets.create');
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->petApiService->deletePet($id);
        } catch (\Exception $e) {
            return redirect()->route('pets.index')->withErrors($e->getMessage());
        }
        return redirect()->route('pets.index');
    }
}
