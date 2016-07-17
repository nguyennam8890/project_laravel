@extends('administrator.master')
@section('content')
<div class="row">
   <div class="col-xs-12">
      <h3 class="header smaller lighter blue" style="display: block;">Quản lý danh mục</h3>
      <div class="clearfix" style="display: block;">
         <div class="pull-left" style="margin-bottom: 10px;">
            <a class="btn btn-info" href="{{ URL::to('administrator/cate/add') }}"><strong>Thêm mới danh mục</strong> &nbsp;&nbsp;<i class="ace-icon glyphicon glyphicon-plus"></i></a>
         </div>
         <div class="pull-right tableTools-container"></div>
      </div>
      <div class="table-header" style="display: block;">
         Results for "Latest Registered Domains"
      </div>
      <!-- div.table-responsive -->
      <!-- div.dataTables_borderWrap -->
      <div>
         <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
         <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <table id="dynamic-table" class="table table-striped table-bordered table-hover" >
              <thead>
                  <tr>
                     <th class="center">
                        <label class="pos-rel">
                        <input type="checkbox" class="ace" />
                        <span class="lbl"></span>
                        </label>
                     </th>
                     <th>Tên danh mục</th>
                     <th>Hình ảnh</th>
                     <th>Banner</th>
                     <th class="hidden-480">Số sản phẩm</th>
                     <th>
                        <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                        Update
                     </th>
                     <th>Trạng thái</th>
                     <th>Thao tác</th>
                  </tr>
               </thead>
               <tbody>
               @if ($aListCategorys)
                 @foreach ($aListCategorys  as $key=>$aListCategory)
                  <tr id='88'>
                     <td class="center">
                        <label class="pos-rel">
                          <input type="checkbox" class="ace" />
                          <span class="lbl"></span>
                        </label>
                     </td>
                     <td>
                        {{ $aListCategory['name'] }}
                     </td>

                     <td>
                        @if ($aListCategory['picture'])
                          <img src="{!! asset('resources/upload/'.$aListCategory['picture']) !!}" width="30">
                        @endif
                     </td>
                     <td>
                        @if ($aListCategory['banner'])
                          <img src="{!! asset('resources/upload/'.$aListCategory['banner']) !!}" width="30">
                        @endif
                     </td>
                     <td class="hidden-480">{{ $aCountRecordByCategorys[$key]['id'] }}</td><!-- Số lượng sản phẩm theo danh mục -->
                     <td>{{ $aListCategory['updated_at'] }}</td>

                     <td class="hidden-sm hidden-xs action-buttons">
                        @if ($aListCategory['status'] == 1)
                          <a id="status" rel='{!! $aListCategory['id'] !!}' class="btn btn-primary btn-xs ace-icon glyphicon glyphicon-ok" ></a>
                        @else
                           <a id="status" rel='{!! $aListCategory['id'] !!}' class="btn btn-danger btn-xs ace-icon glyphicon glyphicon-remove"></a>
                        @endif
                     </td>
                     <td>
                        <div class="hidden-sm hidden-xs action-buttons">

                           <a class="green" href="{!! URL::route('administrator.cate.getEdit1',$aListCategory['id']) !!}"> <i class="ace-icon fa fa-pencil bigger-130"></i></a>

                           <a id="delelteCate" rel='{!! $aListCategory['id'] !!}' class="red ace-icon fa fa-trash-o bigger-130" onclick="return xacnhanxoa('Bạn có chắc muốn xóa danh mục này không?');"></a>
                        </div>

                        <div class="hidden-md hidden-lg">
                           <div class="inline pos-rel">
                              <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                              <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">

                                 <li>
                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                    <span class="green">
                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                    </span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                    <span class="red">
                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                    </span>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               @endif
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>

@stop
@section('page-script')
<script type="text/javascript">
   window.jQuery || document.write("<script src='{{ url('resources/assets/js/jquery.min.js') }}>"+"<"+"/script>");
</script>
<script type="text/javascript">
   if('ontouchstart' in document.documentElement) document.write("<script src='{{ url('resources/assets/js/jquery.mobile.custom.min.js') }}>"+"<"+"/script>");
