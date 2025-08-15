<div class="row">
		<div class="col-md-6">
	         <div class="form-group">
                <div class="col-md-3"> 
                    Name EN
                </div>
                <div class="col-md-9">
                    {!! Form::text('en[name]', null, ['class' => 'form-control', 'id'=>'name-en', 'placeholder' => 'Name EN']) !!}
                    
                    <span class="name-en-error"> </span>
                    <br>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <div class="col-md-3"> 
                    Name ES
                </div>
                <div class="col-md-9">
                    {!! Form::text('es[name]', null, ['class' => 'form-control', 'id'=>'name-es', 'placeholder' => 'Name ES']) !!}
        
                    <span class="name-es-error"> </span>
                    <br>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <div class="col-md-3"> 
                    Name PT
                </div>
                <div class="col-md-9">
                    {!! Form::text('pt[name]', null, ['class' => 'form-control', 'id'=>'name-pt', 'placeholder' => 'Name PT']) !!}
        
                    <span class="name-pt-error"> </span>
                    <br>
                </div>
            </div>
	    </div>
	    
	    <div class="col-md-6">
            <div class="form-group">
                <div class="col-md-3"> 
                    Order
                </div>
                <div class="col-md-9">
                    {!! Form::text('order', null, ['class' => 'form-control', 'id'=>'order', 'placeholder' => 'order']) !!}
                    <span class="order-error"> </span>
                    <br>
                </div>
            </div>
            
            <div class="form-group">
             <div class="col-md-3"> 
                Status
            </div>
             <div class="col-md-9">
                 {!! Form::select('active', ['1'=>'Active','0'=>'Not active'], null, ['class' => 'form-control']) !!}
                 <span class="active-error"> </span>
                 <br>
             </div>
            </div>
    </div>
	    
	</div>

    
	   
	<hr>
	<br>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        @if(isset($gallery))
                            @foreach ($images as $img)
                                <div class="col-md-4 ajax-target" id="img-block{{$img->id}}">
                                    <div class="thumbnail">
                                         <meta name="csrf-token" content="{{ csrf_token() }}">
                                        
                                        <img alt="290X180" style="height: 180px; width: 100%; display: block; cursor: pointer;" src="{{ url('/').'/public/assets/uploads/galleries/'.$img->photo_title }}" data-holder-rendered="true">
                                        <div class="caption text-center">
                                            <button type="button" data-url="" class="delete-img btn btn-warning" img-id="{{$img->id}}" img-name="{{$img->photo_title}}" ><i class="icon-trash" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="col-md-4 ajax-file" data-default="{{url('/').'/assets/admin/images/default.jpg'}}">
                            <a href="javascript:;" class="thumbnail">
                                <img alt="290X180" style="height: 180px; width: 100%; display: block; cursor: pointer;" src="{{url('/').'/assets/admin/images/default.jpg'}}" data-holder-rendered="true">
                                <input type="file" style="display:none" name="imgs[]" accept="image/*">
                                <div class="caption text-center">
                                    <button type="button" class="file-generate btn btn-success"><i class=" icon-add" aria-hidden="true"></i></button>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <br>
     <div class="row text-center">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary item-submit"> Save </button>
        </div>
     </div>
    <div class="clearfix"></div>
    <br>

@section('page-script')
   <script type="text/javascript">
        (function () {
            $(document).on('click', ".item-submit", function (e) {
            
            var nameEn = $('#name-en').val();
            var nameEs = $('#name-es').val();
            var namePt = $('#name-pt').val();
            var order = $('#order').val();
            
        
            
            if(nameEn == ''){
                $('#name-en').css("border-color", "#D84315");
                $('.name-en-error').html("<small class='red'>The Name En field is required </small>");
                swal('The Name En field is required');
                return false;
            }else{
                $('#name-en').css("border-color", "#ddd");
                $('.name-en-error').html("");
            }
                
            if(nameEs == ''){
                $('#name-es').css("border-color", "#D84315");
                $('.name-es-error').html("<small class='red'>The Name Es field is required </small>");
                swal('The Name Es field is required');
                return false;
            }else{
                $('#name-es').css("border-color", "#ddd");
                $('.name-es-error').html("");
            }
            
            if(namePt == ''){
                $('#name-pt').css("border-color", "#D84315");
                $('.name-pt-error').html("<small class='red'>The Name Pt field is required </small>");
                swal('The Name Pt field is required');
                return false;
            }else{
                $('#name-pt').css("border-color", "#ddd");
                $('.name-pt-error').html("");
            }
            
            
            
            
            if(order == ''){
                $('#order').css("border-color", "#D84315");
                $('.order-error').html("<small class='red'>The order field is required </small>");
                swal('The order field is required');
                return false;
            }else if(!$.isNumeric(order)){
                $('#order').css("border-color", "#D84315");
                $('.order-error').html("<small class='red'>The order field must be number </small>");
                swal('The order field must be number');
                return false;
            }else{
                $('#order').css("border-color", "#ddd");
                $('.order-error').html("");
            }
            
            });
        })();
    </script>
    
   
    <script type="text/javascript">
        (function () {
            $(document).on('click', ".delete-img", function (e) {
            e.preventDefault();
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var imgId = $(this).attr("img-id");
            var imgName = $(this).attr("img-name");
            $.ajax({
              url: "{{ url('admin/galleries/delete-image') }}",
              headers: {'X-CSRF-TOKEN': token},
              method: 'post',
              data: {
                 id: imgId,
                 name: imgName,
              },
              success: function(result){
                  if(result['status'] == 1){
                      $("#img-block"+imgId).css("display","none");
                  }
                  if(result['status'] == 0){
                      alert('error ocure at delete image !');
                  }
            }});
            });
        })();
    </script>
@endsection
