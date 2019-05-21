<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>


    <title>Metapic</title>
  </head>
  <body>
     @if($errors->any())
        <div class="alert alert-danger text-center">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                @foreach($categories as $category)
                    <a href="{{ URL::route('getSearchDetails', ['category_id' => $category->id]) }}" class="btn btn-light">{{ $category->name }}</a>
                @endforeach
                <a href="{{ URL::route('index') }}" class="btn btn-light">All categories</a>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col-md-12">   
                {!! Form::open(['route'=>'search', 'method'=>'GET', 'id' => 'search_form']) !!}
                    {!! Form::text('search_term',null,['class'=>'form-control', 'placeholder'=>'Enter field name or category', 'required' => 'required']) !!}
                    {!! Form::submit('Search', ['class' => 'btn btn-primary', 'style' => 'margin-top:10px;']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row" style="margin-top:10px;">
            <div class="col-md-12">
                <table class="table table-bordered table-hover" id="dataTable"> 
                    <thead>
                        <tr>    
                            <th>#</th>
                            <th>Feed name</th>
                            <th>Category</th>
                            <th>Feed provider</th>
                            <th>No. of products</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                    </thead>
                        <tbody>
                        @foreach($stores as $store)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $store->feed_name }}</td>
                                <td>
                                    @if(count($store->category) != 0)
                                        @foreach($store->category as $category)
                                            {{ $category->name }}<br>
                                        @endforeach
                                    @else
                                        <p>/</p>
                                    @endif
                                </td>
                                <td>{{ $store->feed_provider }}</td>
                                <td>{{ $store->number_of_products }}</td>
                                <td>{{ $store->created_at }}</td>
                                <td>{{ $store->updated_at }}</td>
                            </tr>
                        @endforeach
                     </tbody>
                </table>
                {{ $stores->links() }}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
  </body>
</html>