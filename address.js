$(document).ready(function () {
    var $distpicker = $('#distpicker');
    $.ajax({
        url: "address.php",
        success: function (res) {
            $distpicker.distpicker({
                province: res.data.address.province,
                city: res.data.address.city,
                district: res.data.address.district
            });
        }
    });
$('#address_btn').click(function () {

        if ($('#adddetail').val() == "") {
            alert('地址不能为空！');
        }else {
             $('#reFrom').submit();
    }
    });
   $('#a_adress')[0].style.color="red";








});
