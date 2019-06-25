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


  var H0 = "0x67452301";
  var H1 = "0xEFCDAB89";
  var H2 = "0x98BADCFE";
  var H3 = "0x10325476";
  var H4 = "0xC3D2E1F0";

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

  varString1Length = (varString1.length).toString(2);

  while (varString1Length.length != 64) {
    varString1Length = "0".concat(varString1Length);
  }

  var512 = varString2.concat(varString1Length);
  var512Length = var512.length;

  var charStore = new Array();
  charStore = var512.split('');

  console.log(var512);

  var varChunks = new Array();

  varChunks = var512.match(/.{31}./g);

  for (var i = 16; i <= 79; i++) {
    var ChunksSplit1 = new Array();
    var ChunksSplit2 = new Array();
    var ChunksSplit3 = new Array();
    var ChunksSplit4 = new Array();
    var ChunksSplit5 = new Array();
    var ChunksSplit6 = new Array();
    var ChunksSplitFinal = new Array();

    ChunksSplit1 = varChunks[i-3].split('');
    ChunksSplit2 = varChunks[i-8].split('');
    ChunksSplit4 = varChunks[i-14].split('');
    ChunksSplit5 = varChunks[i-16].split('');



    console.log("Spliting into 80 chunks")

    for (var a = 0; a <= 31; a++) {
      ChunksSplit3[a] = ChunksSplit1[a] ^ ChunksSplit2[a]
    }

    for (var b = 0; b <= 31; b++) {
      ChunksSplit6[b] = ChunksSplit4[b] ^ ChunksSplit5[b]
    }

    for (var c = 0; c <= 31; c++) {
      ChunksSplitFinal[c] = (ChunksSplit3[c] ^ ChunksSplit6[c])
    }
    varChunks[i] = ChunksSplitFinal.join('');
    
  }

  console.log(varChunks);

  var a = H0
  var b = H1
  var c = H2
  var d = H3
  var e = H4

  for (var i = 0; i <= 35; i++) {
    var f;
    var e;
    var k;
    var w;

    console.log("Main Loop")
    console.log(i);
    if (0 <= i <= 19) {
      var bChunkSplit = new Array();
      var cChunkSplit = new Array();
      var dChunkSplit = new Array();
      var ChunkTotal1 = new Array();
      var ChunkTotal2 = new Array();
      var ChunksSplitFinal = new Array();

      bChunkSplit = b.split('');
      cChunkSplit = c.split('');
      dChunkSplit = d.split('');

      for (var k = 0; k <= 31; k++) {
        ChunkTotal1[k] = bChunkSplit[k] & cChunkSplit[k]
      }

      for (var l = 0; l <= 31; l++) {
        ChunkTotal2[l] = ((~bChunkSplit[l]) & dChunkSplit[l])
      }

      for (var m = 0; m <= 31; m++) {
        ChunksSplitFinal[m] = ChunkTotal1[m] | ChunkTotal2[m]
      }

      f = ChunksSplitFinal.join('');
      k = "0x5A827999";
    }

    if (20 <= i <= 39) {
      var bChunkSplit = new Array();
      var cChunkSplit = new Array();
      var dChunkSplit = new Array();
      var ChunkTotal1 = new Array();
      var ChunksSplitFinal = new Array();

      bChunkSplit = b.split('');
      cChunkSplit = c.split('');
      dChunkSplit = d.split('');

      for (var k = 0; k <= 31; k++) {
        ChunkTotal1[k] = bChunkSplit[k] ^ cChunkSplit[k];
      }

      for (var k = 0; k <= 31; k++) {
        ChunksSplitFinal[k] = ChunkTotal1[k] ^ dChunkSplit[k]
      }

      f = ChunksSplitFinal.join('');
      k = "0x6ED9EBA1";
    }


    var tempAArray = a.split('');
    for (var n = 0; n <= 4; n++) {
      tempAArray.unshift(tempAArray.pop());
      tempAArray.join('');
    }

    // var temp = (a) + f + e + k + varChunks[i]
    var temp = (a);
    e = d
    d = c
    var tempBArray = b.split('');
    for (var j = 0; j <= 29; j++) {
      tempBArray.unshift(tempBArray.pop());
      tempBArray.join('');
    }
    c = b
    b = a
    a = temp
    
  }

  H0 = H0 + a
  H1 = H1 + b 
  H2 = H2 + c
  H3 = H3 + d
  H4 = H4 + e

  console.log(H0.toString(16));

console.log("Finished");



  /*
    //Bitwise AND gate
    console.log(a & b);

    //Bitwise OR
    console.log(a | b);

    //Bitwise XOR
    console.log(a ^ b);

    //Bitwise NOT
    console.log(~ a);

    //Bitwise Left Shift
    console.log(a << b);

    //Bitwise Sign propagating right shift
    console.log(a >> b);

    //Bitwise Zero-fill right shift
    console.log(a >>> b);

  */

}
