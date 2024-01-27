<div>
    <div>
        @section('page_title')
            {{__("tags.edit")}}| {{$tag->name}}
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
                        <form wire:submit.prevent="update_tag">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input required wire:model.prevent="en_name" value="{{$tag->attrByLocale('en','name')}}" type="text" class="form-control" placeholder="{{__('products.en_name')}}" name="en_name">
                                        @error('en_name')
                                            {{$message}}
                                        @enderror                                
                                    </div>
                                    <div class="col-md-6">
                                        <input required wire:model.prevent="ar_name" value="{{$tag->attrByLocale('ar','name')}}" type="text" class="form-control" placeholder="{{__('products.ar_name')}}" name="ar_name">
                                        @error('ar_name')
                                            {{$message}}
                                        @enderror   
                                    </div>
                                </div>
                            </div>
    
                            <div class="">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button class="btn btn-outline-dark btn-sm btn-block" type="submit">{{__('tags.update')}}</button> 
                                    </div>
                                   
                                </div>
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
</div>
