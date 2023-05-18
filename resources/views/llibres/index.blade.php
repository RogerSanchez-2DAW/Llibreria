<x-app-layout>
    <h1 class="text-2xl font-bold mb-4 text-center mt-10">Tienda de productos</h1>

    <div class="flex justify-evenly">
        @foreach ($libros['libros'] as $libro)

        <div class=" mt-16 bg-white shadow-md rounded-md p-4 border-black max-w-md">
            <div class="flex">
                <img src="{{$libro['image']}}" alt="Imagen del producto" class="w-20 h-32 mr-4">
                <div>
                    <h2 class="font-bold mb-1">{{$libro['title']}}</h2>
                    <p class="text-gray-500">{{$libro['description']}}</p>
                </div>
            </div>
            <div class="text-end">
                <a class="bg-blue-500 text-white px-4 py-2 rounded-md"href="{{route('show', $libro['id'])}}">Ver Libro</a>
            </div>

        </div>

        @endforeach
    </div>


</x-app-layout>
