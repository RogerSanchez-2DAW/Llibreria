<x-app-layout>
    @if(count(session('cart', [])) === 0)
        <p class="text-center text-4xl mt-12">No hay libros en el carrito.</p>
        <div class="text-center mt-14">
            <a href="{{ route('store') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md" type="submit">Go to shop</a>
        </div>
    @else
        <table id="cart" class="table table-hover table-condensed">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:10%">Product</th>
                    <th style="width:5%">Price</th>
                    <th style="width:15%">Quantity</th>
                    <th style="width:10%">Subtotal</th>
                    <th style="width:22%"></th>
                </tr>
                </thead>
                <tbody>
                <?php $total = 0 ?>
                @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                        <?php $total += $details['price'] * $details['quantity'] ?>
                        <tr class="border-b border-solid border-black ">
                            <td data-th="Product" >
                                <div class="row ml-24 mt-5">
                                    <div class="col-sm-3 hidden-xs "><img src="{{ $details['photo'] }}" width="100" height="100" class="img-responsive"/></div>
                                    <div class="col-sm-9">
                                        <h4 class="nomargin ">{{ $details['title'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">
                                <div class="ml-16">
                                    {{ $details['price'] }}€
                                </div>
                            </td>
                            <td data-th="Quantity">
                                <div class="ml-32">
                                    <form action="{{ route('cart.update', ['id' => $id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" class="form-control quantity" onchange="this.form.submit()" />
                                    </form>
                                </div>

                            </td>
                            <td data-th="Subtotal" class="text-center ">{{ $details['price'] * $details['quantity'] }}€</td>
                            <td class="actions" data-th="">
                                <form action="{{ route('cart.remove', ['id' => $id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-4 py-2 rounded-md" type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <td>
                        <div class="mt-20">
                            <a href="{{ route('store') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md" data-id="{{ $id }}"><i class="fa fa-trash-o"></i>Continue Shopping</a>
                        </div>
                    </td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total {{ $total }}€</strong></td>
                </tr>
                </tfoot>
            </table>
        </table>
    @endif
</x-app-layout>
