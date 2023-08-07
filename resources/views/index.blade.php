@extends('main.main')

@section('content')
    <div class="block__index__gradient-b">
        <div class="container">
            <filter-main-component
                :filter-items='{{$filterItem}}'
                :filter-value='{{$filterValue}}'
                :init-filter-url='@json(route('filter.initFilterUrl', '', false))'
            ></filter-main-component>
        </div>
    </div>
@endsection
