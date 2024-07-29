@props(['routeList'])

<select
    {{ $attributes->merge(['class' => 'mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm']) }}>
    <option value="">--seleccionar--</option>
    @forelse ((array)$routeList as $route)
        <option value="{{ $route }}">
            {{ $route }}
        </option>
    @empty
        <option value="" disabled>No hay rutas disponibles</option>
    @endforelse
</select>
