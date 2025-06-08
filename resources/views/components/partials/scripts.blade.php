<!-- Preline UI Script -->
<script src="{{asset('js/NProgress.js')}}"></script>
<x-partials.scripts.submit-script/>
<script>

      const editToggler = (form, editBtn, submitBtn, editKey = null, submitKey = null) => {
            
            let profileIsEditing = false;
            let inputs = form.querySelectorAll('input'); 

            inputs.forEach(input => {
                input.disabled = true;
            });

            submitBtn.hidden = true;
            submitBtn.disabled = true;


              editBtn.addEventListener('click', (e) => {

            if (!profileIsEditing) {

                inputs.forEach(input => {

                    input.disabled = false;

                });

                if(editKey){
                    editBtn.textContent = editKey
                }else{
                    editBtn.textContent = '{{__('actions.cancel')}}';
                }
                submitBtn.hidden = false;
                submitBtn.disabled = false;
                profileIsEditing = true;
            } else {

                inputs.forEach(input => {

                    input.disabled = true;

                });

                if(submitKey){
                     editBtn.textContent = submitKey;
                }else{
                    editBtn.textContent = '{{__('actions.edit')}}';
                }
                submitBtn.hidden = true;
                submitBtn.disabled = true;
                profileIsEditing = false;


            }
        });
            
        }

 const openDeleteModal = (formId, route) => {
                let deleteModalForm = document.getElementById(`${formId}-form`);
                deleteModalForm.setAttribute('action', route);
            }
            
</script>
<!-- Required plugins -->
@livewireScripts