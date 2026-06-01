function check()
{
     return number() &&  pass() && age();
}
  function age()
  {
    var age=document.form1.age.value; 
    if(age < 0 || age > 120)
    {
      alert("ENTER A VALID AGE");
      return false;
    }
    return true;
  }
function number()
{
    var num=document.form1.phno.value.length;
    if(num!=10)
    {
      alert("ENTER A VALID NUMBER");
        return false;
    }
        return true;
}
 function pass()
 {
  var pass=document.form1.passcode.value;
  var conpass=document.form1.conpass.value;
  if(pass!=conpass)
  {
    alert("BOTH PASSWORDS ARE NOT SAME");
    return false;
  }
  else if(pass.length < 8)
  {
    alert("MINIMUM 8 CHARACTER IS NEEDEDs");
    return false;
  }
  else
  {
    return true;
  }
 }
