<ol class="breadcrumb">
    @if (!request()->routeIs('admin.dashboard'))
        <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
    @endif
    @foreach($breadcrumb as $item)
        @if (!$loop->last)
            <li class="breadcrumb-item">
                @if (!empty($item['vars']))
                    <a href="{{ route($item['route'], extract($item['vars'])) }}">{{ __($item['title']) }}</a>
                @else
                    <a href="{{ route($item['route']) }}">{{ __($item['title']) }}</a>
                @endif
            </li>
        @else
            <li class="breadcrumb-item active">{{ __($item['title']) }}</li>
        @endif
    @endforeach
</ol>
