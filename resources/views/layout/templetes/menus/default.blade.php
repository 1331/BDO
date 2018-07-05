@if(is_object($items))
    <?php $items = $items->roots() ?>

    @foreach($items as $item)
        <li class="{{ $item->attribute('class') }}">
            @if($item->link) <a @if($item->hasChildren()) class="dropdown-toggle" data-toggle="dropdown" @endif href="{{ $item->url() }}">
                {!! $item->title !!}
                @if($item->hasChildren()) <b class="caret"></b> @endif
            </a>
            @else
                {{$item->title}}
            @endif
            @if($item->hasChildren())
                <ul class="dropdown-menu">
                    @foreach($item->children() as $child)
                        <li class="{{ $child->attribute('class') }}"><a href="{{ $child->url() }}">{{ $child->title }}</a></li>
                    @endforeach
                </ul>
            @endif
        </li>
        @if($item->divider)
            <li{{\HTML::attributes($item->divider)}}></li>
        @endif
    @endforeach
@endif