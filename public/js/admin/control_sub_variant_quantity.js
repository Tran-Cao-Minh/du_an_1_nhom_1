window.addEventListener('load', function () {
  const subVariantContainer = document.querySelector('.js-sub-variant-container');
  const addSubVariantBtn = document.querySelector('.js-add-sub-variant-btn');

  addSubVariantBtn.addEventListener('click', function () {
    const subVariantRow = document.createElement('li');
    subVariantRow.classList.add('interaction-form__sub-variant-row');
    subVariantRow.innerHTML = `
      <div class="interaction-form__sub-variant-row-cell-1">
        <input type="number" class="interaction-form__sub-variant-size-input" 
        required 
        min="1" 
        max="99"
        name="product_variant_size_list[]"
      >
      </div>
      <div class="interaction-form__sub-variant-row-cell-2">
        <input type="number" class="interaction-form__sub-variant-quantity-input" 
        required 
        min="0"
        max="1000000000"
        name="product_variant_quantity_list[]"
      >
      </div>
      <div class="interaction-form__sub-variant-row-cell-3">
        <button type="button" class="interaction-form__sub-variant-delete-btn js-delete-sub-variant-btn">
          <i class="fas fa-times interaction-form__sub-variant-delete-icon"></i>
        </button>
      </div>
    `;

    subVariantContainer.appendChild(subVariantRow);

    let deleteSubVariantBtnList = document.querySelectorAll('.js-delete-sub-variant-btn');

    deleteSubVariantBtnList.forEach(deleteSubVariantBtn => {
      deleteSubVariantBtn.addEventListener('click', function () {
        let subVariantRow = this.parentElement.parentElement;

        subVariantContainer.removeChild(subVariantRow);
      })
    });
  })
})