const app = {
    init: () => {
        console.log('app init');

        app.addEvents();
    },
    addEvents: () => {
       const addSpecificTemplateBtn = document.getElementById('addSpecificTemplate');

       if(!addSpecificTemplateBtn) {
           return;
       }

       addSpecificTemplateBtn.addEventListener('click', () => {
           app.addSpecificTemplateFields();
       });
    },
    addSpecificTemplateFields: () => {
        const specificTemplateList = document.getElementById('specificTemplateList');

        if(!specificTemplateList) {
            return;
        }
        
        const specificTemplateWrapper = document.createElement('div');
        specificTemplateWrapper.classList.add('specific-template');
        
        const specificTemplateWrapperRemoveBtn = document.createElement('button');
        specificTemplateWrapperRemoveBtn.className = 'button button-icon';
        specificTemplateWrapperRemoveBtn.innerHTML = '<i class="fa fa-minus"></i>';

        specificTemplateWrapperRemoveBtn.addEventListener('click', () => {
            specificTemplateWrapper.remove();
        })
    
        
        // Specific Template Name
        const specificTemplateName = document.createElement('label');
        specificTemplateName.className = 'specific-template-name';

        const specificTemplateInput = document.createElement('input');
        specificTemplateInput.type = 'text';
        specificTemplateInput.name = 'specific-template';

        const specificTemplateInputNamePrefix = document.createElement('span');
        specificTemplateInputNamePrefix.textContent = 'Nom';
        specificTemplateInputNamePrefix.className= 'specific-template-input-prefix';

        specificTemplateName.appendChild(specificTemplateInputNamePrefix);
        specificTemplateName.appendChild(specificTemplateInput);

        // Specific Template Time
        const specificTemplateTime = document.createElement('label');
        specificTemplateName.className = 'specific-template-time';

        const specificTemplateTimeInput = document.createElement('input');
        specificTemplateTimeInput.type = 'number';
        specificTemplateTimeInput.name = 'specific-template-time';
        
        const specificTemplateInputUnit = document.createElement('span');
        specificTemplateInputUnit.textContent = 'h';
        specificTemplateInputUnit.className= 'specific-template-input-unit';

        specificTemplateTime.append(specificTemplateTimeInput);
        specificTemplateTime.append(specificTemplateInputUnit);

        // Add everything to the wrapper
        specificTemplateWrapper.appendChild(specificTemplateName);
        specificTemplateWrapper.appendChild(specificTemplateTime);

        specificTemplateWrapper.appendChild(specificTemplateWrapperRemoveBtn);

        specificTemplateList.appendChild(specificTemplateWrapper);
    }
}

app.init();