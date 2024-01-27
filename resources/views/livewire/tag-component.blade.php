<div>
    @section('page_title')
        {{__("layout.tags")}}
    @endsection
    @section('buttons')
    <a href="{{route('tag.create')}}" class="btn btn-primary">{{__('tags.create')}}</a>
    @endsection
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>{{__('layout.tags')}}</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{__('tags.id')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{__('tags.name')}}</th>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">{{__('tags.created_at')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">{{__('manage.manage')}}</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$tag->id}}</p>
                                </td>
                                <td>
                                    <p class="text-sm font-weight-bold mb-0">{{$tag->name}}</p>
                                </td>
                                
                                <td>
                                    <p style="margin-left: 100px" class="text-sm font-weight-bold mb-0">{{$tag->created_at}}</p>
                                </td>
                                <td>
                                    <a style="margin-left: 220px" href="{{route('tag.edit',['id'=>$tag->id])}}" class="btn btn-xs btn-success">{{__('manage.edit')}}</a>
                                    <a href="{{route('tag.view',['id'=>$tag->id])}}" class="btn btn-xs btn-primary">{{__('manage.view')}}</a>
                                </td>
                            </tr>
                        @endforeach
                        
                  </tbody>
                </table>
                <div>
                    {{ $tags->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
