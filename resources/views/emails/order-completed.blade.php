@component('mail::message')
<h3 class="text-center">Ваш заказ укомплектован и ожидает в пункте выдачи.
Для согласования времени выдачи  свяжитесь с нашим менеджером
<a href="tel:+79267013882">+7 926 701 38 82</a>
<br>
<br>
Номер заказа: {{ $order->order_number }}
<br>
<br>
Итоговая стоимость: {{ $order->total }} руб.
<br>
<br>
Адрес пункта выдачи: {{ $order->contact->address }}
<br>
<br>
Способ оплаты: {{ $order->payment->payment_method }}
</h3>
<br>
<br>
Ваш заказ:

@component('mail::table')
| Каталожный номер  | Название          | Количество |
| ----------------- |:-----------------:| ----------:|
@foreach($order->products as $product)
| {{ $product->code }} | {{ $product->title }} | {{ $product->pivot->product_quantity }} |
@endforeach
@endcomponent

Рады видеть вас в нашем магазине в следующий раз
@component('mail::button', ['url' => 'http://lemma-auto.ru/login'])
Перейти на сайт
@endcomponent
@endcomponent
