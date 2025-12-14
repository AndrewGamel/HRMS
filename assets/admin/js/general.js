$(document).ready(function () {
$(document).on('are_u_sure').click(function{
 var res = confirm('هل أنت متأكد من الحذف');
 if (!res) {
return false
 }
});
});
