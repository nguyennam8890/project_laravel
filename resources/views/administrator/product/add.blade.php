@extends('administrator.master')
@section('content')
<!-- PAGE CONTENT BEGINS -->
<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue" style="display: block;">Thêm mới sản phẩm</h3>
        <!-- Thông báo lỗi -->
        @include('administrator.block.error')

        <div class="widget">
            <form action="{!! route('administrator.product.postAdd1') !!}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <input type="hidden" name="_token" id="input_token" class="form-control" value="{!! csrf_token() !!}">
                <div class="formRow">
                    <label class="col-sm-2 control-label no-padding-right text_left" for="pro_name"> Tên sản phẩm:<span class="req">*</span> </label>
                    <div class="col-sm-10">
                        <input type="text" id="pro_name" class="form-control" name="pro_name" value="{{ old('pro_name') }}"/>
                    </div>
                </div>
                <div class="formRow">
                    <label class="col-sm-2 control-label no-padding-right text_left" for="image"> Chọn ảnh:</label>
                    <div class="col-sm-2">
                        <input type="file" id="id-input-file-2" name="image"/>
                    </div>
                </div>

                <div class="formRow">
                    <label class="col-sm-2 control-label no-padding-right text_left" for="cate_id"> Danh mục:<span class="req">*</span> </label>
                    <div class="col-sm-2">
                        <select class="form-control" name="cate_id">

                            <?php  recursiveCategory($category_product,$parent = 0,$str='',$select=0,$type='pro'); ?>
                        </select>

                    </div>
                </div>
                <div class="formRow">
                    <label class="col-sm-2 control-label no-padding-right text_left" for="pro_price"> Giá:</label>
                    <div class="col-sm-2">
                        <input type="number" id="pro_price" class="form-control" name="pro_price" value="{{ old('pro_price') }}"/>
                        <span>
                        <label class="middle">
                        <input class="ace" type="checkbox" id="pro_not_price" name="pro_not_price">
                        <span class="lbl">Liên hệ để biết giá</span>
                        </label>
                        </span>
                    </div>

                    <div class="col-sm-2">
                        <input type="text" id="pro_unit" class="form-control" name="pro_unit" value="{{ old('pro_unit') }}"/>
                    </div>
                    <div class="col-sm-2">
                        <em>(Đơn vị, vd: cái, chiếc, m2...)</em>
                    </div>
                </div>
                <div class="formRow">
                    <label class="col-sm-2 control-label no-padding-right text_left" for="pro_featured"> Nổi bật: </label>
                    <div class="col-sm-2">
                        <label>
                        <input id="pro_featured" name="pro_featured" class="ace ace-switch ace-switch-6" type="checkbox">
                        <span class="lbl"></span>
                        </label>
                    </div>
                </div>
                <div class="formRow">
                    <label class="col-sm-2 control-label no-padding-right text_left" for="pro_saller"> Bán chạy: </label>
                    <div class="col-sm-2">
                        <label>
                        <input name="pro_saller" id="pro_saller" class="ace ace-switch ace-switch-6" type="checkbox">
                        <span class="lbl"></span>
                        </label>
                    </div>
                </div>
                <div class="formRow">
                    <label class="col-sm-2 control-label no-padding-right text_left" for="pro_sell_off"> Giảm giá:</label>
                    <div class="col-sm-2">
                        <input type="number" id="pro_sell_off" class="form-control" min="1" max="50" name="pro_sell_off" value="{{ old('pro_sell_off') }}"/>
                    </div>
                    <div class="col-sm-2">
                        <em>(Note: 50%)</em>
                    </div>
                </div>
                <div class="formRow">
                    <label class="col-sm-2 control-label no-padding-right text_left" for="pro_status"> Trạng thái sản phẩm: </label>
                    <div class="col-sm-6">
                        <div class="control-group">
                            <div class="radio">
                                <label>
                                <input name="pro_status" id="pro_status" type="radio" class="ace" checked value="1">
                                <span class="lbl"> Còn hàng</span>
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input name="pro_status" id="pro_status" type="radio" class="ace" value="0">
                                <span class="lbl"> Hết hàng</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formRow">
                    <label class="col-sm-2 control-label no-padding-right text_left" for="status"> Trạng thái hiển thị: </label>
                    <div class="col-sm-2">
                        <label>
                        <input name="status" id="status" class="ace ace-switch ace-switch-6" type="checkbox" checked >
                        <span class="lbl"></span>
                        </label>
                    </div>
                </div>
                <div class="formRow">
                    <div class="col-sm-12">
                        <h3 class="header blue lighter smaller">
                            <i class="ace-icon fa fa-folder-o smaller-90"></i>
                            Thông tin sản phẩm
                        </h3>
                        <div id="tabs1">
                            <ul>
                                <li>
                                    <a href="#tabs-1">Mô tả</a>
                                </li>
                                <li>
                                    <a href="#tabs-2">Mô tả ngắn</a>
                                </li>
                                <li>
                                    <a href="#tabs-3">Điều kiện sử dụng</a>
                                </li>
                                <li>
                                    <a href="#tabs-4">Thông số kỹ thuật</a>
                                </li>
                                <li>
                                    <a href="#tabs-5">Ưu điểm sử dụng</a>
                                </li>
                            </ul>
                            <div id="tabs-1">
                                <textarea name="pro_content" class="form-control" rows="12">{!! old('pro_content') !!}</textarea>
                            </div>
                            <div id="tabs-2">
                                <textarea name="pro_short_content" class="form-control" rows="12">{!! old('pro_short_content') !!}</textarea>
                            </div>
                            <div id="tabs-3">
                                <textarea name="pro_terms_of_use" class="form-control" rows="12">{!! old('pro_terms_of_use') !!}</textarea>
                            </div>
                            <div id="tabs-4">
                                <textarea name="pro_digital" class="form-control" rows="12">{!! old('pro_digital') !!}</textarea>
                            </div>
                            <div id="tabs-5">
                                <textarea name="pro_pros_use" class="form-control" rows="12">{!! old('pro_pros_use') !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="formRow">
                    <div class="col-sm-12">
                        <h3 class="header blue lighter smaller">
                            <i class="ace-icon fa fa-folder-o smaller-90"></i>
                            Tối ưu SEO
                        </h3>
                    </div>
                </div>
                <div class="formRow">
                    <label class="col-sm-2 control-label no-padding-right text_left" for="meta_title"> Tiêu đề trang:
                    </br><span>Ký tự : </span><span class="title_page">100</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" onkeyup="countChar_title(this)" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" />
                    </div>
                </div>
                <div class="formRow">
                    <label class="col-sm-2 control-label no-padding-right text_left" for="meta_description">Mô tả trang:
                    </br><span>Ký tự : </span><span class="des_page">160</span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " onkeyup="countChar_des(this)" name="meta_description" id="meta_description" value="{{ old('meta_description') }}"/>
                    </div>
                </div>
                <div class="formRow">
                    <label class="col-sm-2 control-label no-padding-right text_left" for="form-field-tags"> Tags sản phẩm: </label>
                    <div class="col-sm-10">
                        <div class="col-sm-9">
                            <div class="inline">
                                <input type="text" name="" id="form-field-tags" value="" placeholder="Enter tags ..." />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix formRow">
                    <div class="col-md-offset-3 col-md-9">
                        <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                        </button>
                        &nbsp; &nbsp; &nbsp;
                        <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- PAGE CONTENT ENDS -->
</div>
<!-- /.col -->
</div><!-- /.row -->
@stop
@section('page-script')
<script>
    function countChar_title(val) {
      var len = val.value.length;
      if (len >= 100) {
        val.value = val.value.substring(0, 100);
      } else {
        $('.title_page').text(100 - len);
      }
    };
     function countChar_des(val) {
      var len = val.value.length;
      if (len >= 160) {
        val.value = val.value.substring(0, 160);
      } else {
        $('.des_page').text(160 - len);
      }
    };
</script>
<!-- page specific plugin scripts -->
<script src="{{ url('resources/assets/js/chosen.jquery.min.js') }}"></script>
<script src="{{ url('resources/assets/js/fuelux.spinner.min.js') }}"></script>
<script src="{{ url('resources/assets/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('resources/assets/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('resources/assets/js/moment.min.js') }}"></script>
<script src="{{ url('resources/assets/js/daterangepicker.min.js') }}"></script>
<script src="{{ url('resources/assets/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ url('resources/assets/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ url('resources/assets/js/jquery.knob.min.js') }}"></script>
<script src="{{ url('resources/assets/js/jquery.autosize.min.js') }}"></script>
<script src="{{ url('resources/assets/js/jquery.inputlimiter.1.3.1.min.js') }}"></script>
<script src="{{ url('resources/assets/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ url('resources/assets/js/bootstrap-tag.min.js') }}"></script>
<!-- Menu Tabs -->
<script src="{{ url('resources/assets/js/jquery-ui.min.js') }}"></script>
<!-- page specific plugin styles -->
<link rel="stylesheet" href="{{ url('resources/assets/css/jquery-ui.min.css') }}" />
<script type="text/javascript">
    jQuery(function($) {
        $( "#tabs1").tabs();
    });
</script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        // $('#id-disable-check').on('click', function() {
        //     var inp = $('#form-input-readonly').get(0);
        //     if(inp.hasAttribute('disabled')) {
        //         inp.setAttribute('readonly' , 'true');
        //         inp.removeAttribute('disabled');
        //         inp.value="This text field is readonly!";
        //     }
        //     else {
        //         inp.setAttribute('disabled' , 'disabled');
        //         inp.removeAttribute('readonly');
        //         inp.value="This text field is disabled!";
        //     }
        // });

        if(!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect:true});
            //resize the chosen on window resize

            $(window)
            .off('resize.chosen')
            .on('resize.chosen', function() {
                $('.chosen-select').each(function() {
                     var $this = $(this);
                     $this.next().css({'width': $this.parent().width()});
                })
            }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                if(event_name != 'sidebar_collapsed') return;
                $('.chosen-select').each(function() {
                     var $this = $(this);
                     $this.next().css({'width': $this.parent().width()});
                })
            });


            $('#chosen-multiple-style .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                 else $('#form-field-select-4').removeClass('tag-input-style');
            });
        }


        $('[data-rel=tooltip]').tooltip({container:'body'});
        $('[data-rel=popover]').popover({container:'body'});

        $('textarea[class*=autosize]').autosize({append: "\n"});
        $('textarea.limited').inputlimiter({
            remText: '%n character%s remaining...',
            limitText: 'max allowed : %n.'
        });

        $.mask.definitions['~']='[+-]';
        $('.input-mask-date').mask('99/99/9999');
        $('.input-mask-phone').mask('(999) 999-9999');
        $('.input-mask-eyescript').mask('~9.99 ~9.99 999');
        $(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});



        $( "#input-size-slider" ).css('width','200px').slider({
            value:1,
            range: "min",
            min: 1,
            max: 8,
            step: 1,
            slide: function( event, ui ) {
                var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
                var val = parseInt(ui.value);
                $('#form-field-4').attr('class', sizing[val]).val('.'+sizing[val]);
            }
        });

        $( "#input-span-slider" ).slider({
            value:1,
            range: "min",
            min: 1,
            max: 12,
            step: 1,
            slide: function( event, ui ) {
                var val = parseInt(ui.value);
                $('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
            }
        });



        //"jQuery UI Slider"
        //range slider tooltip example
        $( "#slider-range" ).css('height','200px').slider({
            orientation: "vertical",
            range: true,
            min: 0,
            max: 100,
            values: [ 17, 67 ],
            slide: function( event, ui ) {
                var val = ui.values[$(ui.handle).index()-1] + "";

                if( !ui.handle.firstChild ) {
                    $("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
                    .prependTo(ui.handle);
                }
                $(ui.handle.firstChild).show().children().eq(1).text(val);
            }
        }).find('span.ui-slider-handle').on('blur', function(){
            $(this.firstChild).hide();
        });


        $( "#slider-range-max" ).slider({
            range: "max",
            min: 1,
            max: 10,
            value: 2
        });

        $( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
            // read initial values from markup and remove that
            var value = parseInt( $( this ).text(), 10 );
            $( this ).empty().slider({
                value: value,
                range: "min",
                animate: true

            });
        });

        $("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item


        $('#id-input-file-1 , #id-input-file-2').ace_file_input({
            no_file:'No File ...',
            btn_choose:'Choose',
            btn_change:'Change',
            droppable:true,
            onchange:null,
            thumbnail:false //| true | large
            //whitelist:'gif|png|jpg|jpeg'
            //blacklist:'exe|php'
            //onchange:''
            //
        });
        //pre-show a file name, for example a previously selected file
        //$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])


        $('#id-input-file-3').ace_file_input({
            style:'well',
            btn_choose:'Drop files here or click to choose',
            btn_change:null,
            no_icon:'ace-icon fa fa-cloud-upload',
            droppable:true,
            thumbnail:'small'//large | fit
            //,icon_remove:null//set null, to hide remove/reset button
            /**,before_change:function(files, dropped) {
                //Check an example below
                //or examples/file-upload.html
                return true;
            }*/
            /**,before_remove : function() {
                return true;
            }*/
            ,
            preview_error : function(filename, error_code) {
                //name of the file that failed
                //error_code values
                //1 = 'FILE_LOAD_FAILED',
                //2 = 'IMAGE_LOAD_FAILED',
                //3 = 'THUMBNAIL_FAILED'
                //alert(error_code);
            }

        }).on('change', function(){
            //console.log($(this).data('ace_input_files'));
            //console.log($(this).data('ace_input_method'));
        });


        //$('#id-input-file-3')
        //.ace_file_input('show_file_list', [
            //{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
            //{type: 'file', name: 'hello.txt'}
        //]);
        //dynamically change allowed formats by changing allowExt && allowMime function
        $('#id-file-format').removeAttr('checked').on('change', function() {
            var whitelist_ext, whitelist_mime;
            var btn_choose
            var no_icon
            if(this.checked) {
                btn_choose = "Drop images here or click to choose";
                no_icon = "ace-icon fa fa-picture-o";

                whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
                whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
            }
            else {
                btn_choose = "Drop files here or click to choose";
                no_icon = "ace-icon fa fa-cloud-upload";

                whitelist_ext = null;//all extensions are acceptable
                whitelist_mime = null;//all mimes are acceptable
            }
            var file_input = $('#id-input-file-3');
            file_input
            .ace_file_input('update_settings',
            {
                'btn_choose': btn_choose,
                'no_icon': no_icon,
                'allowExt': whitelist_ext,
                'allowMime': whitelist_mime
            })
            file_input.ace_file_input('reset_input');

            file_input
            .off('file.error.ace')
            .on('file.error.ace', function(e, info) {
            });

        });

        $('#spinner1').ace_spinner({value:0,min:0,max:200,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
        .closest('.ace-spinner')
        .on('changed.fu.spinbox', function(){
            //alert($('#spinner1').val())
        });
        $('#spinner1a').ace_spinner({value:0,min:0,max:200,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
        .closest('.ace-spinner')
        .on('changed.fu.spinbox', function(){
           /* alert($('#spinner1').val())*/
        });
        $('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
        $('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
        $('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
        //datepicker plugin
        //link
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
        //show datepicker when clicking on the icon
        .next().on(ace.click_event, function(){
            $(this).prev().focus();
        });

        //or change it into a date range picker
        $('.input-daterange').datepicker({autoclose:true});


        //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
        $('input[name=date-range-picker]').daterangepicker({
            'applyClass' : 'btn-sm btn-success',
            'cancelClass' : 'btn-sm btn-default',
            locale: {
                applyLabel: 'Apply',
                cancelLabel: 'Cancel',
            }
        })
        .prev().on(ace.click_event, function(){
            $(this).next().focus();
        });


        $('#timepicker1').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false
        }).next().on(ace.click_event, function(){
            $(this).prev().focus();
        });

        $('#date-timepicker1').datetimepicker().next().on(ace.click_event, function(){
            $(this).prev().focus();
        });


        $('#colorpicker1').colorpicker();
        $('#simple-colorpicker-1').ace_colorpicker();
        $(".knob").knob();


        var tag_input = $('#form-field-tags');
        try{
            tag_input.tag(
              {
                placeholder:tag_input.attr('placeholder'),
                //enable typeahead by specifying the source array
                source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
              }
            )

            //programmatically add a new
            var $tag_obj = $('#form-field-tags').data('tag');
            $tag_obj.add('Programmatically Added');
        }
        catch(e) {
            //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
            tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
            //$('#form-field-tags').autosize({append: "\n"});
        }


        /////////
        $('#modal-form input[type=file]').ace_file_input({
            style:'well',
            btn_choose:'Drop files here or click to choose',
            btn_change:null,
            no_icon:'ace-icon fa fa-cloud-upload',
            droppable:true,
            thumbnail:'large'
        })
        $('#modal-form').on('shown.bs.modal', function () {
            if(!ace.vars['touch']) {
                $(this).find('.chosen-container').each(function(){
                    $(this).find('a:first-child').css('width' , '210px');
                    $(this).find('.chosen-drop').css('width' , '210px');
                    $(this).find('.chosen-search input').css('width' , '200px');
                });
            }
        })
        $(document).one('ajaxloadstart.page', function(e) {
            $('textarea[class*=autosize]').trigger('autosize.destroy');
            $('.limiterBox,.autosizejs').remove();
            $('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
        });

    });
</script>
@stop