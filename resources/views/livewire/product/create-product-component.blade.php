<div>
    @section('page_title')
        {{__("products.create")}}
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
                    <form wire:submit.prevent="creat_product" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input required wire:model.prevent="en_name" value="{{old('en_name')}}" type="text" class="form-control" placeholder="{{__('products.en_name')}}" name="en_name">
                                    @error('en_name')
                                        {{$message}}
                                    @enderror                                
                                </div>
                                <div class="col-md-6">
                                    <input required wire:model.prevent="ar_name" value="{{old('ar_name')}}" type="text" class="form-control" placeholder="{{__('products.ar_name')}}" name="ar_name">
                                    @error('ar_name')
                                        {{$message}}
                                    @enderror   
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <textarea required class="form-control" wire:model.prevent="en_description" placeholder="{{__('products.en_description')}}" name="en_description">{{old('en_description')}}</textarea>
                                    @error('en_description')
                                        {{$message}}
                                    @enderror   
                                </div>
                                <div class="col-md-6">
                                    <textarea required class="form-control" wire:model.prevent="ar_description" placeholder="{{__('products.ar_description')}}" name="ar_description">{{old('ar_description')}}</textarea>
                                    @error('ar_description')
                                        {{$message}}
                                    @enderror   
                                </div>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input required wire:model.prevent="price" value="{{old('price')}}" type="number" class="form-control" placeholder="{{__('products.price')}}" name="price">
                                    @error('price')
                                        {{$message}}
                                    @enderror                                
                                </div>
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input required wire:model.prevent="attachments" type="file" multiple="multiple" class="form-control" name="attachments[]">
                                    @error('attachments')
                                        {{$message}}
                                    @enderror                                
                                </div>
                            
                            </div>
                        </div>

                        <div class="">
                            <div class="row">
                                <div class="col-md-2">
                                    <button class="btn btn-outline-dark btn-sm btn-block" type="submit">{{__('products.create')}}</button> 
                                </div>
                               
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
