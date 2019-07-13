function date1(){
  var today = new Date().toISOString().split('T')[0];
  document.getElementsByName("date1")[0].setAttribute('min', today);
}
