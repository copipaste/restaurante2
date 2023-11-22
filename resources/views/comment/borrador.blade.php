<x-guest-layout>

 

    <section class="bg-white   py-8 lg:py-16 antialiased">
        <div class="max-w-2xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
              <h2 class="text-lg lg:text-2xl font-bold text-gray-900  ">Reseñas</h2>
          </div>
          {{-- formulario para comentar --}}
          <form class="mb-6">

              <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
                  <label for="comment" class="sr-only">Your comment</label>
                  <textarea id="comment" rows="6"
                      class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none  "
                      placeholder="Escribe un comentario..." required></textarea>
              </div>

              {{-- boton de comentar --}}
              <button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Comentar
              </button>

          </form>
          {{-- termina formulario para comentar --}}

          <article class="p-6 text-base bg-gray-100 rounded-lg  ">
              <footer class="flex justify-between items-center mb-2">
                  <div class="flex items-center">
                      <p class="inline-flex items-center mr-3 text-sm text-gray-900   font-semibold"><img
                              class="mr-2 w-6 h-6 rounded-full"
                              src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                              alt="Michael Gough">Michael Gough</p>
                      <p class="text-sm text-gray-600 "><time pubdate datetime="2022-02-08"
                              title="February 8th, 2022">Feb. 8, 2022</time></p>
                  </div>
                  <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                      class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500   bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 "
                      type="button">
                      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                          <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                      </svg>
                      <span class="sr-only">Comment settings</span>
                  </button>
                  <!-- Dropdown menu -->
                  <div id="dropdownComment1"
                      class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow  ">
                      <ul class="py-1 text-sm text-gray-700  "
                          aria-labelledby="dropdownMenuIconHorizontalButton">
                          <li>
                              <a href="#"
                                  class="block py-2 px-4 hover:bg-gray-100  ">Edit</a>
                          </li>
                          <li>
                              <a href="#"
                                  class="block py-2 px-4 hover:bg-gray-100  ">Remove</a>
                          </li>
                          <li>
                              <a href="#"
                                  class="block py-2 px-4 hover:bg-gray-100  ">Report</a>
                          </li>
                      </ul>
                  </div>
              </footer>
              <p class="text-gray-500  ">Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
                  instruments for the UX designers. The knowledge of the design tools are as important as the
                  creation of the design strategy.</p>
              <div class="flex items-center mt-4 space-x-4">
                  {{-- <button type="button"
                      class="flex items-center text-sm text-gray-500 hover:underline   font-medium">
                      <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z"/>
                      </svg>
                      Reply
                  </button> --}}
              </div>
          </article>
 
        </div>
      </section>

      <script>
            function showDialog(productId) {
            let dialog = document.getElementById(`crud-modal${productId}`);
            dialog.classList.remove("hidden");
            dialog.classList.add("flex");
            setTimeout(() => {
                dialog.classList.add("opacity-100"); 
            }, 20);
            }

            function hideDialog(productId) {
            let dialog = document.getElementById(`crud-modal${productId}`);
            // dialog.classList.add("opacity-0");
            // dialog.classList.remove("opacity-100");
            setTimeout(() => {
                dialog.classList.add("hidden");
                dialog.classList.remove("flex"); 
            }, 20);
            }

      </script>


</x-guest-layout>









------------------------------------------------------borrador--------------------------------


<div id="crud-modal{{$comment->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="hideDialog({{$comment->id}})" data-modal-toggle="crud-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Cerrar Modal</span>
            </button>
            <form action="{{ route('comments.destroy',$comment) }}" id="product-form" method="POST" enctype="multipart/form-data">
                @method('DELETE')
                @csrf
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Deseas eliminar este comentario</h3>
                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Si,Estoy seguro
                    </button>
                    <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" onclick="hideDialog({{$comment->id}})" data-modal-toggle="crud-modal">No, cancelar</button>
                </div>


            </form>

        </div>
    </div>
</div>










<button type="button" class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>Disabled button</button>






<button type="button" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
    Extra small
</button>