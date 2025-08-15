<div class="col-md-3 hidden-xs hidden-sm">
    <aside class="booking-filters booking-filters-white">
        <h5 class="text-center">{{ trans('site.tours.filter-by') }}</h5>
        <ul class="list booking-filters-list">
            <li>
                <h5 class="booking-filters-title">{{ trans('site.tours.price') }}</h5>
                <input type="text" id="price-slider">
            </li>
            <li>
                <div class="form-group form-group-lg form-group-select-plus">
                    <label>{{ trans('site.tours.days') }}</label>
                    <div class="btn-group btn-group-select-num" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" />1</label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" />2</label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" />3</label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" />3+</label>
                    </div>
                    <select class="form-control hidden">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option selected="selected">4</option>
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
            </li>
            <li>
                <h5 class="booking-filters-title">{{ trans('site.tours.destinations')}}</h5>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Cairo</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Luxor</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Aswan</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Alexanderia</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Sharm El shiekh</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Hurghada</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Dahab</label>
                </div>
                
                
            </li>
            <li>
                <h5 class="booking-filters-title">{{ trans('site.tours.categories') }}</h5>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Packages</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Classical Packages</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Oasis Packages</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Oasis Packages</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Cruises</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Nile Cruises</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Excursions</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Cairo Excursions</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Luxor Excursions</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />Aswan Excursions</label>
                </div>
            </li>
<!--
            <li>
                <h5 class="booking-filters-title">Star Rating</h5>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />5 star</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />4 star</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />3 star</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />2 star</label>
                </div>
                <div class="checkbox">
                    <label>
                        <input class="i-check" type="checkbox" />1 star</label>
                </div>
            </li>
-->
            
        </ul>
    </aside>
</div>