window.addEventListener('load', function () {
  // create order label
  const inputCreateOrderLabelList = document.querySelectorAll('.js-order-input');
  const orderLabelContent = document.querySelector('.js-order-label-content');

  inputCreateOrderLabelList.forEach(input => {
    input.addEventListener('change', function () {
      orderLabelContent.innerHTML = this.value;
    })
  });
  // end create order label

  // create price range label 
  const inputCreatePriceRangeLabelList = document.querySelectorAll('.js-price-range-input');
  const priceRangeLabel = document.querySelector('.js-price-range-label');
  const priceRangeLabelContent = document.querySelector('.js-price-range-label-content');

  inputCreatePriceRangeLabelList.forEach(input => {
    input.addEventListener('change', function () {
      priceRangeLabelContent.innerHTML = this.value;
      priceRangeLabel.style.display = 'flex';
    })
  });

  priceRangeLabel.addEventListener('click', function () {
    inputCreatePriceRangeLabelList.forEach(input => {
      input.checked = false;
    })
    priceRangeLabel.style.display = 'none';
  })
  // end create price range label

  // create data filter label
  const inputCreateFilterLabelList = document.querySelectorAll('.js-filter-label-input');
  const filterLabelContainer = document.querySelector('.js-product-filter-label-container');

  inputCreateFilterLabelList.forEach(input => {
    input.addEventListener('change', function () {
      if (this.checked == true) {
        const label = document.createElement('li');
        label.classList.add('product__breadcrumb__item');
        label.classList.add('js-filter-label');
        label.setAttribute('data-id', this.id)
        label.innerHTML = `
          <label for="${this.id}" class="product__breadcrumb__item-label">
            <span class="js-price-range-label-content">
              ${this.value}
            </span>
            <div class="product__breadcrumb__item--icon-close">
              <i class="fas fa-times"></i>
            </div>
          </label>
        `;
        label.addEventListener('click', function () {
          setTimeout(function () {
            filterLabelContainer.removeChild(label);
          }, 100);
        })

        filterLabelContainer.appendChild(label);

      } else if (this.checked == false) {
        let filterLabelList = document.querySelectorAll('.js-filter-label');
        let inputId = this.id;

        filterLabelList.forEach(label => {
          if (label.dataset.id == inputId) {
            filterLabelContainer.removeChild(label);
          }
        });
      }
    })
  });
  // end create data filter label

  // delete all label and uncheck input
  const deleteFilterBtnList = document.querySelectorAll('.js-delete-filter-btn');
  deleteFilterBtnList.forEach(btn => {
    btn.addEventListener('click', function () {
      inputCreateOrderLabelList[0].click();
      filterLabelContainer.innerHTML = '';
      priceRangeLabel.click();
      inputCreateFilterLabelList.forEach(input => {
        input.checked = false;
      });
    })
  });
  // end delete all label and uncheck input
})