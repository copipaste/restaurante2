<x-guest-layout>

 

    <section class="bg-white   py-8 lg:py-16 antialiased">
        <div class="max-w-2xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
              <h2 class="text-lg lg:text-2xl font-bold text-gray-900  ">Reseñas</h2>
          </div>
          {{-- formulario para comentar --}}
          <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
            @method('POST') 
            @csrf

              <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
                  <label for="comment" class="sr-only">Your comment</label>
                  <textarea id="comment" name="comment" rows="6"
                      class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none  "
                      placeholder="Escribe un comentario..." required></textarea>
              </div>

              {{-- boton de comentar --}}
              <button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                Comentar
              </button>

          </form>
          {{-- termina formulario para comentar --}}
          @if ($comments != null)
          @foreach ($comments as $comment)
          <article class="p-6 text-base bg-gray-100 rounded-lg  ">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 text-sm text-gray-900   font-semibold"><img
                            class="mr-2 w-6 h-6 rounded-full"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                            alt="Michael Gough">{{$comment->user->nombre}}</p>
                    <p class="text-sm text-gray-600 "><time pubdate datetime="2022-02-08"
                            title="February 8th, 2022">{{$comment->created_at->diffForHumans()}}</time></p>
                </div>
                @if (Auth::check())
                    
                
                @if ($comment->user_id == Auth::user()->id)
{{-- <button onclick="showDialog({{$comment->id}})" data-modal-target="#crud-modal{{$comment->id}}"  data-modal-toggle="popup-modal" type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Eliminar</button> --}}
                <button onclick="showDialog({{$comment->id}})" data-modal-target="#crud-modal{{$comment->id}}"  data-modal-toggle="popup-modal" type="button" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    Eliminar
                </button>
{{-- -----------------MODAL------------------------- --}}
                        <div id="crud-modal{{$comment->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-gray-100 rounded-lg shadow">
                                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" onclick="hideDialog({{$comment->id}})" data-modal-toggle="crud-modal">
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
                                            <h3 class="mb-5 text-lg font-normal text-black">Deseas eliminar este comentario</h3>
                                            <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                Si,Estoy seguro
                                            </button>
                                            <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 " onclick="hideDialog({{$comment->id}})" data-modal-toggle="crud-modal">No, cancelar</button>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
    

{{-- -----------------------MODAL------------------------------ --}}
            @endif
            @endif

            </footer>
            <p class="text-gray-500  ">{{$comment->body}}</p>
            <div class="flex items-center mt-4 space-x-4">
            </div>
        </article>    

          @endforeach
          {{ $comments->links() }}
          @endif
 
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