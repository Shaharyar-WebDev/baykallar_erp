<!-- Preline UI Script -->
<script src="../../assets/vendor/preline/dist/preline.js"></script>
<script src="{{asset('js/NProgress.js')}}"></script>
<script>

    const forms = document.querySelectorAll("form");

    const submitBtnFunc = () => {

        forms.forEach(form => {
            const formBtns = form.querySelectorAll('button[type="submit"], input[type="submit"]');
            form.addEventListener('submit', () => {

                    NProgress.start();

                    formBtns.forEach(btn => {
                         btn.disabled = true;
                         btn.innerHTML = `<span class="animate-spin inline-block size-4 border-3 border-current border-t-transparent text-white rounded-full" role="status" aria-label="submitting"></span>
  Submitting...`;
                    });

               });
          });
          
        }

        submitBtnFunc();
        
     document.addEventListener('DOMContentLoaded', () => {

          NProgress.start();
          NProgress.done();

          document.querySelectorAll('a').forEach(link => {
               link.onclick = () => {
                    NProgress.start();
               }
          });


     });
</script>
@livewireScripts