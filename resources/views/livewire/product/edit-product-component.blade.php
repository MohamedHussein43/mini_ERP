<div>
    @section('page_title')
        {{__("products.edit")}}| {{$product->name}}
    @endsection
    <div class="content-wrapper" style ="margin-top: 50px">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card mb-4">
                <div class="card-body">
                    @if(Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        @if(Session::has('danger'))
                            <div class="alert alert-danger" role="alert">{{Session::get('danger')}}</div>
                        @endif
                    <form wire:submit.prevent="update_product">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input required wire:model.prevent="en_name" value="{{$product->attrByLocale('en','name')}}" type="text" class="form-control" placeholder="{{__('products.en_name')}}" name="en_name">
                                    @error('en_name')
                                        {{$message}}
                                    @enderror                                
                                </div>
                                <div class="col-md-6">
                                    <input required wire:model.prevent="ar_name" value="{{$product->attrByLocale('ar','name')}}" type="text" class="form-control" placeholder="{{__('products.ar_name')}}" name="ar_name">
                                    @error('ar_name')
                                        {{$message}}
                                    @enderror   
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <textarea required class="form-control" wire:model.prevent="en_description" placeholder="{{__('products.en_description')}}" name="en_description">{{$product->attrByLocale('en','description')}}</textarea>
                                    @error('en_description')
                                        {{$message}}
                                    @enderror   
                                </div>
                                <div class="col-md-6">
                                    <textarea required class="form-control" wire:model.prevent="ar_description" placeholder="{{__('products.ar_description')}}" name="ar_description">{{$product->attrByLocale('ar','description')}}</textarea>
                                    @error('ar_description')
                                        {{$message}}
                                    @enderror   
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input required wire:model.prevent="price" value="{{$product->getRawOriginal('price')}}" type="number" class="form-control" placeholder="{{__('products.price')}}" name="price">
                                    @error('price')
                                        {{$message}}
                                    @enderror                                
                                </div>
                            </div>
                        </div>

                         
                        <div class="">
                            <div class="row">
                                @foreach ($product->attachments as $file)
                                    <div class="col-md-3"> <img src="{{ asset('storage/' . $file->url) }}" class="img-thumbnail"> </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="">
                            <div class="row">
                                <div class="col-md-2">
                                    <button class="btn btn-outline-dark btn-sm btn-block" type="submit">{{__('products.update')}}</button> 
                                </div>
                               
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
