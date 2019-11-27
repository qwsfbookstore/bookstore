$(function () {
    var bookid =false;
    var authorid =false
    var bookscore = false;
    /*var error_check = false;*/

    $('#bookid').blur(function() {  /*失去焦点执行*/
        check_book_id();
    });

    $('#authorid').blur(function() {  /*失去焦点执行*/
        check_author_id();
    });

    $('#bookscore').blur(function() {
        check_bookscore();
    });

    function check_book_id() {
        var re = /^{6}$/;

        if(re.test($('#bookid').val()))
        {
            $('#bookid').next().hide();
            bookid = false;
        }
        else
        {
            $('#bookid').next().html('书目id只能是6位数字');
            $('#bookid').next().show();
            bookid = true;
        }
    }

    function check_author_id(){
        var re = /^{6}$/;

        if(re.test($('#authorid').val()))
        {
            $('#authorid').next().hide();
            authorid = false;
        }
        else
        {
            $('#authorid').next().html('作者id只能是6位数字');
            $('#authorid').next().show();
            authorid = true;
        }
    }

    function check_bookscore() {
        if($('#bookscore').val()>10){
            $('#bookscore').next().html('书目评分只能在0到10分之间');
            $('#bookscore').next().show();
            bookscore = true;
        }else if($('#bookscore').val()<0){
            $('#bookscore').next().html('书目评分只能在0到10分之间');
            $('#bookscore').next().show();
            bookscore = true;
        }else{
            $('#bookscore').next().hide();
            bookscore = false;
        }
    }


    $('#addbook_button').click(function () {
        check_book_id();
        check_author_id();
        check_bookscore();


        if(bookid == false && authorid==false && bookscore == false)
        {
            $('#addproduct_form').submit();
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