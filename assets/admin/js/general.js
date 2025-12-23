$(document).ready(function () {
    $(document).on('click','.are_u_sure',function () {
        var res = confirm('هل أنت متأكد من الحذف');
        if (!res) {
            return false
        }
    });
});
