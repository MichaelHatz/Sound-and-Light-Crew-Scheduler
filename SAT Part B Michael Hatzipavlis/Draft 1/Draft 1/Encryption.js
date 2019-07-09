








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

  //Set the variables for the hashes
  var H0 = "01100111010001010010001100000001";
  var H1 = "11101111110011011010101110001001";
  var H2 = "10011000101110101101110011111110";
  var H3 = "00010000001100100101010001110110";
  var H4 = "11000011110100101110000111110000";

  //Turn the password into an array and then split it
  AsciiArray = PasswordString.split('');
  console.log(PasswordLength);
  console.log(AsciiArray);

  //Turn the array into binary
  for (var i = 0; i < PasswordLength; i++) {
    BinaryArray[i] = AsciiArray[i].charCodeAt(0).toString(2);
    console.log(BinaryArray[i].length);

    while (BinaryArray[i].length != 8) {
      BinaryArray[i] = "0".concat(BinaryArray[i]);
    }

    varString1 = varString1.concat(BinaryArray[i]);

  }

  //Forgot what these two lines do
  varString2 = varString1.concat("1");
  console.log(varString2.length);

  //Make sure that the binary at least 512 bit
  while (varString2.length % 512 != 448)  {
    varString2 = varString2.concat("0");
  }

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

  //Make array have a length of 80 by filling in with chunks
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

  function fullAdder(a, b, carry){
    halfAdd = halfAdder(a,b);
    const sum = xor(carry, halfAdd[0]);
    carry = and(carry, halfAdd[0]);
    carry = or(carry, halfAdd[1]);
    return [sum, carry];
  }

  function halfAdder(a, b){
    const sum = xor(a,b);
    const carry = and(a,b);
    return [sum, carry];
  }

  function xor(a, b){return (a === b ? 0 : 1);}
  function and(a, b){return a == 1 && b == 1 ? 1 : 0;}
  function or(a, b){return (a || b);}

  function addBinary(a, b){
    let sum = '';
    let carry = '';

    for(var i = a.length-1;i>=0; i--){
      if(i == a.length-1){
        //half add the first pair
        const halfAdd1 = halfAdder(a[i],b[i]);
        sum = halfAdd1[0]+sum;
        carry = halfAdd1[1];
      }else{
        //full add the rest
        const fullAdd = fullAdder(a[i],b[i],carry);
        sum = fullAdd[0]+sum;
        carry = fullAdd[1];
      }
    }

    return carry ? carry + sum : sum;
  }

  function truncateLength(number, length) {
    while (number.toString().length != length) {
      if (number.toString().length <= length) {
        number = "0".concat(number);
      } else if (number.toString().length >= length) {
        number = number.substring(0, number.length - 1);
      }
    }
    return number;
  }


  console.log(varChunks);

  var a = H0
  var b = H1
  var c = H2
  var d = H3
  var e = H4

  console.log(a);
  console.log(b);
  console.log(c);
  console.log(d);
  console.log(e);

  for (var i = 0; i <= 79; i++) {
    var f;
    var e;
    var k;
    var w;

    if (i <= 19 && i >= 0) {
      console.log("Variable i is equal to 0 - 19")
      var bChunkSplit = new Array();
      var cChunkSplit = new Array();
      var dChunkSplit = new Array();
      var ChunkTotal1 = new Array();
      var ChunkTotal2 = new Array();
      var ChunksSplitFinal = new Array();

      bChunkSplit = (""+b).split("");
      cChunkSplit = (""+c).split("");
      dChunkSplit = (""+d).split("");

      for (var k = 0; k <= 31; k++) {
        ChunkTotal1[k] = and(bChunkSplit[k], cChunkSplit[k]);
      }

      for (var l = 0; l <= 31; l++) {
        ChunkTotal2[l] = and((~bChunkSplit[l]), dChunkSplit[l])
      }

      for (var m = 0; m <= 31; m++) {
        ChunksSplitFinal[m] = or(ChunkTotal1[m], ChunkTotal2[m])
      }

      f = ChunksSplitFinal.join('');

      //Set the k variable and make sure that the variable is 32 bit long

      k = "5A827999";
      k = parseInt(k, 16).toString(2).padStart(8, '0');

      while (k.length != 32) {
        k = "0".concat(k);
      }
    }

    if (i >= 20 && i <= 39) {
      console.log("Variable i is equal to 20 - 39");
      var bChunkSplit = new Array();
      var cChunkSplit = new Array();
      var dChunkSplit = new Array();
      var ChunkTotal1 = new Array();
      var ChunksSplitFinal = new Array();

      bChunkSplit = (""+b).split("");
      cChunkSplit = (""+c).split("");
      dChunkSplit = (""+d).split("");

      for (var k = 0; k <= 31; k++) {
        ChunkTotal1[k] = xor(bChunkSplit[k],cChunkSplit[k]);
      }

      for (var k = 0; k <= 31; k++) {
        ChunksSplitFinal[k] = xor(ChunkTotal1[k], dChunkSplit[k]);
      }

      f = ChunksSplitFinal.join('');
      k = "6ED9EBA1";
      k = parseInt(k, 16).toString(2).padStart(8, '0');

      while (k.length != 32) {
        k = "0".concat(k);
      }
    }

    if (i >= 40 && i <= 59) {
      console.log("Variable i is equal to 40 - 59");
      var bChunkSplit = new Array();
      var cChunkSplit = new Array();
      var dChunkSplit = new Array();
      var ChunkTotal1 = new Array();
      var ChunkTotal2 = new Array();
      var ChunkTotal3 = new Array();
      var ChunksSplitFinal1 = new Array();
      var ChunksSplitFinal2 = new Array();

      bChunkSplit = (""+b).split("");
      cChunkSplit = (""+c).split("");
      dChunkSplit = (""+d).split("");

      for (var j = 0; j <= 31; j++) {
        ChunkTotal1[j] = and(bChunkSplit[j], cChunkSplit[j]);
      }

      for (var j = 0; j <= 31; j++) {
        ChunkTotal2[j] = and(bChunkSplit[j], dChunkSplit[j]);
      }

      for (var j = 0; j <= 31; j++) {
        ChunkTotal3[j] = and(cChunkSplit[j], dChunkSplit[j]);
      }

      for (var j = 0; j <= 31; j++) {
        ChunksSplitFinal1[j] = or(ChunkTotal1[j], ChunkTotal2[j]);
      }

      for (var j = 0; j <= 31; j++) {
        ChunksSplitFinal2[j] = or(ChunksSplitFinal1[j], ChunkTotal3[j]);
      }

      f = ChunksSplitFinal2.join('');
      k = "8F1BBCDC";
      k = parseInt(k, 16).toString(2).padStart(8, '0');

      while (k.length != 32) {
        k = "0".concat(k);
      }
    }

    if (i >= 60 && i <= 79) {
      console.log("Variable i is equal to 60 - 79");
      var bChunkSplit = new Array();
      var cChunkSplit = new Array();
      var dChunkSplit = new Array();
      var ChunkTotal1 = new Array();
      var ChunksSplitFinal1 = new Array();

      bChunkSplit = (""+b).split("");
      cChunkSplit = (""+c).split("");
      dChunkSplit = (""+d).split("");

      for (var j = 0; j <= 31; j++) {
        ChunkTotal1[j] = xor(bChunkSplit[j], cChunkSplit[j]);
      }

      for (var j = 0; j <= 31; j++) {
        ChunksSplitFinal1[j] = xor(ChunkTotal1[j], dChunkSplit[j]);
      }

      f = ChunksSplitFinal1.join('');
      k = "CA62C1D6";
      k = parseInt(k, 16).toString(2).padStart(8, '0');

      while (k.length != 32) {
        k = "0".concat(k);
      }
    }

    Rotate(a, 4);

    var temp = addBinary(a, f);
    temp = addBinary(temp, e);
    temp = addBinary(temp, k);
    temp = addBinary(temp, varChunks[i]);

    temp = truncateLength(temp, 32);

    e = d
    d = c

    Rotate(b, 29);

    function Rotate(b, number) {
      var tempArray = (''+b).split('');
      for (var i = 0; i <= number; i++) {
        tempArray.unshift(tempArray.pop());
        b = tempArray.join('');
      }
      return b;
    }

    c = b
    b = a
    a = temp
  }

  H0 = addBinary(H0, a);
  H1 = addBinary(H1, b);
  H2 = addBinary(H2, c);
  H3 = addBinary(H3, d);
  H4 = addBinary(H4, e)

  for (var i = 0; i <= 4; i++) {
    var temp;

    if (i == 0) {
      temp = H0;
    } else if (i == 1) {
      temp = H1;
    } else if (i == 2) {
      temp = H2;
    } else if (i == 3) {
      temp = H3;
    } else if (i == 4) {
      temp = H4;
    }

    temp = truncateLength(temp, 32);

    if (i == 0) {
      H0 = temp;
    } else if (i == 1) {
      H1 = temp;
    } else if (i == 2) {
      H2 = temp;
    } else if (i == 3) {
      H3 = temp;
    } else if (i == 4) {
      H4 = temp;
    }
  }

  console.log(H0);
  console.log(H1);
  console.log(H2);
  console.log(H3);
  console.log(H4);

  var hf = (H0 + H1 + H2 + H3 + H4);

  console.log(hf);

  //Convert
  console.log(typeof(hf));

  function binaryToHex(s) {
    var i, k, part, accum, ret = '';
    for (i = s.length-1; i >= 3; i -= 4) {
        // extract out in substrings of 4 and convert to hex
        part = s.substr(i+1-4, 4);
        accum = 0;
        for (k = 0; k < 4; k += 1) {
            if (part[k] !== '0' && part[k] !== '1') {
                // invalid character
                return { valid: false };
            }
            // compute the length 4 substring
            accum = accum * 2 + parseInt(part[k], 10);
        }
        if (accum >= 10) {
            // 'A' to 'F'
            ret = String.fromCharCode(accum - 10 + 'A'.charCodeAt(0)) + ret;
        } else {
            // '0' to '9'
            ret = String(accum) + ret;
        }
    }
    // remaining characters, i = 0, 1, or 2
    if (i >= 0) {
        accum = 0;
        // convert from front
        for (k = 0; k <= i; k += 1) {
            if (s[k] !== '0' && s[k] !== '1') {
                return { valid: false };
            }
            accum = accum * 2 + parseInt(s[k], 10);
        }
        // 3 bits, value cannot exceed 2^3 - 1 = 7, just convert
        ret = String(accum) + ret;
    }
    return ret;
  }

  var final = binaryToHex(hf);

  console.log(final);

  console.log("Finished");
}
