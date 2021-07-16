<div class="bg-gray-200">
    <div class="flex flex-col items-center p-4 justify-center">
        <div class="flex flex-col">
            @foreach($payments as $payment)
                <label class="inline-flex items-center mt-3">
                    <input type="radio" name="payment_id" value="{{ $payment->id }}" id=""
                           class="form-radio h-5 w-5 text-green-600">
                    <p class="ml-2 text-gray-700">{{ $payment->payment_method }}</p>
                </label>
            @endforeach
        </div>
    </div>
</div>
