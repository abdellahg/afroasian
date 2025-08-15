<fieldset title="1">
	<legend class="text-semibold">Details</legend>
    <br><br>
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
                    Category
                </div>
                 <div class="col-md-9">
                     <select class="form-control" name="category_id" id="category-id">
                         <option value="">Select category</option>
                         @foreach ($main_categories as $main_category)
                             <optgroup label="{{ $main_category->name }}">
                                @foreach ($sub_categories as $sub_category)
                                     @if($sub_category->parent_id == $main_category->id)
                                        <option value="{{ $sub_category->id }}"
                                                @if(isset($item)) 
                                                    @if($item['category_id'] == $sub_category->id) selected @endif 
                                                @endif >{{ $sub_category->name }}
                                         </option>
                                     @endif
                                 @endforeach
                                </optgroup>
                         @endforeach
                     </select>
        
                     <span class="category-id-error"> </span>
                     <br>
                 </div>
             </div>
             <div class="clearfix"></div>
             <div class="form-group">
                 <div class="col-md-3"> 
                    Destinations
                </div>
                 <div class="col-md-9">
                     @php 
                     if(isset($item)){
                        $dests = explode(',',$item['destination_id']);
                        $dests = array_map('trim', $dests);
                     }
                     @endphp
                     <!-- Default multiselect -->
						<div class="multi-select-full">
							<select class="multiselect" multiple="multiple" name="destination_id[]" id="destination-id">
								@foreach ($destinations as $destination)
                                    <option value="{{ $destination->id }}" @if(isset($item))
                                    @if( in_array($destination->id ,$dests) ) selected @endif @endif >{{ $destination->name }}</option>
                                 @endforeach
							</select>
							<span class="destination-id-error"> </span>
						</div>
					<!-- /default multiselect -->
                 </div>
             </div>
             <br> <br>
             <div class="clearfix"></div>
             <div class="form-group">
                <div class="col-md-3"> 
                    Number of days
                </div>
                <div class="col-md-9">
                    {!! Form::text('days', null, ['class' => 'form-control', 'id'=>'days', 'placeholder' => 'days']) !!}
                    <span class="days-error"> </span>
                    <br>
                </div>
            </div>
	    </div>
	</div>
	<div class="row">
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
	    </div>
	    
	    <div class="col-md-6">
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
        <div class="tabbable">
            <ul class="nav nav-pills nav-pills-toolbar nav-justified">
                <li class="active"><a href="#toolbar-justified-pill1" data-toggle="tab">Short Description EN</a></li>
                <li><a href="#toolbar-justified-pill2" data-toggle="tab">Short Description ES</a></li>
                <li><a href="#toolbar-justified-pill3" data-toggle="tab">Short Description PT</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="toolbar-justified-pill1">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('en[short_description]', null, ['class' => 'form-control', 'id'=>'short_description-en', 'placeholder' => 'Write short description here', 'rows' => '6']) !!}

                            <span class="short_description-en-error"> </span>
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tab-pane" id="toolbar-justified-pill2">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('es[short_description]', null, ['class' => 'form-control', 'id'=>'short_description-es', 'placeholder' => 'Write short description here', 'rows' => '6']) !!}

                            <span class="short_description-es-error"> </span>
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tab-pane" id="toolbar-justified-pill3">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('pt[short_description]', null, ['class' => 'form-control', 'id'=>'short_description-pt', 'placeholder' => 'Write short description here', 'rows' => '6']) !!}

                            <span class="short_description-pt-error"> </span>
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
	<hr>
	<br>
    <div class="row">
        <div class="tabbable">
            <ul class="nav nav-pills nav-pills-toolbar nav-justified">
                <li class="active"><a href="#toolbar-justified-pill4" data-toggle="tab">Meta Description EN</a></li>
                <li><a href="#toolbar-justified-pill5" data-toggle="tab">Meta Description ES</a></li>
                <li><a href="#toolbar-justified-pill6" data-toggle="tab">Meta Description PT</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="toolbar-justified-pill4">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('en[meta_description]', null, ['class' => 'form-control', 'id'=>'meta_description-en', 'placeholder' => 'Write meta description here', 'rows' => '4']) !!}

                            <span class="meta_description-en-error"> </span>
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tab-pane" id="toolbar-justified-pill5">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('es[meta_description]', null, ['class' => 'form-control', 'id'=>'meta_description-es', 'placeholder' => 'Write meta description here', 'rows' => '4']) !!}

                            <span class="meta_description-es-error"> </span>
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tab-pane" id="toolbar-justified-pill6">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('pt[meta_description]', null, ['class' => 'form-control', 'id'=>'meta_description-pt', 'placeholder' => 'Write meta description here', 'rows' => '4']) !!}

                            <span class="meta_description-pt-error"> </span>
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
	<br>
    <div class="row">
        <div class="tabbable">
            <ul class="nav nav-pills nav-pills-toolbar nav-justified">
                <li class="active"><a href="#toolbar-justified-pill16" data-toggle="tab">Meta Keywords EN</a></li>
                <li><a href="#toolbar-justified-pill17" data-toggle="tab">Meta Keywords ES</a></li>
                <li><a href="#toolbar-justified-pill18" data-toggle="tab">Meta Keywords PT</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="toolbar-justified-pill16">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('en[meta_keywords]', null, ['class' => 'form-control', 'id'=>'meta_keywords-en', 'placeholder' => 'Write meta keywords here', 'rows' => '4']) !!}

                            <span class="meta_keywords-en-error"> </span>
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tab-pane" id="toolbar-justified-pill17">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('es[meta_keywords]', null, ['class' => 'form-control', 'id'=>'meta_keywords-es', 'placeholder' => 'Write meta keywords here', 'rows' => '4']) !!}

                            <span class="meta_keywords-es-error"> </span>
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tab-pane" id="toolbar-justified-pill18">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('pt[meta_keywords]', null, ['class' => 'form-control', 'id'=>'meta_keywords-pt', 'placeholder' => 'Write meta keywords here', 'rows' => '4']) !!}

                            <span class="meta_keywords-pt-error"> </span>
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
</fieldset>

