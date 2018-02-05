@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Products</div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['method'=>'POST', 'url'=>'/test']) !!}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <input type="submit" value="Test Product" />

                    {!! Form::close() !!}

                    <ul>
                    @foreach($products as $product)
                        <li>{{ $product->title }}</li>
                    @endforeach
                    </ul>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
