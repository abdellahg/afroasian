<div class="col-md-7">    
     <div class="form-group{{ $errors->has('en[name]') ? ' has-error' : '' }}">
        <div class="col-md-3"> 
            Name EN
        </div>
        <div class="col-md-9">
            {!! Form::text('en[name]', null, ['class' => 'form-control', 'required' => '',  'placeholder' => 'Name EN']) !!}

            @if ($errors->has('en[name]'))
                <span class="help-block">
                      <strong>{{ $errors->first('en[name]') }}</strong>
                  </span>
            @endif

            <br>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group{{ $errors->has('es[name]') ? ' has-error' : '' }}">
        <div class="col-md-3"> 
            Name ES
        </div>
        <div class="col-md-9">
            {!! Form::text('es[name]', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Name ES']) !!}

            @if ($errors->has('es[name]'))
                <span class="help-block">
                      <strong>{{ $errors->first('es[name]') }}</strong>
                  </span>
            @endif

            <br>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group{{ $errors->has('pt[name]') ? ' has-error' : '' }}">
        <div class="col-md-3"> 
            Name PT
        </div>
        <div class="col-md-9">
            {!! Form::text('pt[name]', null, ['class' => 'form-control','required' => '',  'placeholder' => 'Name PT']) !!}

            @if ($errors->has('pt[name]'))
                <span class="help-block">
                      <strong>{{ $errors->first('pt[name]') }}</strong>
                  </span>
            @endif

            <br>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
        <div class="col-md-3"> 
            Order
        </div>
        <div class="col-md-9">
            {!! Form::text('order', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Order']) !!}

            @if ($errors->has('order'))
                <span class="help-block">
                      <strong>{{ $errors->first('order') }}</strong>
                  </span>
            @endif

            <br>
        </div>
    </div>
    <div class="clearfix"></div>
     <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
         <div class="col-md-3"> 
            Status
        </div>
         <div class="col-md-9">
             {!! Form::select('active', ['1'=>'Active','0'=>'Not active'], null, ['class' => 'form-control']) !!}

             @if ($errors->has('active'))
                 <span class="help-block">
                     <strong>{{ $errors->first('active') }}</strong>
                  </span>
             @endif

             <br>
         </div>
     </div>
    <div class="clearfix"></div>
</div>

 @if(isset($bcategory) && $bcategory['photo'] != '' && $bcategory['photo'] != null)
         <meta name="csrf-token" content="{{ csrf_token() }}">
         <input type="hidden" id="bcategory-id" value="{{$bcategory['id']}}" />
         <input type="hidden" id="bcategory-image" name="oldImage" value="{{$bcategory['photo']}}" />
         
         <div id="edit-image">
             <div class="col-md-5 ajax-target " >
                <div class="thumbnail">
                    <img alt="290X180" style="height: 230px; width: 100%; display: block; cursor: pointer;" 
                         src="{{ url('/').'/public/assets/uploads/bcategories/'.$bcategory['photo'] }}" data-holder-rendered="true">
                    <div class="caption text-center">
                        <button type="button" data-url="" class="delete-img btn btn-warning"><i class="icon-trash" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="col-md-5 ajax-file" 
         data-default="{{url('/').'/assets/admin/images/default.jpg'}}">
        <a href="javascript:;" class="thumbnail">
            <img alt="290X180" style="height: 290px; width: 100%; display: block; cursor: pointer;"
                    src="{{url('/').'/assets/admin/images/default.jpg'}}" 
                    data-holder-rendered="true" 
             >
            <input type="file" style="display:none" name="bcategory_img" id="bcategory-img" >
        </a>
        @if ($errors->has('bcategory_img'))
            <span class="help-block red">
                  <strong>{{ $errors->first('bcategory_img') }}</strong>
              </span>
        @endif
    </div>
    @endif
    <div class="clearfix"></div>


    <div class="form-group">
        <div class="col-md-7 text-center">
            <button type="submit" class="btn btn-info">
                <i class="fa fa-btn fa-user"></i> Save
            </button>
            <br><br>
        </div>
    </div>
@if(isset($bcategory))
@section('page-script')
    <script type="text/javascript">
        (function () {
            $(document).on('click', ".delete-img", function (e) {
            e.preventDefault();
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var bcategoryId = $('#bcategory-id').val();
            var newImg = $('#bcategory-image').val();
            
            var addNewImg = '<div class="col-md-5 ajax-file" data-default="{{url('/').'/assets/admin/images/default.jpg'}}"><a href="javascript:;" class="thumbnail"><img alt="290X180" style="height: 290px; width: 100%; display: block; cursor: pointer;"src="{{url('/').'/assets/admin/images/default.jpg'}}" data-holder-rendered="true"><input type="file" style="display:none" name="bcategory_img" id="bcategory-img" ></a></div>';
            
            $.ajax({
              url: "{{ url('admin/blog/categories/delete-image') }}",
              headers: {'X-CSRF-TOKEN': token},
              method: 'post',
              data: {
                 id: bcategoryId,
                 image: newImg,
              },
              success: function(result){
                  if(result['status'] == 1){
                      $('#edit-image').html(addNewImg);
                  }
                  if(result['status'] == 0){
                      alert('error ocure at change image !');
                  }
            }});
            });
        })();
    </script>

@endsection

@endif

