/*
 --------------------------------------
 ---------- Input Group File ----------
 --------------------------------------
 */

$.fn.inputFile = function () {
    var $this = $(this);
    $this.find('input[type="file"]').on('change', function (event) {
        $this.find('input[type="text"]').val($(this).val());
    });
}

$('.input-group-file-1').inputFile();
$('.input-group-file-2').inputFile();
$('.input-group-file-3').inputFile();


$.fn.inputFile1 = function () {
    var $this = $(this);
    $this.find('input[type="file"]').on('change', function (event) {
        var target = event.target || event.srcElement;
        $this.find('input[type="text"]').val($(this).val());     
    });
}

$('.input-group-file1').inputFile1();

if ($.fn.datetimepicker) {

    $('.datePicker').datetimepicker({
        keepOpen: true,
        format: 'YYYY-MM-DD'
    });

    $('.timePicker').datetimepicker({
        keepOpen: true,
        format: 'LT'
    });

    $('.dateTimePicker').datetimepicker({
        keepOpen: true
    });
}

function splitMulti(str, tokens){
  var tempChar = tokens[0]; // We can use the first token as a temporary join character
  for(var i = 1; i < tokens.length; i++){
    str = str.split(tokens[i]).join(tempChar);
  }
  str = str.split(tempChar);
  return str;
}