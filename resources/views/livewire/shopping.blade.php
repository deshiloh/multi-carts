<div class="bg-gray-100 min-h-screen p-10">
    <div class="container mx-auto">
        <div class="py-4">
            Utilisateur actuel : {{ $user->id }} / {{ $user->name }}
            <div class="space-y-4">
                <input type="text" wire:model.defer="selectedUser">
                <button wire:click="switchUserAction">Change d'utilisateur</button>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-6">
            <div class="cart-item">
                <div class="text-xl mb-3">
                    Panier 1
                </div>
                <table class="table-auto w-full">
                    <thhead>
                        <tr>
                            <th class="text-left">Produit</th>
                            <th class="text-left">Quantité</th>
                        </tr>
                    </thhead>
                    <tbody>
                    @forelse($this->cart_one as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">
                                Aucun article
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="cart-item">
                <div class="text-xl mb-3">Panier 2</div>
                <table class="table-auto w-full">
                    <thhead>
                        <tr>
                            <th class="text-left">Produit</th>
                            <th class="text-left">Quantité</th>
                        </tr>
                    </thhead>
                    <tbody>
                    @forelse($this->cart_two as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">
                                Aucun article
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="bg-white p-4 my-4 shadow">
            <section class="text-gray-600 body-font">
                <div class="flex flex-wrap -m-4">
                    @foreach($products as $product)
                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                            <a class="block relative h-48 rounded overflow-hidden">
                                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
                            </a>
                            <div class="mt-4">
                                <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                                <h2 class="text-gray-900 title-font text-lg font-medium">{{ $product->title }}</h2>
                                <p class="mt-1">{{ $product->price }} €</p>
                                <div class="grid grid-cols-2 gap-4">
                                    <button wire:click="addCartOneAction('{{ $product->id }}')">Ajouter panier 1</button>
                                    <button wire:click="addCartTwoAction('{{ $product->id }}')">Ajouter panier 2</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <div class="py-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
