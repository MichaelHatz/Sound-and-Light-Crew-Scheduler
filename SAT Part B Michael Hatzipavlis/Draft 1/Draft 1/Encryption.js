function EncyrptionFun() {

  var PasswordString = document.getElementById('password').value;
  var PasswordLength = PasswordString.length;
  var AsciiArray = new Array();
  var BinaryArray = new Array();
  var varString1 = "";
  var varString2 = "";
  var varString1Length = "";
  var var512 = "";
  var var512Length;


  AsciiArray = PasswordString.split('');
  console.log(PasswordLength);
  console.log(AsciiArray);

  for (var i = 0; i < PasswordLength; i++) {
    BinaryArray[i] = AsciiArray[i].charCodeAt(0).toString(2);
    console.log(BinaryArray[i].length);

    while (BinaryArray[i].length != 8) {
      BinaryArray[i] = "0".concat(BinaryArray[i]);
    }

    varString1 = varString1.concat(BinaryArray[i]);

  }

  varString2 = varString1.concat("1");
  console.log(varString2.length);

  while (varString2.length % 512 != 448)  {
    varString2 = varString2.concat("0");
  }

  console.log(varString2.length);

  varString1Length = (varString1.length).charCodeAt(0).toString(2);

  while (varString1Length.length != 64) {
    varString1Length = "0".concat(varString1Length);
  }

  var512 = varString2.concat(varString1Length);
  var512Length = var512.length;

  var charStore = new Array();
  charStore = var512.split('');

  var varChunks = new Array();




}
