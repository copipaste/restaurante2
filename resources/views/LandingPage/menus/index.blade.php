<x-guest-layout>
    <section class="mt-8 bg-white" >
        <div class="mt-4 text-center">
          {{-- <h3 class="text-2xl font-bold">Categorias</h3> --}}
          <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
            MENU</h2>
        </div>
        <div class="container w-full px-5 py-6 mx-auto">
          <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($Products as  $product)
            <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                
                {{-- <img class="w-full h-48" src= "{{Storage::url($product->imagen) }}" alt="Image" /> --}}
                <img class="w-full h-48" src="{{ url('/storage/' . $product->imagen) }}" alt="Image">
                {{-- <img class="w-full h-48" src= "{{asset($category->url)}}" alt="Image" /> --}}
                <div class="px-6 py-4">
                   
                        <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600   uppercase">{{$product->nombre}}</h4>
              
                    <p class="leading-normal text-gray-700">{{$product->descripcion}}</p>
                </div>
                <div class="flex items-center justify-between p-4">
                    @if (auth()->check())
                    <button onclick="showDialog({{$product->id}})" data-modal-target="#crud-modal{{$product->id}}" data-modal-toggle="crud-modal" class="block text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm px-4 py-2 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-blue-800" type="button">
                        Agregar al pedido
                    </button>  
                    @endif
                    <!-- Main modal --> 
                                            <div id="crud-modal{{$product->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full opacity-100">
                                                <div class="relative p-4 w-full max-w-md max-h-full">
                                                    <!-- Modal content -->
                                                    {{-- <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-500"> --}}
                                                    <div class="relative bg-gray-200 rounded-lg shadow">
                                                        <!-- Modal header -->
                                                        {{-- <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600"> --}}
                                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                            {{-- <h3 class="text-lg font-semibold text-gray-900 dark:text-white"> --}}
                                                            <h3 class="text-lg font-semibold text-gray-900">
                                                                Agregar al carrito
                                                            </h3>
                                                            <button type="button" class=" text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="hideDialog({{$product->id}})" data-modal-toggle="crud-modal">
                                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                        </div>
                                                        <!-- Modal body -->
                                                        <form action="{{ route('menu.update',$product) }}" id="product-form" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="grid gap-4 mb-4 grid-cols-2">
                                                                {{-- div de la descripcion --}}
                                                                <div class="col-span-2">
                                                                    {{-- <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peticion</label> --}}
                                                                    <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900">Peticion</label>
                                                                    {{-- <textarea id="descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escribir alguna solicitud" required></textarea>                     --}}
                                                                    <textarea id="descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Escribir alguna solicitud"></textarea>                    
                                                                </div>
                                                                {{-- <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione la cantidad:</label> --}}
                                                                 <label for="cantidad" class="block mb-2 text-sm font-medium text-gray-900">Seleccione la cantidad:</label>
                                                                <div class="relative flex items-center max-w-[12rem]">
                                                                    {{-- <button type="button" id="decrement-button{{$product->id}}" data-input-counter-decrement="{{$product->id}}" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none"> --}}
                                                                       <button type="button" id="decrement-button{{$product->id}}" data-input-counter-decrement="{{$product->id}}" class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                                                        {{-- <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2"> --}}     
                                                                        <svg class="w-3 h-3 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                                                        </svg>
                                                                    </button>
                                                                     {{--este es el input--}} <input type="text" id="cantidad{{$product->id}}" name ="cantidad" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5" placeholder="0" required>
                                                                    <button type="button" id="increment-button{{$product->id}}" data-input-counter-increment="{{$product->id}}" class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                                                                        <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                                                        </svg>
                                                                    </button>
                                                                </div>

                                                            </div>
                                                            {{-- <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> --}}
                                                            <button type="submit" class="text-white inline-flex items-center bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                                                Agregar
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                            {{-- este es el precio --}}
                    <span class="text-xl text-green-600">{{$product->precio}} Bs</span>

 
                </div>
                
                
            </div>
            @endforeach

 
  
          </div>
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
            
            

    document.addEventListener('DOMContentLoaded', function () {
    const decrementButtons = document.querySelectorAll('[data-input-counter-decrement]');
    const incrementButtons = document.querySelectorAll('[data-input-counter-increment]');

    decrementButtons.forEach(decrementButton => {
        decrementButton.addEventListener('click', function () {
            // Obtener el ID del producto al que está asociado este botón
            const productId = this.getAttribute('data-input-counter-decrement');
            const quantityInput = document.getElementById(`cantidad${productId}`);

            let value = parseInt(quantityInput.value);
            value = isNaN(value) ? 0 : value;
            if (value > 0) {
                quantityInput.value = value - 1;
            }
        });
    });

    incrementButtons.forEach(incrementButton => {
        incrementButton.addEventListener('click', function () {
            // Obtener el ID del producto al que está asociado este botón
            const productId = this.getAttribute('data-input-counter-increment');
            const quantityInput = document.getElementById(`cantidad${productId}`);

            let value = parseInt(quantityInput.value);
            value = isNaN(value) ? 0 : value;
            if (value < 99999) {
                quantityInput.value = value + 1;
            }
        });
    });

                // productForm.addEventListener('submit', function (event) {
                //     event.preventDefault(); // Evita que el formulario se envíe automáticamente

                //     // Obtener los datos del formulario
                //     const formData = new FormData(productForm);

                //     console.log(Object.fromEntries(formData))
                //     // Enviar los datos al controlador de Laravel mediante Axios
                //     axios.post('/menu/actualizar', Object.fromEntries(formData))
                //         .then(function (response) {
                //             console.log(response.data); // Manejar la respuesta si es necesario
                //         })
                //         .catch(function (error) {
                //             console.error(error); // Manejar errores si ocurren
                //         });
                // });

        });

                 
      </script>





      
</x-guest-layout>