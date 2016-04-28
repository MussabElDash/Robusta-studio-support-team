@if (session()->has('flash_notification.message'))
    @if (session()->has('flash_notification.overlay'))
        @include('flash::modal', [
            'modalClass' => 'flash-modal', 
            'title'      => session('flash_notification.title'), 
            'body'       => session('flash_notification.message')
        ])
    @else
        <div class="alert alert-{{ session('flash_notification.level') }}">
            <button type="button"
                    class="close"
                    data-dismiss="alert"
                    aria-hidden="true">&times;</button>

            {{--*/ $body =  session('flash_notification.message') /*--}}
            @if($body instanceof Illuminate\Support\MessageBag)
                {{--*/ $body =  $body->toArray() /*--}}
            @endif
            @if(is_array($body))
                <ul>
                @foreach($body as $key => $value)
                    {{-- var_dump($value) --}}
                    <li>{{ $value[0] }}</li>
                @endforeach
                </ul>
            @else
                {!! session('flash_notification.message') !!}
            @endif
        </div>
    @endif
@endif