{{--@foreach (LocalizationService::getSelectLocaleRoute() as $menuCategory)--}}
{{--    <li class="nav-item dropdown">--}}
{{--        <a class="nav-link dropdown-toggle" href="{{ $menuCategory['url'] }}" id="navbarDropdownMenuLink" role="button"--}}
{{--           data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--            {{ $menuCategory['title'] }}--}}
{{--        </a>--}}
{{--        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--            @foreach($menuCategory['childMenu'] as $menuChild)--}}
{{--                <li><a class="dropdown-item" href="{{ $menuChild['url']}} ">{{ $menuChild['title'] }}</a></li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </li>--}}
{{--@endforeach--}}

{{--{{ LocalizationService::getSelectLocaleRoute()  }}--}}
