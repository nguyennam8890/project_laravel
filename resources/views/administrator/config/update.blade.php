@extends('administrator.master')
@section('content')
<!-- PAGE CONTENT BEGINS -->
<div class="row">
    <div class="col-xs-12">
        <h3 class="header smaller lighter blue" style="display: block;"> Cấu hình website</h3>
        <div class="widget">
            <form class="form-horizontal" role="form">
            <div class="formRow">
                <label class="col-sm-2 control-label no-padding-right text_left" for="form-field-1-1">Logo Shop:<span class="req">*</span> </label>
                <div class="col-sm-2">
                    <input type="file" id="id-input-file-2" />
                </div>
            </div>
            <div class="formRow">
                <label class="col-sm-2 control-label no-padding-right text_left" for="form-field-1-1">Favicon Website:<span class="req">*</span> </label>
                <div class="col-sm-2">
                    <input type="file" id="id-input-file-2" />
                </div>
            </div>
            <div class="formRow">
                <label class="col-sm-2 control-label no-padding-right text_left" for="form-field-1-1"> Shipping(Note:10 VNĐ):<span class="req">*</span> </label>
                <div class="col-sm-10">
                    <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                </div>
            </div>
            <div class="formRow">
                <label class="col-sm-2 control-label no-padding-right text_left" for="form-field-1-1">Tiêu để trang chủ:<span class="req">*</span> </label>
                <div class="col-sm-10">
                    <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                </div>
            </div>
            <div class="formRow">
                <label class="col-sm-2 control-label no-padding-right text_left" for="form-field-1-1">Từ khóa seo:<span class="req">*</span> </label>
                <div class="col-sm-10">
                    <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                </div>
            </div>
            <div class="formRow">
                <label class="col-sm-2 control-label no-padding-right text_left" for="form-field-1-1"> Mô tả:<span class="req">*</span> </label>
                <div class="col-sm-10">
                    <div class="control-group">
                        <textarea name="" id="input" class="form-control" rows="15" required="required"></textarea>
                    </div>
                </div>
            </div>
            <div class="formRow">
                <label class="col-sm-2 control-label no-padding-right text_left" for="form-field-1-1"> Slogan:<span class="req">*</span> </label>
                <div class="col-sm-10">
                    <div class="control-group">
                        <textarea name="" id="input" class="form-control" rows="15" required="required"></textarea>
                    </div>
                </div>
            </div>
            <div class="formRow">
                <label class="col-sm-2 control-label no-padding-right text_left" for="form-field-1-1"> Thông tin trang:<span class="req">*</span> </label>
                <div class="col-sm-10">
                    <div class="control-group">
                        <textarea name="" id="input" class="form-control" rows="15" required="required"></textarea>
                    </div>
                </div>
            </div>
            <div class="formRow">
                <label class="col-sm-2 control-label no-padding-right text_left" for="form-field-1-1"> Liên hệ:<span class="req">*</span> </label>
                <div class="col-sm-10">
                    <div class="control-group">
                        <textarea name="" id="input" class="form-control" rows="15" required="required"></textarea>
                    </div>
                </div>
            </div>
            <div class="formRow">
                <label class="col-sm-2 control-label no-padding-right text_left" for="form-field-1-1"> Bản đồ:<span class="req">*</span> </label>
                <div class="col-sm-10">
                    <div class="control-group">
                        <textarea name="" id="input" class="form-control" rows="15" required="required"></textarea>
                    </div>
                </div>
            </div>
            <div class="formRow">
               <div class="col-sm-12">
               <h3 class="header blue lighter smaller">
                  <i class="ace-icon fa fa-folder-o smaller-90"></i>
                  Tùy chọn
               </h3>
               <div id="tabs1">
                  <ul>
                     <li>
                        <a href="#tabs-1">Tùy chọn 1</a>
                     </li>
                     <li>
                        <a href="#tabs-2">Tùy chọn 2</a>
                     </li>
                     <li>
                        <a href="#tabs-3">Tùy chọn 3</a>
                     </li>
                     <li>
                        <a href="#tabs-4">Tùy chọn 4</a>
                     </li>
                     <li>
                        <a href="#tabs-5">Tùy chọn 5</a>
                     </li>
                     <li>
                        <a href="#tabs-6">Tùy chọn 6</a>
                     </li>
                  </ul>
                  <div id="tabs-1">
                        <textarea name="" id="input" class="form-control" rows="12" required="required"> tùy chọn1</textarea>
                  </div>
                  <div id="tabs-2">
                     <textarea name="" id="input" class="form-control" rows="12" required="required"> tùy chọn2</textarea>
                  </div>
                  <div id="tabs-3">
                     <textarea name="" id="input" class="form-control" rows="12" required="required"> tùy chọn3</textarea>
                  </div>
                  <div id="tabs-4">
                     <textarea name="" id="input" class="form-control" rows="12" required="required"> tùy chọn4</textarea>
                  </div>
                  <div id="tabs-5">
                    <textarea name="" id="input" class="form-control" rows="12" required="required"> tùy chọn5</textarea>
                  </div>
                  <div id="tabs-6">
                    <textarea name="" id="input" class="form-control" rows="12" required="required"> tùy chọn6</textarea>
                  </div>
               </div>
            </div>
            <!-- ./col -->
            </div>
            <div class="formRow">
               <div class="col-sm-12">
               <h3 class="header blue lighter smaller">
                  <i class="ace-icon fa fa-folder-o smaller-90"></i>
                  Hỗ trợ
               </h3>
               <div id="tabs4">
                  <ul>
                     <li>
                        <a href="#tabs-19">Fanpage</a>
                     </li>
                     <li>
                        <a href="#tabs-20">Google Analytic</a>
                     </li>
                     <li>
                        <a href="#tabs-21">Chat online</a>
                     </li>
                     <li>
                        <a href="#tabs-22">Hỗ trợ online</a>
                     </li>
                     <li>
                        <a href="#tabs-23">Tùy chọn 23</a>
                     </li>
                  </ul>
                  <div id="tabs-19">
                    <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
                  <div id="tabs-20">
                     <textarea name="" id="input" class="form-control" rows="15" required="required"></textarea>
                  </div>
                  <div id="tabs-21">
                      <textarea name="" id="input" class="form-control" rows="15" required="required"></textarea>
                  </div>
                  <div id="tabs-22">
                     <textarea name="" id="input" class="form-control" rows="15" required="required"></textarea>
                  </div>
                  <div id="tabs-23">
                     <textarea name="" id="input" class="form-control" rows="15" required="required"></textarea>
                  </div>
               </div>
            </div>
            <!-- ./col -->
            </div>
            <div class="formRow">
               <div class="col-sm-12">
               <h3 class="header blue lighter smaller">
                  <i class="ace-icon fa fa-folder-o smaller-90"></i>
                  Link mạng xã hội
               </h3>
               <div id="tabs2">
                  <ul>
                     <li>
                        <a href="#tabs-7">Facebook 7</a>
                     </li>
                     <li>
                        <a href="#tabs-8">googleplus+ 8</a>
                     </li>
                     <li>
                        <a href="#tabs-9">twitter 9</a>
                     </li>
                     <li>
                        <a href="#tabs-10">youtube 10</a>
                     </li>
                     <li>
                        <a href="#tabs-11">instagram 11</a>
                     </li>
                     <li>
                        <a href="#tabs-12">Tùy chọn 12</a>
                     </li>
                  </ul>
                  <div id="tabs-7">
                       <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
                  <div id="tabs-8">
                     <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
                  <div id="tabs-9">
                    <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
                  <div id="tabs-10">
                     <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
                  <div id="tabs-11">
                    <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
                  <div id="tabs-12">
                    <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
               </div>
            </div>
            <!-- ./col -->
            </div>
            <div class="formRow">
               <div class="col-sm-12">
               <h3 class="header blue lighter smaller">
                  <i class="ace-icon fa fa-folder-o smaller-90"></i>
                  Text icon
               </h3>
               <div id="tabs3">
                  <ul>
                     <li>
                        <a href="#tabs-13">Text icon1</a>
                     </li>
                     <li>
                        <a href="#tabs-14">Text icon2</a>
                     </li>
                     <li>
                        <a href="#tabs-15">Text icon3</a>
                     </li>
                     <li>
                        <a href="#tabs-16">Text icon4</a>
                     </li>
                     <li>
                        <a href="#tabs-17">Text icon5</a>
                     </li>
                     <li>
                        <a href="#tabs-18">Text icon6</a>
                     </li>
                  </ul>
                  <div id="tabs-13">
                       <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
                  <div id="tabs-14">
                     <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
                  <div id="tabs-15">
                    <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
                  <div id="tabs-16">
                     <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
                  <div id="tabs-17">
                    <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
                  <div id="tabs-18">
                    <input type="text" id="form-field-1-1" placeholder="Text Field" class="form-control" />
                  </div>
               </div>
            </div>
            <!-- ./col -->
            </div>
             <div class="clearfix formRow">
            <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-info" type="button">
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

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        $('#id-disable-check').on('click', function() {
            var inp = $('#form-input-readonly').get(0);
            if(inp.hasAttribute('disabled')) {
                inp.setAttribute('readonly' , 'true');
                inp.removeAttribute('disabled');
                inp.value="This text field is readonly!";
            }
            else {
                inp.setAttribute('disabled' , 'disabled');
                inp.removeAttribute('readonly');
                inp.value="This text field is disabled!";
            }
        });


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
            droppable:false,
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
        $('#spinner1c').ace_spinner({value:0,min:0,max:200,step:1, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
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
        //jquery tabs
            $( "#tabs" ).tabs();
    });
</script>
<!-- menu Tabs -->
<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
            //jquery tabs
        $( "#tabs1" ).tabs();
        $( "#tabs2" ).tabs();
        $( "#tabs3" ).tabs();
        $( "#tabs4" ).tabs();
    });
</script>
@stop