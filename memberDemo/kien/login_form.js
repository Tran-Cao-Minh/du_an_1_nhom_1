
function Validator(options) {

  var formElement = document.querySelector(options.form);

 

  if (formElement) {

    options.rules.forEach(function (rule) {
      var inputElement = formElement.querySelector(rule.selector);

      if (inputElement) {
        inputElement.onblur = function () {
          console.log('blur ' + rule.selector);
        }
      }

    });
  }
}

// // định nghĩa có rules
Validator.isRequired = function(selector) {
  return {
    selector: selector,
    text: function () {

    }
  };
}

Validator.isPassword =  function(selector){
  return {
    selector: selector,
    text: function () {
      
    }
  };

}
