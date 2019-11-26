$(function () {
    var name =false;
	var sex =false
    var password = false;
	var cpassword = false;
	var tel = false;
	/*var error_check = false;*/

	$('#txt_username').blur(function() {  /*失去焦点执行*/
		check_user_name();
	});
	
	$('#txt_sex').blur(function() {  /*失去焦点执行*/
		check_user_sex();
	});
	
	$('#txt_password').blur(function() {
		check_password();
	});

	$('#txt_check_password').blur(function() {
		 check_cpassword();
	});
	$('#txt_tel').blur(function() {
		check_tel();
	});

    function check_user_name() {
        var re = /^[\u4e00-\u9fa5]{2,6}$/;

		if(re.test($('#txt_username').val()))      
		{
			$('#txt_username').next().hide();
			name = false;
		}
		else
		{
			$('#txt_username').next().html('请输入2~6位中文');
			$('#txt_username').next().show();
			name = true;
		}
    }
    
	function check_user_sex(){
		var re = /^['男'|'女']$/;

		if(re.test($('#txt_sex').val()))      
		{
			$('#txt_sex').next().hide();
			sex = false;
		}
		else
		{
			$('#txt_sex').next().html('性别只能为男或女');
			$('#txt_sex').next().show();
			sex = true;
		}
	}
	
    function check_password() {
        var len = $('#txt_password').val().length;
        if(len!=6)
		{
			$('#txt_password').next().html('密码必须为6位');
			$('#txt_password').next().show();
			password = true;
		}
		else
		{
			$('#txt_password').next().hide();
			password = false;
		}
    }
    function check_cpassword(){
		var pass = $('#txt_password').val();
		var cpass = $('#txt_check_password').val();

		if(pass!=cpass)
		{
			$('#txt_check_password').next().html('两次输入的密码不一致');
			$('#txt_check_password').next().show();
			 cpassword = true;
		}
		else
		{
			$('#txt_check_password').next().hide();
			 cpassword = false;
		}
    }
    function check_tel(){
		var re = /^1[34578]\d{9}$/;

		if(re.test($('#txt_tel').val()))      
		{
			$('#txt_tel').next().hide();
			tel = false;
		}
		else
		{
			$('#txt_tel').next().html('你输入的手机号格式不正确');
			$('#txt_tel').next().show();
			tel = true;
		}
	}
      $('#J_submitRegister').click(function () {
            check_user_name();
		  	check_user_sex();
            check_password();
            check_cpassword();
            check_tel();

          if(name == false && sex==false && password == false && cpassword == false && tel == false)
          {
             $('#reFrom').submit();
              console.log('提交成功');
              return true;
          }
          else
          {
             console.log('输入有误');
             return false;
          }
      })


});