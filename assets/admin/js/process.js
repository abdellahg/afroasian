(function () {

    /***************************************************************************
    * AJAX Setup for processing
    ***************************************************************************/

    var loading = {
        xsm: '<span class="fa fa-spinner fa-spin fa-lg fa-fw"></span>',
        sm: '<span class="fa fa-spinner fa-spin fa-2x fa-fw"></span>',
        md: '<span class="fa fa-spinner fg-3x fa-spin fa-fw"></span>',
        lg: '<span class="fa fa-spinner fa-4x fa-spin fa-fw"></span>',
        xlg: '<span class="fa fa-spinner fa-5x fa-spin fa-fw"></span>',
    };

    var msgs = {
        'error': {
            'en': 'Error',
            'ar': 'Error',
        },
        'internal': {
            'en': {
                'title': 'Warning',
                'txt': '500 Internal Server Error'
            },
            'ar': {
                'title': 'Warming',
                'txt': 'Server error 500'
            }
        },
        'not_found': {
            'en': {
                'title': 'Info',
                'txt': '404 Page not found.',
            },
            'ar': {
                'title': 'Note',
                'txt': 'Not Found 400 ',
            }
        },
        'unauthorized': {
            'en': {
                'title': 'Warning',
                'txt': '403 Unauthorized, you don\'t have enough privileges to perform this action.',
            },
            
        },
        'unauthenticated': {
            'en': {
                'title': 'Warning',
                'txt': '401 Unauthenticated, please login first to be able to perform this action.',
            },
            
        }
    };

    var notifyWith = {
        noty: true,
        toastr: true
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        }
    });

    window.compile = function (template, data, param) {
        if (param) {
            return template.replace(new RegExp('{' + param + '}', 'g'), data);
        } else {
            for (var index in data) {
                template = template.replace(new RegExp('{' + index + '}', 'g'), data[index]);
            }
            return template;
        }
    };

    /**
    * Implode 1D|2D Array with given delimiter.
    *
    * @param array
    * @param delimiter
    * @returns {string}
    */
    window.implode = function (array, delimiter) {
        if (!delimiter) delimiter = '<br>';
        var txt = '';
        for (var index in array) {
            if (typeof array[index] === 'string' || array[index] instanceof String) {
                txt += array[index] + delimiter;
            } else if (array[index].length > 1) {
                txt += array[index].join(delimiter) + delimiter;
            } else {
                txt += array[index][0] + delimiter;
            }
        }
        return txt;
    };

    /***************************************************************************
    * Country Select Refresh
    **************************************************************************/
    $(document).on('change', 'select#country', function () {
        var $this = $(this);
        var url = $this.data('url');
        var id = $this.find('option:selected').val();
        var stateSelect = $('select#state');
        stateSelect.prop('disabled', true);

        request(url + "/" + id, csrf, function (data) {
            if (data.status) {
                notify(data.status, data.title, data.msg, 'fancy');
            } else {
                stateSelect.html(data);
                stateSelect.prop('disabled', false).change();
            }
        }, function (err) {
            notifyErrors(err,'t')
        });

    });

    /***************************************************************************
    * State Select Refresh
    **************************************************************************/
    $(document).on('change', 'select#state', function () {
        var companySelect = $('select#company');
        if (!companySelect.length) {
            return;
        }
        var $this = $(this);
        var url = $this.data('url');
        var id = $this.find('option:selected').val();
        companySelect.prop('disabled', true);

        request(url + "/" + id, csrf, function (data) {
            if (data.status) {
                notify(data.status, data.title, data.msg, 't');
            } else {
                companySelect.html(data);
                companySelect.prop('disabled', false).change();
            }
        }, function (err) {
            notifyErrors(err,'t');
        });

    });
    /***************************************************************************
    * Company Select Refresh
    **************************************************************************/
    $(document).on('change', 'select#company', function () {
        var $this = $(this);
        var url = $this.data('url');
        var id = $this.find('option:selected').val();
        var summary = $('#summary');
        summary.LoadingOverlay('show');
        request(url + "/" + id, csrf, function (data) {
            if (data.status) {
                notify(data.status, data.title, data.msg, 't');
            } else {
                summary.html(data).LoadingOverlay('hide');
            }
        }, function (err) {
            notifyErrors(err,'t');
        });

    });

    /***************************************************************************
    * Coupon Code
    **************************************************************************/
    $(document).on('click', 'button#coupon-btn', function () {
        var $this = $(this);
        var url = $this.data('url');
        var oldText = $this.html();
        var form = new FormData();
        form.append('code', $('input#coupon-txt').val());
        $this.prop('disabled', true).html(loading.xsm);
        request(url, form, function (data) {
            $this.prop('disabled', false).html(oldText);
            notify(data.status, data.title, data.msg, 't');
            if (data.status == 'success') {
                window.setTimeout(function () {
                    location.reload(0)
                }, 2000);
            }
        }, function (err) {
            $this.prop('disabled', false).html(oldText);
            notifyErrors(err, 't');
        });

    });


    /***************************************************************************
    * State row generate and remove
    **************************************************************************/
    var stateRowTemplate = $('#state-row-template').html();
    $(document).on('click', '.state-generate', function () {
        $(this).closest('div.state-row').after(stateRowTemplate);
    });

    $(document).on('click', '.state-remove', function () {
        var $this = $(this);
        if ($this.closest('.modal-body').find('div.state-row').length > 1) {
            $(this).closest('div.state-row').remove();
        }
    });
    /***************************************************************************
    * Ajax Pagination For Products Controller
    **************************************************************************/
    $(document).on('click', '#products-box .pagination a', function (e) {
        e.preventDefault();
        var $this = $(this);
        var productsBox = $this.closest('#products-box');
        productsBox.LoadingOverlay('show');
        $.ajax({
            url: $this.attr('href'),
            data: $this.closest('form').serialize()
        }).done(function (data) {
            productsBox.html(data).LoadingOverlay('hide');
        }).fail(function (err) {
            productsBox.LoadingOverlay('hide');
            notifyErrors(err, 't')
        });
    });

    /***************************************************************************
    * Ajax Filters For Products Controller
    **************************************************************************/
    $(document).on('change', '.filter', function (e) {
        var $this = $(this);
        var form = $this.closest('form');
        var productsBox = form.find('#products-box');
        productsBox.LoadingOverlay('show');
        $.ajax({
            url: form.attr('action'),
            data: form.serialize()
        }).done(function (data) {
            productsBox.html(data).LoadingOverlay('hide');
        }).fail(function (err) {
            productsBox.LoadingOverlay('hide');
            notifyErrors(err, 't')
        });
    });
    /***************************************************************************
    * Add To Cart Button
    **************************************************************************/
    var shoppingCartBox = $('#shopping-cart-box');
    function updateSoppingCart() {
        $.ajax({
            url: shoppingCartBox.data('url'),
        }).done(function (data) {
            shoppingCartBox.html(data);
        }).fail(function (err) {
            notifyErrors(err, 't');
        });
    }

    $(document).on('click', '.cart-btn', function (e) {
        e.preventDefault();
        var $this = $(this);
        var url = formData = null;
        var cartForm = $this.closest('form.cart-form');
        var altText = loading.xsm;
        var orginalText = $this.html();
        var notification = 'm';

        if (cartForm.length) {
            url = cartForm.attr('action');
            formData = new FormData(cartForm[0]);
        } else {
            formData = new FormData();
            url = $this.data('url');
            formData.append('quantity', $this.data('quantity'));
        }

        if ($this.data('notification') !== undefined) {
            notification = $this.data('notification');
        }

        if ($this.data('loading') !== undefined) {
            altText = $this.data('loading');
            if (loading[altText]) {
                altText = loading[altText];
            }
        }

        $this.prop('disabled', true).html(altText);

        request(url, formData, function (data) {
            updateSoppingCart();
            $this.prop('disabled', false).html(orginalText);
            if (data.total) {
                $('#cart-total').text(data.total);
            }
            notify(data.status, data.title, data.msg, notification);
        }, function (err) {
            $this.prop('disabled', false).html(orginalText);
            notifyErrors(err, notification);
        });
    });
    /***************************************************************************
    * Add To Wishlist Button
    **************************************************************************/
    var wishlistCount = $('#wishlist-count');
    $(document).on('click', '.wishlist-btn', function (e) {
        e.preventDefault();
        var $this = $(this);
        var url = $this.data('url');
        var altText = loading.xsm;
        var orginalText = $this.html();
        var notification = 'm';

        if ($this.data('notification') !== undefined) {
            notification = $this.data('notification');
        }

        if ($this.data('loading') !== undefined) {
            altText = $this.data('loading');
            if (loading[altText]) {
                altText = loading[altText];
            }
        }

        $this.prop('disabled', true).html(altText);

        request(url, {},function (data) {
            if (data.status === 'success') {
                orginalText = '<span class="fa fa-heart"></span>';
            }else{
                orginalText = '<span class="fa fa-heart-o"></span>';
            }
            $this.prop('disabled', false).html(orginalText);
            notify(data.status, data.title, data.msg, notification);
        }, function (err) {
            $this.prop('disabled', false).html(orginalText);
            notifyErrors(err, notification);
        });
    });
    /***************************************************************************
    * Comprehensive Ajax Form Section
    **************************************************************************/

    $(document).on('click', ".ajax-submit", function (e) {
        e.preventDefault();
        var ajaxSubmit = $(this);
        var form = $(this).closest('form');
        var url = form.attr('action');
        var method = form.attr('method');
        var ajaxSubmitHtml = ajaxSubmit.html();
        var altText = loading.xsm;
        var notification = 'm';
        
        
        if ((ajaxSubmit.data('confirm') !== undefined && !confirm(ajaxSubmit.data('confirm')))) {
            return;
        }

        if (!form.length) {
            form = $('<form></form>');
        }

        if (ajaxSubmit.data('url') !== undefined) {
            url = ajaxSubmit.data('url');
        }

        if (ajaxSubmit.data('method') !== undefined) {
            method = ajaxSubmit.data('method');
        } else if (method === undefined || method === '') {
            method = 'post';
        }

        if (form.data('notification') !== undefined) {
            notification = form.data('notification');
        }

        if (ajaxSubmit.data('notification') !== undefined) {
            notification = ajaxSubmit.data('notification');
        }

        if (form.data('loading') !== undefined) {
            altText = form.data('loading');
            if (loading[altText]) {
                altText = loading[altText];
            }
        }

        if (ajaxSubmit.data('loading') !== undefined) {
            altText = ajaxSubmit.data('loading');
            if (loading[altText]) {
                altText = loading[altText];
            }
        }

        ajaxSubmit.prop('disabled', true).html(altText);

        var formData = null;
        if (method.toLowerCase() === 'get') {
            formData = form.serialize();
        } else {
            formData = new FormData(form[0]);
            if (method.toLowerCase() !== 'post') {
                formData.append('_method', method.toUpperCase());
            }
            method = 'post';
        }
        
        request(url, formData, function (result) {
            ajaxSubmit.prop('disabled', false).html(ajaxSubmitHtml);
            if (result.LoginphoneNotActive) {
                window.setTimeout(function () {
                    window.location.href = result.redirect;
                }, ((result.after) ? result.after : 0));
            }
            if (result.redirect) {
                window.setTimeout(function () {
                    window.location.href = result.redirect;
                }, ((result.after) ? result.after : 0));
            }

            if (result.modal && result.html) {
                $(result.html).modal().on("hidden.bs.modal", function () {
                    $(this).siblings('.modal-backdrop').remove();
                    $(this).remove();
                });
                return;
            }

            if (result.render) {
                for(var el in result.render){
                    $(el).html(result.render[el]);
                }
            }

            if (result.reset) {
                for(var el in result.reset){
                    $(el).val(result.reset[el]);
                }
            }

            if (result.paginate) {
                $('.pagination-container .pagination-wrapper a:first').click();
            }

            if (result.delete) {
                ajaxSubmit.closest(result.target? result.target : '.ajax-target').remove();
            }
            

            if (result.reload) {
                window.setTimeout(function () {
                    location.reload(0);
                }, ((result.after) ? result.after : 0));
            }

            notify(result.status, result.title, result.msg, notification);

        }, function (err) {
            ajaxSubmit.prop('disabled', false).html(ajaxSubmitHtml);
            notifyErrors(err, notification);
        }, method);
    });

    /***************************************************************************
    * Check ALL Button For Table Rows
    ***************************************************************************/

    $(document).on('click', '#chk-all', function () {
        $('.chk-box').prop('checked', this.checked);
    });
    /***************************************************************************
    * generate file inputs
    **************************************************************************/
    $(document).on('click', '.file-generate', function () {
        var $this = $(this);
        var fileBox = $this.closest('.ajax-file');
        var newBox = $('.ajax-file:first').clone();
        if (fileBox.data('default') !== undefined) {
            newBox.find('img').prop('src', fileBox.data('default'));
        }
        newBox.find('.caption').append('<button type="button" class="file-remove btn btn-danger"><i class="icon-subtract" aria-hidden="true"></i></button>');
        fileBox.after(newBox);
    });
    $(document).on('click', '.file-remove', function () {
        var $this = $(this);
        if ($('.ajax-file').length > 1) {
            $this.closest('.ajax-file').remove();
        }
    });
    
    /***************************************************************************
    * Trigger File primary upload browsing Section
    **************************************************************************/

    $(document).on('click', '.ajax-file-primary', function (e) {
        var input = $(e.target).children('input[type=file]');
        if (!input.length) {
            input = $(e.target).siblings('input[type=file]')
        }
        input.click();
    });
    $(document).on('change', '.ajax-file-primary input[type=file]', function () {
        var img = $(this).closest('.ajax-file-primary').find('img');
        if (validateImgFile(this)) {
            previewURL(img, this);
        }
    });
    /***************************************************************************
    * Trigger File upload browsing Section
    **************************************************************************/

    $(document).on('click', '.ajax-file', function (e) {
        e.stopPropagation();
        var input = $(e.target).children('input[type=file]');
        if (!input.length) {
            input = $(e.target).siblings('input[type=file]')
        }
        input.click();
    });
    $(document).on('change', '.ajax-file input[type=file]', function () {
        var img = $(this).closest('.ajax-file').find('img');
        if (validateImgFile(this)) {
            previewURL(img, this);
        }
    });
    
    /****************************************************************************
    * Function Preview Url for file
    * @param  Image btn   [description]
    * @param  Input input [description]
    * @return Src      [description]
    ***************************************************************************/
    function previewURL(btn, input) {

        if (input.files && input.files[0]) {

            // collecting the file source
            var file = input.files[0];
            // preview the image
            var reader = new FileReader();
            reader.onload = function (e) {
                var src = e.target.result;
                btn.attr('src', src);
            };
            reader.readAsDataURL(file);
        }
    }

    /***************************************************************************
    * mark active page
    **************************************************************************/
    $('a[href="' + window.location.href + '"],a[href="' + window.location.href + 'home"]').closest('li').addClass('active');

    /***************************************************************************
    * validating the file
    **************************************************************************/

    function validateImgFile(input) {
        if (input.files && input.files[0]) {

            // collecting the file source
            var file = input.files[0];
            // validating the image name
            if (file.name.length < 1) {
                return false;
            }
            if (file.type.indexOf('image') === -1) {
                return false;
            }
            return true;
        }
    }

    /***************************************************************************
    * Custom logging function
    * @param mixed data
    * @returns void
    **************************************************************************/
    function _(data) {
        console.log(data);
    }

    /***************************************************************************
    * Custom Ajax request function
    * @param string url
    * @param mixed|FormData data
    * @param callable(data) completeHandler
    * @param callable errorHandler
    * @param callable progressHandler
    * @returns void
    **************************************************************************/
    window.request = function (url, data, completeHandler, errorHandler, progressHandler) {
        var method = '';
        if (typeof progressHandler === 'string' || progressHandler instanceof String) {
            method = progressHandler.toUpperCase();
        } else {
            method = "POST"
        }

        var xhr = null;

        $.ajax({
            url: url, //server script to process data
            type: method,
            xhr: function () {  // custom xhr
                xhr = $.ajaxSettings.xhr();
                if (xhr.upload && $.isFunction(progressHandler)) { // if upload property exists
                    xhr.upload.addEventListener('progress', progressHandler, false); // progressbar
                }
                return xhr;
            },
            // Ajax events
            success: completeHandler,
            error: errorHandler,
            // Form data
            data: data,
            mimeTypes: "multipart/form-data",
            // Options to tell jQuery not to process data or worry about the content-type
            cache: false,
            contentType: false,
            processData: false
        }, 'json');

        return xhr;
    };

    /***********************************************************************
    * Notify with a message in shape of fancy alert
    **********************************************************************/
    if (typeof noty === 'undefined' && notifyWith['noty']) {
        var notyScript = document.createElement('SCRIPT');
        notyScript.src = '//cdnjs.cloudflare.com/ajax/libs/jquery-noty/2.4.1/packaged/jquery.noty.packaged.min.js';
        document.getElementsByTagName('HEAD')[0].appendChild(notyScript);
    }
    if (typeof toastr === 'undefined' && notifyWith['toastr']) {
        var toastrScript = document.createElement('SCRIPT');
        toastrScript.src = '//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js';
        var toastrStyle = document.createElement('LINK');
        toastrStyle.href = '//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css';
        toastrStyle.type = 'text/css';
        toastrStyle.rel = 'stylesheet';
        var head = document.getElementsByTagName('HEAD')[0];
        head.appendChild(toastrStyle);
        head.appendChild(toastrScript);
    }
    window.notify = function (status, title, msg, type) {
        status = (status === 'error' ? 'danger' : status ? status : 'info');
        var callable = null;
        var template = '';
        var icons = {
            'danger': 'fa-ban',
            'success': 'fa-check',
            'info': 'fa-info',
            'warning': 'fa-warning'
        };
        var colors = {
            'danger': '#d9534f',
            'success': '#5cb85c',
            'info': '#5bc0de',
            'warning': 'orange'
        };
        if ($.isFunction(type)) {
            callable = type;
            type = 'm';
        }

        if (!type || type == 'm' || type == 'modal') {
            type = 'm';
            template =
            '<div class="modal fade modal-alert">\n' +
            '<style>.modal-alert *{color:white !important} .modal-alert .btn-outline{border: 1px solid #fff; background: transparent; border-radius: 2px;}</style> ' +
            '        <div class="modal-dialog">\n' +
            '            <div class="modal-content" style="background:' + colors[status] + '!important;text-align: center !important; word-wrap: break-word;">\n' +
            '                <div class="modal-header">\n' +
            '                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">\n' +
            '                        <span aria-hidden="true">&times;</span>\n' +
            '                    </button>\n' +
            '                    <h4 class="modal-title"><i class="icon fa {icon}"></i> {title}</h4>\n' +
            '                </div>\n' +
            '                <div class="modal-body">\n' +
            '                    <p>{msg}</p>\n' +
            '                </div>\n' +
            '                <div class="modal-footer">\n' +
            '                    <button type="button" class="btn btn-outline" data-dismiss="modal">&times;</button>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>';
        } else if (type == 'f' || type == 'flash') {
            template = ' <div class="alert ajax-alert alert-{status} alert-dismissible"  style="position:fixed !important; width:100%; top: 0; right: 0; left: 0; z-index: 9999999999;text-align: center !important;">\n' +
            '        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\n' +
            '        <h4><i class="icon fa {icon}"></i> {title}</h4>\n' +
            '        {msg}\n' +
            '    </div>';
        } else if ((type == 'fancy' || type == 'noty' || type == 'n') && typeof noty !== 'undefined') {
            noty({
                layout: 'bottomRight',
                type: (status == 'info' ? 'information' : (status == 'danger' ? 'error' : status) ),
                theme: 'defaultTheme',
                text: '<div onclick="$(this).closest(\'li\').fadeOut(500)" style="text-align: center;"><small dir="ltr" class="close">&times;</small><strong > <i class="icon fa ' + icons[status] + '"></i> ' + title + '</strong> <br> ' + msg + '</div>',
                timeout: 10000,
                progressBar: true, // [boolean] - displays a progress bar
                animation: {
                    open: 'animated bounceInLeft',
                    close: 'animated bounceOutLeft',
                    easing: 'swing',
                    speed: 500 // opening & closing animation speed
                }
            });
            return;
        } else if ((type == 'toastr' || type == 't') && typeof toastr !== 'undefined') {
            toastr.options.closeButton = true;
            toastr.options.escapeHtml = false;
            toastr.options.debug = false;
            toastr.options.progressBar = true;
            toastr.options.onclick = null;
            toastr.options.showDuration = 1000;
            toastr.options.hideDuration = 1000;
            toastr.options.timeOut = 20000;
            toastr.options.extendedTimeOut = 20000;
            status = status === 'danger' ? 'error' : status;
            toastr[status]('<div style="text-align: center;"><strong>' + title + '</strong>' + '<p>' + msg + '</p></div>');
            return;
        }
        template = template.replace(new RegExp('{icon}', 'g'), icons[status]);
        template = template.replace(new RegExp('{status}', 'g'), status);
        template = template.replace(new RegExp('{title}', 'g'), title);
        template = template.replace(new RegExp('{msg}', 'g'), msg);
        switch (type) {
            case 'm':
            case 'modal':
            var modal = $(template).modal().on("hidden.bs.modal", function () {
                $(this).siblings('.modal-backdrop').remove();
                $(this).remove();
                if ($.isFunction(callable)) {
                    callable();
                }
            });
            return;
            default:
            var body = $('body');
            body.find('.ajax-alert').remove();
            body.prepend(template);
        }

    };
    if (window.errors){
        notify(window.errors.status, window.errors.title, window.errors.msg, window.errors.notification? window.errors.notification : 'flash');
    }
    if (!window.locale){
        window.locale = 'ar';
    }
    /***************************************************************************
    * Select2 Plugin For tags
    **************************************************************************/
    var tagsList = $('#select-tags');
    if (tagsList.length) {
        tagsList.select2({
            tags: true,
            dir: "rtl",
            tokenSeparators: [',', ' '],
            theme: "classic",
            multiple: true,
            ajax: {
                url: tagsList.data('url'),
                type: "GET",
                dataType: "json",
                processResults: function (data, page) {
                    return {
                        results: data
                    };
                }
            }
        });
    }

    function notifyErrors(err, notification) {
        notification = notification || 'm'
        _(err.responseJSON)
        if (err.status === 422) {
            notify('error', msgs['error'][window.locale], implode(err.responseJSON.errors? err.responseJSON.errors : err.responseJSON), notification);
        } else if (err.status === 403) {
            notify('warning', msgs['unauthorized'][window.locale].title, msgs['unauthorized'][window.locale].txt, notification);
        } else if (err.status === 401) {
            notify('warning', msgs['unauthenticated'][window.locale].title, msgs['unauthenticated'][window.locale].txt, notification);
        } else if (err.status === 500 || err.status === 405) {
            notify('warning', msgs['internal'][window.locale].title, msgs['internal'][window.locale].txt, notification);
        } else if (err.status === 404) {
            notify('info', msgs['not_found'][window.locale].title, msgs['not_found'][window.locale].txt, notification);
        }
    }
    
    // get all cities from country id
    $(".register-conutry , .profile-conutry").on("change" , function(){
        
        var value = $(this).find(":selected").val();
        var lang  = $(this).attr("lang");
        var res = "";
        if(value == ""){
            $(".register-city").html("");
            return false;
        }
        var $this = $(this);
        var url = $this.attr('city-url');
        

        var form = new FormData();
        form.append('country_id', value);
        form.append('lang', lang);
        request(url, form, function (data) {
            if (data.status == true) {
                for(var i = 0 ; i <= data.cities.length - 1 ; i++){
                    res += "<option value='"+ data.cities[i].state_id +"'>"+ data.cities[i].state_name +"</option>";
                }
                $(".register-city").html("");
                $(".register-city").html(res);
                
            }
        }, function (err) {

        });
    });



})();
