<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}" />
    <title>Terasedap - Cart</title>
</head>
<body>
    <center>
        <div class="logo">
            <a href="{{ route('food-items') }}">
                <img src="{{ asset('images/fortunate_logo.png') }}" alt="logo" />
            </a>
        </div>
    </center>
    <div class="summary">
        <h2>Cart Summary</h2>
        <div id="cart-list">
            @foreach ($cart->items as $item)
            <livewire:Components.CardItems :detail="$item" :fooddetail="$item->food" wire:key="{{ $item->id }}" />
            @endforeach
        </div>
        <div class="addmore">
            <a href="{{ route('food-items') }}">
                <img src="images/addmorebutton.png" alt="" />
            </a>
        </div>
        <div class="subtotal">
            <p>Total Payment</p>
            <livewire:Components.Subtotal :cart="$cart" />
        </div>
        <form action="{{ route('confirmOrder') }}" method="post">
            @csrf
            <div style="width: 100%;">
                <div class="selection">
                    <h3>Select payment method</h3>
                    <select name="paymentMethod" id="paymentMethod">
                        <option value="cash">Cash</option>
                        <option value="qris">QRIS</option>
                        <option value="card">Card</option>
                    </select>
                </div>
                <div style="display: flex; justify-content:space-between; width:100%; margin-top: 20px;">
                    <a href="{{ route('food-items') }}">Back</a>
                    <button type="submit" class="cart-order">Place Order</button>
                </div>
            </div>
        </form>
    </div>

    @foreach ($cart->items as $item)
    <livewire:Components.NotesModal wire:key="{{$item->id}}" itemId="{{$item->id}}" />
    @endforeach
</body>
</html>