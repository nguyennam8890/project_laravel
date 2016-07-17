$('div.alert').delay(10000).slideUp();
function xacnhanxoa(msg)
   {
      if(window.confirm(msg))
      {
        return true;
      }
      return false;
   }
$(document).ready(function() {
	$("#addImages").click(function(){
		$("#insert").append('<div class="form-group"><input type="file" name="fEditDetail[]"></div>');
	});
});
//Truyền Jquery sang Ajax
$(document).ready(function() {
	$('a#del_img_demo').on('click',function(){

		var url    = 'http://localhost:8080/www/framework/project_laravel/admin/product/delimg/';
		//Làm việc với form thì phải thêm biến token
		var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
		var idHinh = $(this).parent().find("img").attr('idHinh');
		var img    = $(this).parent().find("img").attr('src');
		var rid   = $(this).parent().find("img").attr('id');
		$.ajax({
			url: url + idHinh,
			type:'GET',//Phương thức get phải đúng với phương thức gửi bên form<div></div>
			cache:false,
			data: {"_token":_token,"idHinh":idHinh,"urlHinh":img},//Nhận dữ liệu từ form nên _token là bắt buộc
			//Nếu thành công thì xóa div
			success:function(data){//Trong function phải có biến data gửi từ bên controller sang
			 if(data == "Oke")
				{
					$("#"+rid).remove();
				}
				else
				{
					alert("Error ! Please Contact Admin");
				}
			}
			});
		});
});

//Even Click for button update Status Category
$(document).ready(function() {
    $('a#status').on('click',function(){
       var iCateId = $(this).attr('rel');
       var token = $("input[name='_token']").val();
       var old_this = $(this);
        $.ajax({
            url: 'updateStatusCategory/'+iCateId,
            type: 'GET',
            cache: false,
            data: {"_token": token,"iCateId":iCateId},
            success: function(data)
            {
                if(data == "Oke")
                {
                   if(old_this.hasClass('glyphicon-ok') && old_this.hasClass('btn-primary'))
                       {
                            alert('Cập nhật trạng thái thành công');
                            old_this.removeClass('glyphicon-ok');
                            old_this.removeClass('btn-primary');
                            old_this.addClass('glyphicon-remove');
                            old_this.addClass('btn-danger');
                       }
                    else if(old_this.hasClass('glyphicon-remove') && old_this.hasClass('btn-danger'))
                        {
                            alert('Cập nhật trạng thái thành công');
                            old_this.removeClass('glyphicon-remove');
                            old_this.removeClass('btn-danger');
                            old_this.addClass('glyphicon-ok');
                            old_this.addClass('btn-primary');
                        }
                }
            }
      });

     });
});
//Even delete  Category
$(document).ready(function() {
    $('a#delelteCate').on('click', function() {
        var iCateId = $(this).attr('rel');
        var token = $("input[name='_token']").val();
        var old_this = $(this);
         $.ajax({
            url: 'delete/'+iCateId,
            type: 'GET',
            cache: false,
            data: {"_token": token,"iCateId":iCateId},
            success: function(data)
            {
                if(data == "Oke")
                {
                    old_this.parent().parent().parent().remove();
                }
                else
                {
                    alert("Bạn không thể xóa danh mục này");
                }
            }
      });
    });
});
//Disable input price when click checkbox liên hệ để biết giá
$('#pro_not_price').click(function(event) {
        $('#pro_sell_off').attr('disabled',this.checked);
        $('#pro_price').attr('disabled',this.checked);
        $('#pro_unit').attr('disabled',this.checked);
});


