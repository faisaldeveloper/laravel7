<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{{ route('categories.index') }}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{{ route('products.index') }}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>

<li class="{{ Request::is('photos*') ? 'active' : '' }}">
    <a href="{{ route('photos.index') }}"><i class="fa fa-edit"></i><span>Photos</span></a>
</li>

<li class="{{ Request::is('albums*') ? 'active' : '' }}">
    <a href="{{ route('albums.index') }}"><i class="fa fa-edit"></i><span>Albums</span></a>
</li>

