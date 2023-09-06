@extends("layouts/template")
@section("content")
    <div class="mt-5">
        <h1>Stripe index page</h1>
        <form action="/stripe_checkout" method="POST">
            @csrf
            <button type="submit">Checkout</button>
        </form>
    </div>
@endsection
