
function evaluateForm() {
  var  var1 = document.getElementById('var1').value;
  var  var2 = document.getElementById('var2').value;
  const selector = document.getElementById('selector').value;

  var result;
  if(var1 =="true") var1 =true;
  if(var2 =="true") var2 =true;

  if(var1 =="false") var1 =false;
  if(var2 =="false") var2 =false;

  switch (selector) {
    case 'AND':
      result = var1 && var2;
      break;
    case 'OR':
      result = var1 || var2;
      break;
    case 'XOR':
      result = var1 ^ var2;
      break;
    case 'ADD':
      result = var1 + var2;
      break;
    case 'SUB':
      result = var1 - var2;
      break;
    default:
      result = 'Invalid operation';
  }
  document.getElementById('result').innerText = 'Result: ' + result;
  console.log('Result:', result);
  return false; // Prevent form submission
}
