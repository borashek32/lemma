@component('mail::message')
<h3 class="text-center">Ваш заказ успешно размещен. Наш менеджер свяжется с вами в
ближайшее время для подтверждения наличия запасных частей у поставщика
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

Мы пришлем уведомление вам на почту, как ваш заказ будет укомплектован.
Также вы можете узнать статус заказа в личном кабинте. Перейдите на сайт:
@component('mail::button', ['url' => 'http://lemma-auto.ru/login'])
Перейти на сайт
@endcomponent
@endcomponent
