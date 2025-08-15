<div class="search-tabs search-tabs-bg search-tabs-to-top hidden-sm hidden-xs">
    <div class="tabbable">
        
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab-1">
                
                <form>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-lg form-group-icon-left">
                                <label>Category</label>
                                <select class="form-control" name="category_id" id="category-id">
                                     <option value="">Select category</option>
                                     @foreach ($main_categories as $main_category)
                                         <optgroup label="{{ $main_category->name }}">
                                            @foreach ($sub_categories as $sub_category)
                                                 @if($sub_category->parent_id == $main_category->id)
                                                    <option value="{{ $sub_category->id }}">{{ $sub_category->name }}
                                                     </option>
                                                 @endif
                                             @endforeach
                                            </optgroup>
                                     @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-lg form-group-icon-left">
                                <label>Destination</label>
                                <select class="form-control" name="destination_id" id="destination-id">
								@foreach ($search_destinations as $search_destination)
                                    <option value="{{ $search_destination->id }}" >{{ $search_destination->name }}</option>
                                 @endforeach
							</select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group form-group-lg form-group-select-plus">
                                <label>Days</label>
                                <select class="form-control" name="days" >
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group form-group-lg">
                                <button class="btn btn-primary btn-lg" style="margin-top:30px;" type="submit">Search</button>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
            
            
        </div>
    </div>
</div>
<div class="gap"></div>