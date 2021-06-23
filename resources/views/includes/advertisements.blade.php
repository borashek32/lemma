@foreach($advertisements as $advertisement)
    <div style="display:flex;justify-content:center">
        <a href="http://{{ $advertisement->link }}">
            <img src="{{ $advertisement->banner }}"
                 style="height:auto;background-size:cover;margin-bottom: 10px" width="130px"
                 alt="{{ $advertisement->link }}" />
        </a>
    </div>
@endforeach



