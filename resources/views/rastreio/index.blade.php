@include('rastreio.includes.header')

    @if (isset($results))
        @include('rastreio.includes.result')
    @else
        @include('rastreio.includes.form')
    @endif

@include('rastreio.includes.footer')
