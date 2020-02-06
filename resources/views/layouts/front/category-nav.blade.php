<ul class="list-unstyled list-inline nav navbar-nav">
    @foreach($categories as $category)
        <li>
            @if (app()->getLocale() == 'ar')
                @if($category->children()->count() > 0)
                @include('layouts.front.category-sub', ['subs' => $category->children])
                @else
                <a @if(request()->segment(2) == $category->slug) class="active" @endif href="{{route('front.category.slug', $category->slug)}}">{{$category->name_ar}} </a>
                @endif
            @else
                @if($category->children()->count() > 0)
                @include('layouts.front.category-sub', ['subs' => $category->children])
                @else
                <a @if(request()->segment(2) == $category->slug) class="active" @endif href="{{route('front.category.slug', $category->slug)}}">{{$category->name}} </a>
                @endif 
            @endif
        </li>
    @endforeach
</ul>
