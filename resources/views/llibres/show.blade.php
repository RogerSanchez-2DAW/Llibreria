@vite(['resources/css/app.css', 'resources/js/app.js'])

     <div class="bg-white shadow-md rounded-md p-4 border-black max-w-4xl mx-auto mt-10 text-center">
        @auth
        <a href="{{ route('store') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Return</a>
        <div class="flex text-center">
            <div class="w-22">
                <img src="{{$libros['libro']['image']}}" alt="Imagen del producto" class="w-22  rounded-md mb-4 ">
            </div>
            <div class="flex-col w-full">
                <div class="text-left ml-20">
                    <h1 class="text-4xl font-bold mb-2">{{$libros['libro']['title']}}</h1>
                </div>
                <div class="">
                    <p class="text-2xl mt-12 text-left ml-20">Una breve descripcion del libro</p>
                    <div class="text-left ml-20 text-gray-500">
                        <p class=" mb-4">{{$libros['libro']['description']}}</p>
                    </div>
                    <p class="text-2xl mt-12 text-left ml-20">Autor: </p>
                    <div class="text-left ml-20">
                        <p class="mb-4">{{$libros['libro']['author']}}</p>
                    </div>
                    <p class="text-2xl mt-12 text-left ml-20">Año de publicación: </p>
                    <div class="text-left ml-20">
                        <p class="mb-4">{{$libros['libro']['published_at']}}</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="text-end mr-10">
                    <p class="text-3xl text-gray-800 font-bold mb-2 ">{{$libros['libro']['price']}}€</p>
                </div>
            <div class="text-end">
                <a href="{{ route('addCart', $libros['libro']['id']) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Agregar al carrito</a>
            </div>
        @else
        <div class="flex text-center">
            <div class="w-22">
                <img src="{{$libros['libro']['image']}}" alt="Imagen del producto" class="w-22  rounded-md mb-4 ">
            </div>
            <div class="flex-col w-full">
                <div class="text-left ml-20">
                    <h1 class="text-4xl font-bold mb-2">{{$libros['libro']['title']}}</h1>
                </div>
                <div class="">
                    <p class="text-2xl mt-12 text-left ml-20">Una breve descripcion del libro</p>
                    <div class="text-left ml-20 text-gray-500">
                        <p class=" mb-4">{{$libros['libro']['description']}}</p>
                    </div>
                    <p class="text-2xl mt-12 text-left ml-20">Autor: </p>
                    <div class="text-left ml-20">
                        <p class="mb-4">{{$libros['libro']['author']}}</p>
                    </div>
                    <p class="text-2xl mt-12 text-left ml-20">Año de publicación: </p>
                    <div class="text-left ml-20">
                        <p class="mb-4">{{$libros['libro']['published_at']}}</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="text-end mr-10">
                    <p class="text-3xl text-gray-800 font-bold mb-2 ">{{$libros['libro']['price']}}€</p>
                </div>
            <div class="text-end">
                <a href="{{ route('register')}}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Inicia sesion para comprar</a>
            </div>
        @endauth


        </div>
