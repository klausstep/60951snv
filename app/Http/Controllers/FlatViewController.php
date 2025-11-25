<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;

use App\Models\Flat;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class FlatViewController extends Controller
{
    public function index(): View
    {
        $flats = Flat::with(['house', 'counters'])->get();
        return view('flats.index', compact('flats'));
    }

    public function show(string $id): View
    {
        $flat = Flat::with(['house', 'counters', 'payments'])->findOrFail($id);
        return view('flats.show', compact('flat'));
    }

    public function create(): View
    {
        $houses = House::all();
        return view('flats.create', compact('houses'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_house' => 'required|exists:houses,id',
            'area' => 'required|numeric|min:20|max:500',
            'residents' => 'required|integer|min:1|max:10',
            'number' => [
                'required',
                'integer',
                'min:1',
                'max:999',
                Rule::unique('flats')->where(function ($query) use ($request) {
                    return $query->where('id_house', $request->id_house);
                })
                // ↑↑↑ БЕЗ ->ignore() ↑↑↑
            ]
        ], [
            'number.unique' => 'Квартира с таким номером уже существует в этом доме',
            'residents.max' => 'В квартире не может быть больше 10 жильцов',
            'area.max' => 'Площадь квартиры не может превышать 500 м²',
            'number.max' => 'Номер квартиры не может быть больше 999'
        ]);

        Flat::create($request->all());

        return redirect()->route('flats.index')
            ->with('success', 'Квартира успешно создана!');
    }

    public function edit(string $id)
    {
        if (!Gate::allows('edit-flat')) {
            return redirect('/error')->with('message',
                'У вас нет прав для редактирования информации о квартирах');
        }

        $flat = Flat::findOrFail($id);
        $houses = House::all();
        return view('flats.edit', compact('flat', 'houses'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'id_house' => 'required|exists:houses,id',
            'area' => 'required|numeric|min:20|max:500',
            'residents' => 'required|integer|min:1|max:10',
            'number' => [
                'required',
                'integer',
                'min:1',
                'max:999',
                Rule::unique('flats')->where(function ($query) use ($request) {
                    return $query->where('id_house', $request->id_house);
                })->ignore($id)
            ]
        ], [
            'number.unique' => 'Квартира с таким номером уже существует в этом доме',
            'residents.max' => 'В квартире не может быть больше 10 жильцов',
            'area.max' => 'Площадь квартиры не может превышать 500 м²',
            'number.max' => 'Номер квартиры не может быть больше 999'
        ]);

        $flat = Flat::findOrFail($id);
        $flat->update($request->all());

        return redirect()->route('flats.index')
            ->with('success', 'Квартира успешно обновлена!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $flat = Flat::findOrFail($id);
        $flat->delete();

        return redirect()->route('flats.index')
            ->with('success', 'Квартира успешно удалена!');
    }
}
