<div class="header-content fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand order-2 order-lg-1" href="{{ route('index') }}">ShinaGo</a>
                <button class="navbar-toggler order-1" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-lg-1 order-2" id="navbarNavDropdown">
                    <ul class="navbar-nav">
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active" aria-current="page" href="#">Home</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">Features</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="#">Pricing</a>--}}
{{--                        </li>--}}

{{--                        @foreach (MenuService::getMenuType('header') as $menuCategory)--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" href="{{$menuCategory['url']}}" id="navbarDropdownMenuLink" role="button"--}}
{{--                               data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                {{$menuCategory['title']}}--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
{{--                                @foreach($menuCategory['childMenu'] as $menuChild)--}}
{{--                                <li><a class="dropdown-item" href="{{$menuChild['url']}}">{{$menuChild['title']}}</a></li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        @endforeach--}}
                    </ul>
                </div>
            </div>
        </nav>
        </nav>
    </div>
</div>
