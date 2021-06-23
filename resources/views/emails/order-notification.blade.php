@component('mail::message')
<h3 class="text-center">На сайте Lemma-auto.ru размещен новый заказ.
<br>
<br>
Номер заказа: {{ $order->order_number }}
<br>
<br>
Итоговая стоимость: {{ $order->total }} руб.
<br>
<br>
Доставка: {{ $order->contact->address }}
<br>
<br>
Оплата: {{ $order->payment->payment_method }}
</h3>
<br>
<br>
Новый заказ:

@component('mail::table')
| Каталожный номер  | Название          | Количество |
| ----------------- |:-----------------:| ----------:|
@foreach($order->products as $product)
| {{ $product->code }} | {{ $product->title }} | {{ $product->pivot->product_quantity }} |
@endforeach
@endcomponent

Не забудьте поменять статус заказа на "completed" в панеле администратора сайта,
как заказ быдет укомплектован и доставлен в выбранный офис:)
@component('mail::button', ['url' => 'http://lemma-auto.ru/login'])
Перейти на сайт
@endcomponent
@endcomponent