<fieldset title="2">
	<legend class="text-semibold">Itineraries</legend>
    <br><br>
    <div class="row">
        <div class="tabbable">
            <ul class="nav nav-pills nav-pills-toolbar nav-justified">
                <li class="active"><a href="#toolbar-justified-pill7" data-toggle="tab">Itineraries EN</a></li>
                <li><a href="#toolbar-justified-pill8" data-toggle="tab">Itineraries ES</a></li>
                <li><a href="#toolbar-justified-pill9" data-toggle="tab">Itineraries PT</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="toolbar-justified-pill7">
                    @for ($i = 0; $i < 16; $i++)
                    <?php $k = $i + 1; ?>
                    <div class="col-md-6"> 
                        <div class="form-group">
                             @if(isset($itineraries) && $i < count($itineraries['en']) ) 
                                {{ Form::hidden('en[iti_id]['.$i.']', $itineraries['en'][$i]->id) }}
                                {!! Form::text('en[iti_title]['.$i.']',$itineraries['en'][$i]->iti_title, ['class' => 'form-control', 'placeholder' => 'Itinerary title '. $k]) !!} 
                             @else
                                {!! Form::text('en[iti_title]['.$i.']',null, ['class' => 'form-control', 'placeholder' => 'Itinerary title '.$k]) !!} 
                             @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            @if(isset($itineraries) && $i < count($itineraries['en']) ) 
                            {!! Form::textarea('en[iti_text]['.$i.']', $itineraries['en'][$i]->iti_text, ['class' => 'summernote', 'placeholder' => 'Itinerary text '.$k, 'rows' => '3']) !!}
                            @else
                            {!! Form::textarea('en[iti_text]['.$i.']', null, ['class' => 'summernote', 'placeholder' => 'Itinerary text '.$k, 'rows' => '3']) !!}
                            @endif
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    @endfor
                </div>

                <div class="tab-pane" id="toolbar-justified-pill8">
                     @for ($i = 0; $i < 16; $i++)
                     <?php $k = $i + 1; ?>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            @if(isset($itineraries) && $i < count($itineraries['es']) ) 
                            {{ Form::hidden('es[iti_id]['.$i.']', $itineraries['es'][$i]->id) }}
                            {!! Form::text('es[iti_title]['.$i.']', $itineraries['es'][$i]->iti_title, ['class' => 'form-control', 'placeholder' => 'Itinerary title '. $k]) !!} 
                            
                            @else
                            {!! Form::text('es[iti_title]['.$i.']', null, ['class' => 'form-control', 'placeholder' => 'Itinerary title '. $k]) !!} 
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            @if(isset($itineraries) && $i < count($itineraries['es']) ) 
                             {!! Form::textarea('es[iti_text]['.$i.']', $itineraries['es'][$i]->iti_text, ['class' => 'summernote', 'placeholder' => 'Itinerary text '.$k, 'rows' => '3']) !!}
                            @else
                            {!! Form::textarea('es[iti_text]['.$i.']', null, ['class' => 'summernote', 'placeholder' => 'Itinerary text '.$k, 'rows' => '3']) !!}
                            @endif
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    @endfor
                </div>

                <div class="tab-pane" id="toolbar-justified-pill9">
                    @for ($i = 0; $i < 16; $i++)
                    <?php $k = $i + 1; ?>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            @if(isset($itineraries) && $i < count($itineraries['pt']) ) 
                            {{ Form::hidden('pt[iti_id]['.$i.']', $itineraries['pt'][$i]->id) }}
                            {!! Form::text('pt[iti_title]['.$i.']', $itineraries['pt'][$i]->iti_title, ['class' => 'form-control', 'placeholder' => 'Itinerary title '. $k]) !!} 
                            @else
                            {!! Form::text('pt[iti_title]['.$i.']', null, ['class' => 'form-control', 'placeholder' => 'Itinerary title '. $k]) !!} 
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            @if(isset($itineraries) && $i < count($itineraries['pt']) ) 
                            {!! Form::textarea('pt[iti_text]['.$i.']', $itineraries['pt'][$i]->iti_text, ['class' => 'summernote', 'placeholder' => 'Itinerary text '.$k, 'rows' => '3']) !!}
                            @else
                            {!! Form::textarea('pt[iti_text]['.$i.']', null, ['class' => 'summernote', 'placeholder' => 'Itinerary text '.$k, 'rows' => '3']) !!}
                            @endif
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <br>
</fieldset>

