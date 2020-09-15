<ul class="collection with-header">
    <li class="collection-header"><h5>Categories</h5></li>
    @foreach($categories as $category)
        <li class="collection-item selectQuestion" data-id="{{ $category->id }}"><a href="{{ route('category.filter', $category->slug) }}">{{ $category->name }}</a></li>
    @endforeach
</ul>
