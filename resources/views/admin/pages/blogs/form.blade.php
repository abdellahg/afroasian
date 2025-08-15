<div class="col-md-7">
        <div class="form-group{{ $errors->has('en[title]') ? ' has-error' : '' }}">
            <div class="col-md-3"> 
                Title EN
            </div>
            <div class="col-md-9">
                {!! Form::text('en[title]', null, ['class' => 'form-control', 'required' => '', 'placeholder' => 'Title EN']) !!}

                @if ($errors->has('en[title]'))
                    <span class="help-block">
                          <strong>{{ $errors->first('en[title]') }}</strong>
                      </span>
                @endif

                <br>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group{{ $errors->has('es[title]') ? ' has-error' : '' }}">
            <div class="col-md-3"> 
                Title ES
            </div>
            <div class="col-md-9">
                {!! Form::text('es[title]', null, ['class' => 'form-control','required' => '', 'placeholder' => 'Title ES']) !!}

                @if ($errors->has('es[title]'))
                    <span class="help-block">
                          <strong>{{ $errors->first('es[title]') }}</strong>
                      </span>
                @endif

                <br>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group{{ $errors->has('pt[title]') ? ' has-error' : '' }}">
            <div class="col-md-3"> 
                Title PT
            </div>
            <div class="col-md-9">
                {!! Form::text('pt[title]', null, ['class' => 'form-control','required' => '', 'placeholder' => 'Title PT']) !!}

                @if ($errors->has('pt[title]'))
                    <span class="help-block">
                          <strong>{{ $errors->first('pt[title]') }}</strong>
                      </span>
                @endif

                <br>
            </div>
        </div>
        <div class="clearfix"></div>
         <div class="form-group{{ $errors->has('bcategory_id') ? ' has-error' : '' }}">
             <div class="col-md-3"> 
                Category
            </div>
             <div class="col-md-9">
                 <select class="form-control" name="bcategory_id">
                     <option value="">Select blog category</option>
                     @foreach ($bcategories as $bcategory)
                        <option value="{{ $bcategory->id }}" @if(isset($blog))
                        @if($blog['category_id'] == $bcategory->id) selected @endif
                        @endif>{{ $bcategory->name }}</option>
                     @endforeach
                 </select>
                 @if ($errors->has('bcategory_id'))
                     <span class="help-block">
                          <strong>{{ $errors->first('bcategory_id') }}</strong>
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
    @if(isset($blog) && $blog['photo'] != '')
         <meta name="csrf-token" content="{{ csrf_token() }}">
         <input type="hidden" id="blog-id" value="{{$blog['id']}}" />
         <input type="hidden" id="blog-image" name="oldImage" value="{{$blog['photo']}}" />
         
         <div id="edit-image">
             <div class="col-md-5 ajax-target " >
                <div class="thumbnail">
                    <img alt="290X180" style="height: 230px; width: 100%; display: block; cursor: pointer;" src="{{ url('/').'/public/assets/uploads/blogs/'.$blog['photo'] }}" data-holder-rendered="true">
                    <div class="caption text-center">
                        <button type="button" data-url="" class="delete-img btn btn-warning"><i class="icon-trash" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="col-md-5 ajax-file" data-default="{{url('/').'/assets/admin/images/default.jpg'}}">
        <a href="javascript:;" class="thumbnail">
            <img alt="290X180" style="height: 290px; width: 100%; display: block; cursor: pointer;"
                    src="{{url('/').'/assets/admin/images/default.jpg'}}" 
                    data-holder-rendered="true" 
             >
            <input type="file" style="display:none" name="blog_img" id="blog-img" >
            
        </a>
        @if ($errors->has('blog_img'))
            <span class="help-block red">
                  <strong>{{ $errors->first('blog_img') }}</strong>
              </span>
        @endif
    </div>
    @endif
    <div class="clearfix"></div>
    <hr>
    <div class="col-md-12">
        <div class="tabbable">
            <ul class="nav nav-pills nav-pills-toolbar nav-justified">
                <li class="active"><a href="#toolbar-justified-pill1" data-toggle="tab">Blog text EN</a></li>
                <li><a href="#toolbar-justified-pill2" data-toggle="tab">Blog text ES</a></li>
                <li><a href="#toolbar-justified-pill3" data-toggle="tab">Blog text PT</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="toolbar-justified-pill1">
                    <div class="form-group{{ $errors->has('en[text]') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            {!! Form::textarea('en[text]', null, ['class' => 'summernote', 'placeholder' => 'Write blog text here', 'rows' => '8']) !!}

                            @if ($errors->has('en[text]'))
                                <span class="help-block">
                                      <strong>{{ $errors->first('en[text]') }}</strong>
                                  </span>
                            @endif

                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tab-pane" id="toolbar-justified-pill2">
                    <div class="form-group{{ $errors->has('es[text]') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            {!! Form::textarea('es[text]', null, ['class' => 'summernote', 'placeholder' => 'Write blog text here', 'rows' => '8']) !!}

                            @if ($errors->has('es[text]'))
                                <span class="help-block">
                                      <strong>{{ $errors->first('es[text]') }}</strong>
                                  </span>
                            @endif

                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tab-pane" id="toolbar-justified-pill3">
                    <div class="form-group{{ $errors->has('pt[text]') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            {!! Form::textarea('pt[text]', null, ['class' => 'summernote', 'placeholder' => 'Write blog text here', 'rows' => '8']) !!}

                            @if ($errors->has('pt[text]'))
                                <span class="help-block">
                                      <strong>{{ $errors->first('pt[text]') }}</strong>
                                  </span>
                            @endif

                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3 text-center">
            <button type="submit" class="btn btn-info">
                <i class="fa fa-btn fa-user"></i> Save
            </button>
            <br><br>
        </div>
    </div>
@if(isset($blog))
@section('page-script')
    <script type="text/javascript">
        (function () {
            $(document).on('click', ".delete-img", function (e) {
            e.preventDefault();
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var blogId = $('#blog-id').val();
            var newImg = $('#blog-image').val();
            
            var addNewImg = '<div class="col-md-5 ajax-file" data-default="{{url('/').'/assets/admin/images/default.jpg'}}"><a href="javascript:;" class="thumbnail"><img alt="290X180" style="height: 290px; width: 100%; display: block; cursor: pointer;"src="{{url('/').'/assets/admin/images/default.jpg'}}" data-holder-rendered="true"><input type="file" style="display:none" name="blog_img" id="blog-img" ></a></div>';
            
            $.ajax({
              url: "{{ url('admin/blogs/delete-image') }}",
              headers: {'X-CSRF-TOKEN': token},
              method: 'post',
              data: {
                 id: blogId,
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