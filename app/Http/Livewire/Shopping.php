<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Darryldecode\Cart\Facades\CartFacade;
use Livewire\Component;
use Livewire\WithPagination;

class Shopping extends Component
{
    use WithPagination;

    public User $user;
    public int $selectedUser;

    public function mount()
    {
        $this->user = User::find(1);
        $this->selectedUser = $this->user->id;
    }

    public function getCartOneProperty()
    {
        return CartFacade::session($this->user->cart_one)->getContent();
    }

    public function getCartTwoProperty()
    {
        return CartFacade::session($this->user->cart_two)->getContent();
    }

    public function getRules()
    {
        return [
            'user.id' => 'required'
        ];
    }

    public function render()
    {
        return view('livewire.shopping', [
            'products' => Product::paginate(8)
        ])
            ->layout('layout');
    }

    public function switchUserAction()
    {
        if ($this->selectedUser !== $this->user->id) {
            $this->user = User::find($this->selectedUser);
        }
    }

    public function addCartOneAction(int $productId)
    {
        $productSelected = Product::find($productId);

        CartFacade::session($this->user->cart_one)->add([
            'id' => $productSelected->id,
            'name' => $productSelected->title,
            'price' => $productSelected->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $productSelected
        ]);
    }

    public function addCartTwoAction(int $productId)
    {
        $productSelected = Product::find($productId);

        CartFacade::session($this->user->cart_two)->add([
            'id' => $productSelected->id,
            'name' => $productSelected->title,
            'price' => $productSelected->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $productSelected
        ]);
    }
}
