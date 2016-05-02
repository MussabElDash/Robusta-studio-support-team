@if($headers && count($headers) > 0)
    <h1>
        {{$headers[0]}}
        @foreach(array_slice($headers,1) as $value)
            {!! ' <small>' !!}
            {{$value}}
        @endforeach
        @foreach(array_slice($headers,1) as $value)
            {!! ' </small>' !!}
        @endforeach
    </h1>
@endif

@if($footers && count($footers) > 0)
    <ol class="breadcrumb">
        @foreach($footers as $key => $value)
            @if(empty($value['active']))
                {!! '<li>' !!}
            @else
                {!! '<li class="active">' !!}
            @endif

            @if(empty($value['href']) && empty($value['class']))
                {{$key}}
            @elseif(empty($value['href']))
                <i class="fa {{$value['class']}}"></i>
                {{$key}}
            @elseif(empty($value['class']))
                <a href="{{$value['href']}}">{{$key}}</a>
            @else
                <a href="{{$value['href']}}"><i class="fa {{$value['class']}}"></i>{{$key}}</a>
            @endif
            {!! '</li>' !!}
        @endforeach
    </ol>
@endif