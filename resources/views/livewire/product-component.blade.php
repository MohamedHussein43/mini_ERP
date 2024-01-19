<div>
    @section('page_title')
        {{__("layout.products")}}
    @endsection
    @section('buttons')
    <a href="{{route('product.create')}}" class="btn btn-primary">{{__('products.create')}}</a>
    @endsection
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>{{__('layout.products')}}</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('products.id')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{__('products.name')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{__('products.description')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">{{__('products.price')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">{{__('products.created_at')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">{{__('manage.manage')}}</th>
                      <th>  </th>
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$product->id}}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$product->name}}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$product->description}}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$product->price}}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$product->created_at}}</p>
                                </td>
                                <td>
                                    <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-xs btn-success">{{__('manage.edit')}}</a>
                                    <a href="{{route('product.view',['id'=>$product->id])}}" class="btn btn-xs btn-primary">{{__('manage.view')}}</a>
                                </td>
                            </tr>
                        @endforeach
                        
                  </tbody>
                </table>
                <div>
                    {{ $products->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
