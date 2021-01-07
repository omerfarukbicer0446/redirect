var second = document.getElementById("second");
var short = document.getElementById("short");

window.onload = function() {
  var sn = second.innerText;

  const interval = setInterval(function(){
    sn = sn -1;
    if (sn == 00 || sn == 0) {
      clearInterval(interval);
      $.ajax({
        type:'post',
        url:'ajax.php',
        data:'short=' + short.value,
        success: function(result) {
          if (result != '') {
            window.location.href = result;
          }else{
            alert('Url Bulunamadı');
          }
        }
      });
    }
    second.innerText = sn;
  }, 1000);
}
