<div class="table-responsive">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>  
                @if (auth()->check())
                @if (auth()->user()->isAdmin())              
                <th colspan="3">Action</th>
                 @endif
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td><img src="{{ $product->pdt_image }}" width="30" alt="Product image" /> </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->category->name }}</td>
                @if (auth()->check())
                @if (auth()->user()->isAdmin())
                <td>

                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('products.show', [$product->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        @can('update-product', $product)
                        <a href="{{ route('products.edit', [$product->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        @endcan   
                        @can('delete-product', $product)                    
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                   
                </td>
                 @endif
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