</script>
<script src="{{ url('resources/assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('resources/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>
<script src="{{ url('resources/assets/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ url('resources/assets/js/dataTables.colVis.min.js') }}"></script>
<script type="text/javascript">
   jQuery(function($) {
       //initiate dataTables plugin
       var oTablé =
       $('#dynamic-table')
       .wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
       .dataTable( {
           bAutoWidth: false,
           "aoColumns": [
             { "bSortable": false },
             null, null,null, null, null,null,
             { "bSortable": false }
           ],
           "aaSorting": [],

           /*,
           "sScrollY": "200px",
           "bPaginate": false,

           "sScrollX": "100%",
           "sScrollXInner": "120%",
           "bScrollCollapse": true,*/
           //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
           //you may want to wrap the table inside a "div.dataTables_borderWrap" element

          /* "iDisplayLength": 50*/
       } );
       //oTablé.fnAdjustColumnSizing();


       //TableTools settings
       TableTools.classes.container = "btn-group btn-overlap";
       TableTools.classes.print = {
           "body": "DTTT_Print",
           "info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
           "message": "tableTools-print-navbar"
       }

       //initiate TableTools extension
       var tableTools_obj = new $.fn.dataTable.TableTools( oTablé, {
           "sSwfPath": "{!! url('resources/assets/swf/copy_csv_xls_pdf.swf') !!}",

           "sRowSelector": "td:not(:nth-last-child(-n+2))",
           "sRowSelect": "multi",
           "fnRowSelected": function(row) {
               //check checkbox when row is selected
               try { $(row).find('input[type=checkbox]').get(0).checked = true }
               catch(e) {}
           },
           "fnRowDeselected": function(row) {
               //uncheck checkbox
               try { $(row).find('input[type=checkbox]').get(0).checked = false }
               catch(e) {}
           },

           "sSelectedClass": "success",
           "aButtons": [
               {
                   "sExtends": "copy",
                   "sToolTip": "Copy to clipboard",
                   "sButtonClass": "btn btn-white btn-primary btn-bold",
                   "sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
                   "fnComplete": function() {
                       this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
                           <p>Copied '+(oTablé.fnSettings().fnRecordsTotal())+' row(s) to the clipboard.</p>',
                           1500
                       );
                   }
               },

               {
                   "sExtends": "csv",
                   "sToolTip": "Export to CSV",
                   "sButtonClass": "btn btn-white btn-primary  btn-bold",
                   "sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
               },

               {
                   "sExtends": "pdf",
                   "sToolTip": "Export to PDF",
                   "sButtonClass": "btn btn-white btn-primary  btn-bold",
                   "sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
               },

               {
                   "sExtends": "print",
                   "sToolTip": "Print view",
                   "sButtonClass": "btn btn-white btn-primary  btn-bold",
                   "sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",

                   "sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",

                   "sInfo": "<h3 class='no-margin-top'>Print view</h3>\
                             <p>Please use your browser's print function to\
                             print this table.\
                             <br />Press <b>escape</b> when finished.</p>",
               }
           ]
       } );
       //we put a container before our table and append TableTools element to it
       $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));

       //also add tooltips to table tools buttons
       //addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
       //so we add tooltips to the "DIV" child after it becomes inserted
       //flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
       setTimeout(function() {
           $(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
               var div = $(this).find('> div');
               if(div.length > 0) div.tooltip({container: 'body'});
               else $(this).tooltip({container: 'body'});
           });
       },200);



       //ColVis extension
       var colvis = new $.fn.dataTable.ColVis( oTablé, {
           "buttonText": "<i class='fa fa-search'></i>",
           "aiExclude": [0, 7],
           "bShowAll": true,
           //"bRestore": true,
           "sAlign": "right",
           "fnLabel": function(i, title, th) {
               return $(th).text();//remove icons, etc
           }

       });

       //style it
       $(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')

       //and append it to our table tools btn-group, also add tooltip
       $(colvis.button())
       .prependTo('.tableTools-container .btn-group')
       .attr('title', 'Show/hide columns').tooltip({container: 'body'});

       //and make the list, buttons and checkboxed Ace-like
       $(colvis.dom.collection)
       .addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
       .find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
       .find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');



       /////////////////////////////////
       //table checkboxes
       $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

       //select/deselect all rows according to table header checkbox
       $('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
           var th_checked = this.checked;//checkbox inside "TH" table header

           $(this).closest('table').find('tbody > tr').each(function(){
               var row = this;
               if(th_checked) tableTools_obj.fnSelect(row);
               else tableTools_obj.fnDeselect(row);
           });
       });

       //select/deselect a row when the checkbox is checked/unchecked
       $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
           var row = $(this).closest('tr').get(0);
           if(!this.checked) tableTools_obj.fnSelect(row);
           else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
       });

           $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
           e.stopImmediatePropagation();
           e.stopPropagation();
           e.preventDefault();
       });

       //And for the first simple table, which doesn't have TableTools or dataTables
       //select/deselect all rows according to table header checkbox
       var active_class = 'active';
       $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
           var th_checked = this.checked;//checkbox inside "TH" table header

           $(this).closest('table').find('tbody > tr').each(function(){
               var row = this;
               if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
               else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
           });
       });

       //select/deselect a row when the checkbox is checked/unchecked
       $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
           var $row = $(this).closest('tr');
           if(this.checked) $row.addClass(active_class);
           else $row.removeClass(active_class);
       });

       /********************************/
       //add tooltip for small view action buttons in dropdown menu
       $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

       //tooltip placement on right or left
       function tooltip_placement(context, source) {
           var $source = $(source);
           var $parent = $source.closest('table')
           var óff = $parent.offset();
           var w1 = $parent.width();
           var òff = $source.offset();
           //var w2 = $source.width();

           if( parseInt(òff.left) < parseInt(óff.left) + parseInt(w1 / 2) ) return 'right';
           return 'left';
       }
   })
</script>
@stop