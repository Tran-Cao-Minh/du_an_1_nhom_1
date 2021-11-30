window.addEventListener('load', function () {
  // collapse get filter value form
  const identifyRadioInput = document.querySelector('#identify');
  const intervalRadioInput = document.querySelector('#interval');
  const identifyFilterValueForm = document.querySelector('.js-enter-identify-value-form');
  const intervalFilterValueForm = document.querySelector('.js-enter-interval-value-form');

  function openGetFilterValueForm() {
    if (identifyRadioInput.checked === true) {
      identifyFilterValueForm.style.maxHeight = '26rem';
      identifyFilterValueForm.style.paddingBottom = '2rem';
      intervalFilterValueForm.style.maxHeight = '0rem';
      intervalFilterValueForm.style.paddingBottom = '0rem';

    } else if (intervalRadioInput.checked === true) {
      identifyFilterValueForm.style.maxHeight = '0rem';
      identifyFilterValueForm.style.paddingBottom = '0rem';
      intervalFilterValueForm.style.maxHeight = '26rem';
      intervalFilterValueForm.style.paddingBottom = '2rem';
    }
  }

  const filterValueLabelArea = document.querySelector('.js-check-open-filter-value-form');
  filterValueLabelArea.addEventListener('click', openGetFilterValueForm);

  // change input type of input in get filter value form
  const filterColumnInput = document.querySelector('.js-select-filter-column-input');
  const filterValueInputList = document.querySelectorAll('.js-filter-value-input');

  function changeFilterValueInputType () {
    let inputType = filterColumnInput.options[filterColumnInput.selectedIndex].dataset.type;

    filterValueInputList.forEach(filterValueInput => {
      filterValueInput.type = inputType;
    });
  }

  filterColumnInput.addEventListener('change', changeFilterValueInputType);
})