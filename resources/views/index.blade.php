@extends('main.main')

@section('content')
    <div class="block__index__gradient-b">
        <div class="container">
            <filter-main-component
                :filter-items='{{$filterSection}}'
                :filter-value='{{$filterSectionItem}}'
                :init-filter-url='@json(route('filter.initFilterUrl', '', false))'
            ></filter-main-component>
        </div>
    </div>
@endsection
