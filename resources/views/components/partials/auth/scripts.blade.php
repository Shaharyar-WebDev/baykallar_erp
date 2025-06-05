<!-- Preline UI Script -->
<script src="./assets/vendor/preline/dist/preline.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js" integrity="sha512-bUg5gaqBVaXIJNuebamJ6uex//mjxPk8kljQTdM1SwkNrQD7pjS+PerntUSD+QRWPNJ0tq54/x4zRV8bLrLhZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

     document.addEventListener('DOMContentLoaded', () => {

          NProgress.start();
          NProgress.done();

          const forms = document.querySelectorAll("form");
          document.querySelectorAll('a').forEach(link => {
               link.onclick = () => {
                    NProgress.start();
               }
          });

          forms.forEach(form => {
               const formBtns = form.querySelectorAll('button[type="submit"], input[type="submit"]');
               form.addEventListener('submit', () => {

                    NProgress.start();

                    formBtns.forEach(btn => {
                         btn.disabled = true;
                         btn.innerHTML = ` <span class="animate-spin inline-block size-4 border-3 border-current border-t-transparent text-white rounded-full" role="status" aria-label="submitting"></span>
  Submitting...`;
                    });

               });
          });

     });
</script>
@livewireScripts