<fieldset title="3">
	<legend class="text-semibold">Includes</legend>
    <br><br>
    <div class="row">
        <div class="tabbable">
            <ul class="nav nav-pills nav-pills-toolbar nav-justified">
                <li class="active"><a href="#toolbar-justified-pill10" data-toggle="tab">Includes EN</a></li>
                <li><a href="#toolbar-justified-pill11" data-toggle="tab">Includes ES</a></li>
                <li><a href="#toolbar-justified-pill12" data-toggle="tab">Includes PT</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="toolbar-justified-pill10">
                    @for ($i = 0; $i < 12; $i++)
                    <?php $k = $i + 1; ?>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            @if(isset($includes) && $i < count($includes['en']) )
                            {{ Form::hidden('en[inc_id]['.$i.']', $includes['en'][$i]->id) }}
                            {!! Form::text('en[include]['.$i.']', $includes['en'][$i]->text, ['class' => 'form-control', 'placeholder' => 'Include '. $k]) !!} 
                             @else
                             {!! Form::text('en[include]['.$i.']', null, ['class' => 'form-control', 'placeholder' => 'Include '. $k]) !!} 
                             @endif
                        </div>
                    </div>
                    @endfor
                </div>

                <div class="tab-pane" id="toolbar-justified-pill11">
                     @for ($i = 0; $i < 12; $i++)
                     <?php $k = $i + 1; ?>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            @if(isset($includes) && $i < count($includes['es']) )
                            {{ Form::hidden('es[inc_id]['.$i.']', $includes['es'][$i]->id) }}
                            {!! Form::text('es[include]['.$i.']', $includes['es'][$i]->text, ['class' => 'form-control', 'placeholder' => 'Include '. $k]) !!} 
                             @else
                             {!! Form::text('es[include]['.$i.']', null, ['class' => 'form-control', 'placeholder' => 'Include '. $k]) !!} 
                             @endif
                        </div>
                    </div>
                    @endfor
                </div>

                <div class="tab-pane" id="toolbar-justified-pill12">
                    @for ($i = 0; $i < 12; $i++)
                    <?php $k = $i + 1; ?>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            @if(isset($includes) && $i < count($includes['pt']) )
                            {{ Form::hidden('pt[inc_id]['.$i.']', $includes['pt'][$i]->id) }}
                            {!! Form::text('pt[include]['.$i.']', $includes['pt'][$i]->text, ['class' => 'form-control', 'placeholder' => 'Include '. $k]) !!}
                             @else
                             {!! Form::text('pt[include]['.$i.']', null, ['class' => 'form-control', 'placeholder' => 'Include '. $k]) !!}
                             @endif
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
	<br>
    <div class="row">
        <div class="tabbable">
            <ul class="nav nav-pills nav-pills-toolbar nav-justified">
                <li class="active"><a href="#toolbar-justified-pill13" data-toggle="tab">Excludes EN</a></li>
                <li><a href="#toolbar-justified-pill14" data-toggle="tab">Excludes ES</a></li>
                <li><a href="#toolbar-justified-pill15" data-toggle="tab">Excludes PT</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="toolbar-justified-pill13">
                    @for ($i = 0; $i < 12; $i++)
                    <?php $k = $i + 1; ?>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            @if(isset($excludes) && $i < count($excludes['en']) )
                            {{ Form::hidden('en[exc_id]['.$i.']', $excludes['en'][$i]->id) }}
                            {!! Form::text('en[exclude]['.$i.']', $excludes['en'][$i]->text, ['class' => 'form-control', 'placeholder' => 'Exclude '. $k]) !!}
                            @else
                             {!! Form::text('en[exclude]['.$i.']', null, ['class' => 'form-control', 'placeholder' => 'Exclude '. $k]) !!}
                            @endif
                        </div>
                    </div>
                    @endfor
                </div>

                <div class="tab-pane" id="toolbar-justified-pill14">
                     @for ($i = 0; $i < 12; $i++)
                     <?php $k = $i + 1; ?>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            @if(isset($excludes) && $i < count($excludes['es']) )
                            {{ Form::hidden('es[exc_id]['.$i.']', $excludes['es'][$i]->id) }}
                            {!! Form::text('es[exclude]['.$i.']', $excludes['es'][$i]->text, ['class' => 'form-control', 'placeholder' => 'Exclude '. $k]) !!} 
                             @else
                             {!! Form::text('es[exclude]['.$i.']', null, ['class' => 'form-control', 'placeholder' => 'Exclude '. $k]) !!} 
                             @endif
                        </div>
                    </div>
                    @endfor
                </div>

                <div class="tab-pane" id="toolbar-justified-pill15">
                    @for ($i = 0; $i < 12; $i++)
                    <?php $k = $i + 1; ?>
                    <div class="col-md-6"> 
                        <div class="form-group">
                            @if(isset($excludes) && $i < count($excludes['pt']) )
                            {{ Form::hidden('pt[exc_id]['.$i.']', $excludes['pt'][$i]->id) }}
                            {!! Form::text('pt[exclude]['.$i.']', $excludes['pt'][$i]->text, ['class' => 'form-control', 'placeholder' => 'Exclude '. $k]) !!} 
                            @else
                            {!! Form::text('pt[exclude]['.$i.']', null, ['class' => 'form-control', 'placeholder' => 'Exclude '. $k]) !!} 
                            @endif
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <br>
</fieldset>
<fieldset title="4">
	<legend class="text-semibold">Prices</legend>

	<br><br>
	<div class="row">
	
        <div class="col-md-6">
            <div class="form-group">
                <div class="col-md-3"> 
                    Special Price ($)
                </div>
                <div class="col-md-9">
                    {!! Form::text('special_price', null, ['class' => 'form-control', 'id'=>'special-price', 'placeholder' => 'Special Price']) !!}
        
                    <span class="special-price-error"> </span>
                    <br>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('sale_percentage') ? ' has-error' : '' }}">
                <div class="col-md-3"> 
                    Sale Percentage  (%)
                </div>
                <div class="col-md-9">
                    {!! Form::text('sale_percentage', null, ['class' => 'form-control', 'id'=>'sale-percentage', 'placeholder' => 'Sale Percentage']) !!}
        
                    <span class="sale-percentage-error"> </span>
                    <br>
                </div>
            </div>
	    </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="col-md-3"> 
                    Sale Title
                </div>
                <div class="col-md-9">
                    {!! Form::text('sale_text', null, ['class' => 'form-control', 'id'=>'sale-text', 'placeholder' => 'Sale Title']) !!}
        
                    <span class="sale-text-error"> </span>
                    <br>
                </div>
            </div>
	    </div>
	    <div class="clearfix"></div>
	    <hr>
	    <div class="col-md-12 text-center">
	        <div class="form-group">
				<label class="radio-inline">
					<input type="radio" name="prices_type" value="1" class="styled prices_type" @if(isset($item)) @if($item['prices_type'] == '1') checked="checked" @endif  @else checked="checked" @endif >
					Prices per Room (Package)
				</label>
                <label class="radio-inline">
					<input type="radio" name="prices_type" value="3" class="styled prices_type" @if(isset($item)) @if($item['prices_type'] == '3') checked="checked" @endif  @endif >
					One Category
				</label>
				<label class="radio-inline">
					<input type="radio" name="prices_type" value="2" class="styled prices_type" @if(isset($item)) @if($item['prices_type'] == '2') checked="checked" @endif  @endif >
					Prices per Pax (Excursion)
				</label>
				<label class="radio-inline">
					<input type="radio" name="prices_type" value="4" class="styled prices_type" @if(isset($item)) @if($item['prices_type'] == '4') checked="checked" @endif  @endif >
					Disable Prices
				</label>
				
			</div>
	    </div>
	    
	    <div id="price_per_room" @if(isset($item)) @if($item['prices_type'] == '1') style="display:block;" @else style="display:none;" @endif  @endif  >
	        <div class="clearfix"></div>
    	    <hr>
    	    <div class="col-md-12 text-center">
    	        <p style="font-size:16px;"><b>Category A</b></p>
    	    </div>
    	    <div class="clearfix"></div>
    	    <hr>
        	<div class="col-md-6">
    	        
                <div class="form-group">
                    <div class="col-md-3"> 
                        Single Price ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('single_price', null, ['class' => 'form-control', 'id'=>'single-price', 'placeholder' => 'Single Price']) !!}
            
                        <span class="single-price-error"> </span>
                        <br>
                    </div>
                </div>
    	    
                <div class="form-group">
                    <div class="col-md-3"> 
                        Double Price ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('double_price', null, ['class' => 'form-control', 'id'=>'double-price', 'placeholder' => 'Double Price']) !!}
            
                        <span class="double-price-error"> </span>
            
                        <br>
                    </div>
                </div>
    	    
                <div class="form-group">
                    <div class="col-md-3"> 
                        Triple Price ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('triple_price', null, ['class' => 'form-control', 'id'=>'triple-price', 'placeholder' => 'Triple Price']) !!}
            
                        <span class="triple-price-error"> </span>
                        <br>
                    </div>
                </div>
    	    </div>
    	    <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-3"> 
                        Child (2 - 5.99)(%)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('child_price1', null, ['class' => 'form-control', 'id'=>'child-price1', 'placeholder' => 'Child Price (2 - 5.99)']) !!}
            
                       <span class="child-price1-error"> </span>
                        <br>
                    </div>
                </div>
    	    
                <div class="form-group">
                    <div class="col-md-3"> 
                        Child (6 - 11.99)(%)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('child_price2', null, ['class' => 'form-control', 'id'=>'child-price2', 'placeholder' => 'Child Price (6 - 11.99)']) !!}
            
                        <span class="child-price2-error"> </span>
                        <br>
                    </div>
                </div>
    	    </div>
    	    <div class="clearfix"></div>
    	    <hr>
    	    <div class="col-md-12 text-center">
    	       <p style="font-size:16px;"><b>Category B</b></p>
    	    </div>
    	    <div class="clearfix"></div>
    	    <hr>
    	    <div class="col-md-6">
    	         
                <div class="form-group">
                    <div class="col-md-3"> 
                        Single Price ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('single_price2', null, ['class' => 'form-control', 'id'=>'single-price2', 'placeholder' => 'Single Price']) !!}
            
                        <span class="single-price2-error"> </span>
                        <br>
                    </div>
                </div>
    	    
                <div class="form-group">
                    <div class="col-md-3"> 
                        Double Price ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('double_price2', null, ['class' => 'form-control', 'id'=>'double-price2', 'placeholder' => 'Double Price']) !!}
            
                        <span class="double-price2-error"> </span>
            
                        <br>
                    </div>
                </div>
    	    
                <div class="form-group">
                    <div class="col-md-3"> 
                        Triple Price ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('triple_price2', null, ['class' => 'form-control', 'id'=>'triple-price2', 'placeholder' => 'Triple Price']) !!}
            
                        <span class="triple-price2-error"> </span>
                        <br>
                    </div>
                </div>
    	    </div>
    	    <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-3"> 
                        Child (2 - 5.99)(%)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('child_price12', null, ['class' => 'form-control', 'id'=>'child-price12', 'placeholder' => 'Child Price (2 - 5.99)']) !!}
            
                       <span class="child-price12-error"> </span>
                        <br>
                    </div>
                </div>
    	   
                <div class="form-group">
                    <div class="col-md-3"> 
                        Child (6 - 11.99)(%)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('child_price22', null, ['class' => 'form-control', 'id'=>'child-price22', 'placeholder' => 'Child Price (6 - 11.99)']) !!}
            
                        <span class="child-price22-error"> </span>
                        <br>
                    </div>
                </div>
    	    </div>
	    </div>
	    
	    
	    <div id="price_one_category" @if(isset($item)) @if($item['prices_type'] == '3') style="display:block;" @else style="display:none;" @endif  @else  style="display:none;" @endif >
	        
    	    <div class="clearfix"></div>
    	    <hr>
        	<div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-3"> 
                        Single Price ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('single_price', null, ['class' => 'form-control', 'id'=>'single-price', 'placeholder' => 'Single Price']) !!}
            
                        <span class="single-price-error"> </span>
                        <br>
                    </div>
                </div>
    	    
                <div class="form-group">
                    <div class="col-md-3"> 
                        Double Price ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('double_price', null, ['class' => 'form-control', 'id'=>'double-price', 'placeholder' => 'Double Price']) !!}
            
                        <span class="double-price-error"> </span>
            
                        <br>
                    </div>
                </div>
    	    
                <div class="form-group">
                    <div class="col-md-3"> 
                        Triple Price ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('triple_price', null, ['class' => 'form-control', 'id'=>'triple-price', 'placeholder' => 'Triple Price']) !!}
            
                        <span class="triple-price-error"> </span>
                        <br>
                    </div>
                </div>
    	    </div>
    	    <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-3"> 
                        Child (2 - 5.99)(%)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('child_price1', null, ['class' => 'form-control', 'id'=>'child-price1', 'placeholder' => 'Child Price (2 - 5.99)']) !!}
            
                       <span class="child-price1-error"> </span>
                        <br>
                    </div>
                </div>
    	    
                <div class="form-group">
                    <div class="col-md-3"> 
                        Child (6 - 11.99)(%)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('child_price2', null, ['class' => 'form-control', 'id'=>'child-price2', 'placeholder' => 'Child Price (6 - 11.99)']) !!}
            
                        <span class="child-price2-error"> </span>
                        <br>
                    </div>
                </div>
    	    </div>
    	    <div class="clearfix"></div>
    	    
	    </div>
	    
	    <div id="price_per_pax"  @if(isset($item)) @if($item['prices_type'] == '2') style="display:block;" @else style="display:none;" @endif  @else  style="display:none;" @endif >
    	    <div class="clearfix"></div>
    	    <hr>
    	    <div class="col-md-12 text-center">
    	       <p style="font-size:16px;"><b>Price per Pax</b></p>
    	    </div>
    	    <div class="clearfix"></div>
    	    <hr>
    	    <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-3"> 
                        One Person ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('person1_price', null, ['class' => 'form-control', 'id'=>'person1-price', 'placeholder' => 'One Person Price']) !!}
            
                        <span class="person1-price-error"> </span>
                        <br>
                    </div>
                </div>
    	    </div>
    	    <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-3"> 
                        (2-3) Persons ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('person2_3_price', null, ['class' => 'form-control', 'id'=>'person2-3-price', 'placeholder' => '(2-3) Persons Price']) !!}
            
                        <span class="person2-3-price-error"> </span>
                        <br>
                    </div>
                </div>
    	    </div>
    	    <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-3"> 
                        (4-6) Persons ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('person4_6_price', null, ['class' => 'form-control', 'id'=>'person4-6-price', 'placeholder' => '(4-6) Persons Price']) !!}
            
                        <span class="person4-6-price-error"> </span>
                        <br>
                    </div>
                </div>
    	    </div>
    	    <div class="col-md-6">
                <div class="form-group">
                    <div class="col-md-3"> 
                        (7-10) Persons ($)
                    </div>
                    <div class="col-md-9">
                        {!! Form::text('person7_10_price', null, ['class' => 'form-control', 'id'=>'person7-10-price', 'placeholder' => '(7-10) Persons Price']) !!}
            
                        <span class="person7-10-price-error"> </span>
                        <br>
                    </div>
                </div>
    	    </div>
	    </div>
	    
	    <div id="price_disable"  @if(isset($item)) @if($item['prices_type'] == '4') style="display:block;" @else style="display:none;" @endif  @else  style="display:none;" @endif >
    	    <div class="clearfix"></div>
    	    <hr>
    	    <div class="col-md-12 text-center">
    	       <p style="font-size:14px;"><b>All prices will not appear at this tour</b></p>
    	    </div>
    	    <div class="clearfix"></div>
    	    <hr>
    	    
	    </div>
	</div>
	<br><br>
	<div class="row">
        <div class="tabbable">
            <ul class="nav nav-pills nav-pills-toolbar nav-justified">
                <li class="active"><a href="#toolbar-justified-pill19" data-toggle="tab">Price policy EN</a></li>
                <li><a href="#toolbar-justified-pill20" data-toggle="tab">Price policy ES</a></li>
                <li><a href="#toolbar-justified-pill21" data-toggle="tab">Price policy PT</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="toolbar-justified-pill19">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('en[price_policy]', null, ['class' => 'summernote', 'placeholder' => 'Write price policy here', 'rows' => '6']) !!}
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tab-pane" id="toolbar-justified-pill20">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('es[price_policy]', null, ['class' => 'summernote', 'placeholder' => 'Write price policy here', 'rows' => '6']) !!}
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tab-pane" id="toolbar-justified-pill21">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('pt[price_policy]', null, ['class' => 'summernote', 'placeholder' => 'Write price policy here', 'rows' => '6']) !!}
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
</fieldset>
<fieldset title="5">
	<legend class="text-semibold">Map & Notes</legend>
    
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">		
                <label>Latitude:</label>
                {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label>Longitude:</label>
                {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
            </div> 
        </div>
        <div class="col-md-6">
            @if(isset($item) && $item['primary_image'] != '')
                 <meta name="csrf-token" content="{{ csrf_token() }}">
                 <input type="hidden" id="item-id" value="{{$item['id']}}" />
                 <input type="hidden" id="item-primary-image" name="oldImage" value="{{$item['primary_image']}}" />
                 <div id="edit-primary-image">
                     <div class="col-md-12 ajax-target " >
                        <div class="thumbnail">
                            <img alt="290X180" style="height: 230px; width: 100%; display: block; cursor: pointer;" 
                                 src="{{ url('/').'/public/assets/uploads/items/'.$item['primary_image'] }}" data-holder-rendered="true">
                            <div class="caption text-center">
                                <button type="button" data-url="" class="delete-primary-img btn btn-warning"><i class="icon-trash" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="col-md-12 ajax-file-primary" 
                 data-default="{{url('/').'/assets/admin/images/default.jpg'}}">
                <a href="javascript:;" class="thumbnail">
                    <img alt="290X180" style="height: 290px; width: 100%; display: block; cursor: pointer;"
                            src="{{url('/').'/assets/admin/images/default.jpg'}}" 
                            data-holder-rendered="true" >
                    <input type="file" style="display:none" name="primary_image" class="primary-img" >
                </a>
                @if ($errors->has('primary_image'))
                    <span class="help-block red">
                          <strong>{{ $errors->first('primary_image') }}</strong>
                      </span>
                @endif
            </div>
            @endif
            <div class="clearfix"></div>
        </div>
    </div>
    <br>
    <hr>
	<br>
	<div class="row">
        <div class="tabbable">
            <ul class="nav nav-pills nav-pills-toolbar nav-justified">
                <li class="active"><a href="#toolbar-justified-pill22" data-toggle="tab">Notes EN</a></li>
                <li><a href="#toolbar-justified-pill23" data-toggle="tab">Notes ES</a></li>
                <li><a href="#toolbar-justified-pill24" data-toggle="tab">Notes PT</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="toolbar-justified-pill22">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('en[notes]', null, ['class' => 'summernote', 'placeholder' => 'Write notes here', 'rows' => '6']) !!}
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tab-pane" id="toolbar-justified-pill23">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('es[notes]', null, ['class' => 'summernote', 'placeholder' => 'Write notes here', 'rows' => '6']) !!}
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="tab-pane" id="toolbar-justified-pill24">
                    <div class="form-group">
                        <div class="col-md-12">
                            {!! Form::textarea('pt[notes]', null, ['class' => 'summernote', 'placeholder' => 'Write notes here', 'rows' => '6']) !!}
                            <br>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
</fieldset>
<fieldset title="6">
	<legend class="text-semibold">Photos</legend>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        @if(isset($item))
                            @foreach ($images as $img)
                                <div class="col-md-4 ajax-target" id="img-block{{$img->id}}">
                                    <div class="thumbnail">
                                         <meta name="csrf-token" content="{{ csrf_token() }}">
                                        
                                        <img alt="290X180" style="height: 180px; width: 100%; display: block; cursor: pointer;" src="{{ url('/').'/public/assets/uploads/items/'.$img->img_name }}" data-holder-rendered="true">
                                        <div class="caption text-center">
                                            <button type="button" data-url="" class="delete-img btn btn-warning" img-id="{{$img->id}}" img-name="{{$img->img_name}}" ><i class="icon-trash" aria-hidden="true"></i></button>
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
	
</fieldset>

<br>
<button type="submit" class="btn btn-primary stepy-finish item-submit">Submit <i class="icon-check position-right"></i></button>

@section('page-script')
   <script type="text/javascript">
       (function () {
            
            $(document).on('change', '.prices_type', function (e) {
               if (this.value == "1") { 
                        $('#price_per_room').stop(true,true).fadeIn(1000); 
                        $('#price_per_pax').stop(true,true).fadeOut(1000);
                        $('#price_one_category').stop(true,true).fadeOut(1000);
                        $('#price_disable').stop(true,true).fadeOut(1000); 
               } else if(this.value == "2") {
                        $('#price_per_pax').stop(true,true).fadeIn(1000); 
                        $('#price_per_room').stop(true,true).fadeOut(1000);
                        $('#price_one_category').stop(true,true).fadeOut(1000);
                        $('#price_disable').stop(true,true).fadeOut(1000); 
              } else if(this.value == "3") {
                      $('#price_one_category').stop(true,true).fadeIn(1000); 
                      $('#price_per_room').stop(true,true).fadeOut(1000);
                      $('#price_per_pax').stop(true,true).fadeOut(1000);
                      $('#price_disable').stop(true,true).fadeOut(1000); 
              }else if(this.value == "4") {
                      $('#price_disable').stop(true,true).fadeIn(1000); 
                      $('#price_one_category').stop(true,true).fadeOut(1000); 
                      $('#price_per_room').stop(true,true).fadeOut(1000);
                      $('#price_per_pax').stop(true,true).fadeOut(1000);
                 
              }
           });
       })(); 
   </script>
   <script type="text/javascript">
        (function () {
            $(document).on('click', ".item-submit", function (e) {
            
            var nameEn = $('#name-en').val();
            var nameEs = $('#name-es').val();
            var namePt = $('#name-pt').val();
            var categoryId = $('#category-id').val();
            var destinationId = $('#destination-id').val();
            var days = $('#days').val();
            var order = $('#order').val();
            var shortDescriptionEn = $('#short_description-en').val();
            var shortDescriptionEs = $('#short_description-es').val();
            var shortDescriptionPt = $('#short_description-pt').val();
            var metaDescriptionEn = $('#meta_description-en').val();
            var metaDescriptionEs = $('#meta_description-es').val();
            var metaDescriptionPt = $('#meta_description-pt').val();
            var metaKeywordsEn = $('#meta_keywords-en').val();
            var metaKeywordsEs = $('#meta_keywords-es').val();
            var metaKeywordsPt = $('#meta_keywords-pt').val();
            var specialPrice = $('#special-price').val();
            var salePercentage = $('#sale-percentage').val();
            var saleText = $('#sale-text').val();
            var price = $('#price').val();
            var childPrice1 = $('#child-price1').val();
            var childPrice2 = $('#child-price2').val();
            var singlePrice = $('#single-price').val();
            var doublePrice = $('#double-price').val();
            var triplePrice = $('#triple-price').val();
            var price2 = $('#price2').val();
            var childPrice12 = $('#child-price12').val();
            var childPrice22 = $('#child-price22').val();
            var singlePrice2 = $('#single-price2').val();
            var doublePrice2 = $('#double-price2').val();
            var triplePrice2 = $('#triple-price2').val();
        
            
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
            
            
            if(categoryId == ''){
                $('#category-id').css("border-color", "#D84315");
                $('.category-id-error').html("<small class='red'>The Name Es field is required </small>");
                swal('The category field is required');
                return false;
            }else{
                $('#category-id').css("border-color", "#ddd");
                $('.category-id-error').html("");
            }
            
            if(destinationId == ''){
                $('#destination-id').css("border-color", "#D84315");
                $('.destination-id-error').html("<small class='red'>The Name Es field is required </small>");
                swal('The destinations field is required');
                return false;
            }else{
                $('#destination-id').css("border-color", "#ddd");
                $('.destination-id-error').html("");
            }
            
            if(days == ''){
                $('#days').css("border-color", "#D84315");
                $('.days-error').html("<small class='red'>The days field is required </small>");
                swal('The days field is required');
                return false;
            }else if(!$.isNumeric(days)){
                $('#days').css("border-color", "#D84315");
                $('.days-error').html("<small class='red'>The days field must be number </small>");
                swal('The days field must be number');
                return false;
            }else{
                $('#days').css("border-color", "#ddd");
                $('.days-error').html("");
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
            
            if(shortDescriptionEn == ''){
                $('#short_description-en').css("border-color", "#D84315");
                $('.short_description-en-error').html("<small class='red'>The Short Description En field is required </small>");
                swal('The short Description En field is required');
                return false;
            }else{
                $('#short_description-en').css("border-color", "#ddd");
                $('.short_description-en-error').html("");
            }
            
            if(shortDescriptionEs == ''){
                $('#short_description-es').css("border-color", "#D84315");
                $('.short_description-es-error').html("<small class='red'>The Short Description Es field is required </small>");
                swal('The short Description Es field is required');
                return false;
            }else{
                $('#short_description-es').css("border-color", "#ddd");
                $('.short_description-es-error').html("");
            }
            
            if(shortDescriptionPt == ''){
                $('#short_description-pt').css("border-color", "#D84315");
                $('.short_description-pt-error').html("<small class='red'>The Short Description Pt field is required </small>");
                swal('The short Description Pt field is required');
                return false;
            }else{
                $('#short_description-pt').css("border-color", "#ddd");
                $('.short_description-pt-error').html("");
            }
            
            if(metaDescriptionEn == ''){
                $('#meta_description-en').css("border-color", "#D84315");
                $('.meta_description-en-error').html("<small class='red'>The Meta Description En field is required </small>");
                swal('The Meta Description En field is required');
                return false;
            }else{
                $('#meta_description-en').css("border-color", "#ddd");
                $('.meta_description-en-error').html("");
            }
            
            if(metaDescriptionEs == ''){
                $('#meta_description-es').css("border-color", "#D84315");
                $('.meta_description-es-error').html("<small class='red'>The Meta Description Es field is required </small>");
                swal('The Meta Description Es field is required');
                return false;
            }else{
                $('#meta_description-es').css("border-color", "#ddd");
                $('.meta_description-es-error').html("");
            }
            
            if(metaDescriptionPt == ''){
                $('#meta_description-pt').css("border-color", "#D84315");
                $('.meta_description-pt-error').html("<small class='red'>The Meta Description Pt field is required </small>");
                swal('The Meta Description Pt field is required');
                return false;
            }else{
                $('#meta_description-pt').css("border-color", "#ddd");
                $('.meta_description-pt-error').html("");
            }
            
            
             /*   
            if(specialPrice !=''){
                if(!$.isNumeric(specialPrice)){
                    $('#special-price').css("border-color", "#D84315");
                    $('.special-price-error').html("<small class='red'>The special price field must be number </small>");
                    swal('The special price field must be number');
                    return false;
                }else{
                    $('#special-price').css("border-color", "#ddd");
                    $('.special-price-error').html("");
                }
            }   
                
            if(childPrice1 == ''){
                $('#child-price1').css("border-color", "#D84315");
                $('.child-price1-error').html("<small class='red'>The child price field is required </small>");
                swal('The child price field is required');
                return false;
            }else if(!$.isNumeric(childPrice1)){
                $('#child-price1').css("border-color", "#D84315");
                $('.child-price1-error').html("<small class='red'>The child price field must be number </small>");
                swal('The child price field must be number');
                return false;
            }else{
                $('#child-price1').css("border-color", "#ddd");
                $('.child-price1-error').html("");
            } 
                
            if(childPrice2 == ''){
                $('#child-price2').css("border-color", "#D84315");
                $('.child-price2-error').html("<small class='red'>The child price field is required </small>");
                swal('The child price field is required');
                return false;
            }else if(!$.isNumeric(childPrice2)){
                $('#child-price2').css("border-color", "#D84315");
                $('.child-price2-error').html("<small class='red'>The child price field must be number </small>");
                swal('The child price field must be number');
                return false;
            }else{
                $('#child-price2').css("border-color", "#ddd");
                $('.child-price2-error').html("");
            }
                
            if(singlePrice !=''){
                if(!$.isNumeric(singlePrice)){
                    $('#single-price').css("border-color", "#D84315");
                    $('.single-price-error').html("<small class='red'>The single price field must be number </small>");
                    swal('The single price field must be number');
                    return false;
                }else{
                    $('#single-price').css("border-color", "#ddd");
                    $('.single-price-error').html("");
                }
            }  
                
            if(doublePrice !=''){
                if(!$.isNumeric(doublePrice)){
                    $('#double-price').css("border-color", "#D84315");
                    $('.double-price-error').html("<small class='red'>The double price field must be number </small>");
                    swal('The double price field must be number');
                    return false;
                }else{
                    $('#double-price').css("border-color", "#ddd");
                    $('.double-price-error').html("");
                }
            }
                
            if(triplePrice !=''){
                if(!$.isNumeric(triplePrice)){
                    $('#triple-price').css("border-color", "#D84315");
                    $('.triple-price-error').html("<small class='red'>The triple price field must be number </small>");
                    swal('The triple price field must be number');
                    return false;
                }else{
                    $('#triple-price').css("border-color", "#ddd");
                    $('.triple-price-error').html("");
                }
            }  
            
            
             if(childPrice12 != ''){
                 if(!$.isNumeric(childPrice12)){
                $('#child-price12').css("border-color", "#D84315");
                $('.child-price12-error').html("<small class='red'>The child price field must be number </small>");
                swal('The child price field must be number');
                return false;
                }else{
                    $('#child-price12').css("border-color", "#ddd");
                    $('.child-price12-error').html("");
                } 
             }
                
            if(childPrice22 != ''){
                 if(!$.isNumeric(childPrice22)){
                $('#child-price22').css("border-color", "#D84315");
                $('.child-price22-error').html("<small class='red'>The child price field must be number </small>");
                swal('The child price field must be number');
                return false;
                }else{
                    $('#child-price22').css("border-color", "#ddd");
                    $('.child-price22-error').html("");
                }
            }
                
            if(singlePrice2 !=''){
                if(!$.isNumeric(singlePrice2)){
                    $('#single-price2').css("border-color", "#D84315");
                    $('.single-price2-error').html("<small class='red'>The single price field must be number </small>");
                    swal('The single price field must be number');
                    return false;
                }else{
                    $('#single-price2').css("border-color", "#ddd");
                    $('.single-price2-error').html("");
                }
            }  
                
            if(doublePrice2 !=''){
                if(!$.isNumeric(doublePrice2)){
                    $('#double-price2').css("border-color", "#D84315");
                    $('.double-price2-error').html("<small class='red'>The double price field must be number </small>");
                    swal('The double price field must be number');
                    return false;
                }else{
                    $('#double-price2').css("border-color", "#ddd");
                    $('.double-price2-error').html("");
                }
            }
                
            if(triplePrice2 !=''){
                if(!$.isNumeric(triplePrice2)){
                    $('#triple-price2').css("border-color", "#D84315");
                    $('.triple-price2-error').html("<small class='red'>The triple price field must be number </small>");
                    swal('The triple price field must be number');
                    return false;
                }else{
                    $('#triple-price2').css("border-color", "#ddd");
                    $('.triple-price2-error').html("");
                }
            }
             */
            
            
            
            });
        })();
    </script>
    <script type="text/javascript">
        (function () {
            $(document).on('click', ".delete-primary-img", function (e) {
            e.preventDefault();
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var itemId = $('#item-id').val();
            var newImg = $('#item-primary-image').val();
            
            var addNewImg = '<div class="col-md-12 ajax-file-primary" data-default="{{url('/').'/assets/admin/images/default.jpg'}}"><a href="javascript:;" class="thumbnail"><img alt="290X180" style="height: 290px; width: 100%; display: block; cursor: pointer;"src="{{url('/').'/assets/admin/images/default.jpg'}}" data-holder-rendered="true"><input type="file" style="display:none" name="primary_image" id="primary-img" ></a></div>';
            
            $.ajax({
              url: "{{ url('admin/items/delete-primary-image') }}",
              headers: {'X-CSRF-TOKEN': token},
              method: 'post',
              data: {
                 id: itemId,
                 image: newImg,
              },
              success: function(result){
                  if(result['status'] == 1){
                      $('#edit-primary-image').html(addNewImg);
                  }
                  if(result['status'] == 0){
                      alert('error ocure at change image !');
                  }
            }});
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
              url: "{{ url('admin/items/delete-image') }}",
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
