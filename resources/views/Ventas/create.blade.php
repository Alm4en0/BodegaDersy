<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="ventas"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100 mt-3">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Agregar Venta'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="px-2 px-md-2 d-flex">
            <div class="card card-body mx-3 mx-md-2 mt-n0 col-7">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">TOTAL VENTA:</h6>
                            </div>
                            <table id="selectedProductsTable" class="table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Sub Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <div id="subtotal" style="color: #ffffff; font-weight: bold;"></div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (session('status'))
                            <div class="row">
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('status') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        @if (Session::has('demo'))
                            <div class="row">
                                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('demo') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="card card-body mx-1 mx-md-4 mt-n0 col-4">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-3">Categorias:</h6>
                            </div>
                            <select id="categorySelect" class="form-select ml-2 border p-2"
                                aria-label="Default select example">
                                <option class="pl-2" value=""> Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <form method='POST' action='{{ route('ventas.store') }}' enctype="multipart/form-data">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mt-3">Seleccione los Productos:</h6>
                                </div>
                                <select id="productSelect" class="form-select ml-2 border p-2"
                                    aria-label="Default select example">
                                    <option class="pl-2" value=""> Select</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        @if (Session::has('demo'))
                            <div class="row">
                                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('demo') }}</span>
                                    <button type="button" class="btn-close text-lg py-3 opacity-10"
                                        data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            </form>
        </div>
        <div class="card card-body mx-1 mx-md-4 mt-n0 col-10 mt-3" style="background: #f59116">
            <div class="card card-plain h-100">
                <div class=" d-flex card-header pb-0 p-3 justify-content-evenly" style="background: #f59116">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-3" style="color: #ffffff">TOTAL VENTA:</h6>
                        </div>
                        <div class="col-md-12">
                            <h4>
                                <div id="totalVenta" style="color: #ffffff; font-weight: bold;"></div>
                            </h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 class="mb-3" style="color: #ffffff">Tipo de Pago:</h6>
                        </div>
                        <div class="col-md-12">
                            <select class="form-select ml-2 border p-2" aria-label="Default select example"
                                style="width: 10rem">
                                <option class="pl-2" value=""> Select</option>
                                <option value=""> Efectivo</option>
                                <option value=""> Yape</option>
                                <option value=""> no pago</option>
                            </select>
                        </div>
                        <div class="col-md-4 ">
                            <!-- Botones de Guardar y Cancelar -->
                            <button type="submit"
                                class="btn bg-gradient-dark btn-hover-dark mt-3 me-2">Guardar</button>
                            <a href="{{ route('ventas.index') }}" class="btn btn-danger mt-3">Cancelar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    @if (Session::has('demo'))
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('demo') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


{{-- JAVASCRIPT --}}

<script>
    document.getElementById('categorySelect').addEventListener('change', function() {
        var category_id = this.value;
        var productSelect = document.getElementById('productSelect');

        // Limpiar las opciones anteriores del select de productos
        productSelect.innerHTML = '<option value="">Select</option>';

        if (category_id !== '') {
            // Hacer la solicitud AJAX para obtener los productos por categoría
            $.ajax({
                url: '/get-products-by-category/' + category_id,
                type: 'GET',
                success: function(response) {
                    // Llenar el select de productos con las opciones correspondientes
                    response.forEach(function(product) {
                        var option = document.createElement('option');
                        option.value = product.id;
                        option.dataset.price = product.s_price;
                        option.textContent = product.name;
                        productSelect.appendChild(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });

    document.getElementById('productSelect').addEventListener('change', function() {
        var selectedProduct = this.options[this.selectedIndex].text;
        var selectedProductId = this.value;
        var selectedProductPrice = parseFloat(this.options[this.selectedIndex].dataset.price);

        var selectedProductsTableBody = document.querySelector('#selectedProductsTable tbody');

        if (selectedProductId !== '') {
            var existingProduct = selectedProductsTableBody.querySelector(
                `[data-product-id="${selectedProductId}"]`);
            if (existingProduct) {
                var existingQuantityInput = existingProduct.querySelector('.quantity-input-table');
                var newQuantity = parseInt(existingQuantityInput.value) + 1;
                existingQuantityInput.value = newQuantity;

                var priceCell = existingProduct.querySelector('.price-input-table');
                var subtotalCell = existingProduct.querySelector('.subtotal-input-table');

                var subtotal = newQuantity * selectedProductPrice;
                subtotalCell.textContent = subtotal.toFixed(2);
            } else {
                var row = selectedProductsTableBody.insertRow();
                row.dataset.productId = selectedProductId;

                var cellNumber = row.insertCell(0);
                var cellProduct = row.insertCell(1);
                var cellQuantity = row.insertCell(2);
                var cellPrice = row.insertCell(3);
                var cellSubtotal = row.insertCell(4);

                cellNumber.innerHTML = selectedProductsTableBody.rows.length;
                cellProduct.innerHTML = selectedProduct;
                cellQuantity.innerHTML =
                    `<input class="quantity-input-table" type="number" value="1" min="1">`;
                cellPrice.innerHTML = selectedProductPrice.toFixed(2);
                cellSubtotal.innerHTML = selectedProductPrice.toFixed(2);

                // Agregar botón para aumentar la cantidad
                var increaseButton = document.createElement('button');
                increaseButton.textContent = '+';
                increaseButton.classList.add('increase-quantity-button');

                cellQuantity.appendChild(increaseButton);

                // Función para incrementar la cantidad
                increaseButton.addEventListener('click', function() {
                    var quantityInput = this.parentElement.querySelector('.quantity-input-table');
                    var currentQuantity = parseInt(quantityInput.value);
                    quantityInput.value = currentQuantity + 1;

                    var newSubtotal = parseFloat(cellPrice.textContent) * parseInt(quantityInput.value);
                    cellSubtotal.textContent = newSubtotal.toFixed(2);

                    // Actualizar subtotal en el carrito
                    updateSubtotal();
                });

                // Manejar evento de cambio en la cantidad
                cellQuantity.querySelector('.quantity-input-table').addEventListener('input', function(event) {
                    var newQuantity = parseInt(event.target.value);
                    if (isNaN(newQuantity) || newQuantity <= 0) {
                        newQuantity = 1;
                        event.target.value = 1;
                    }
                    var newSubtotal = selectedProductPrice * newQuantity;
                    cellSubtotal.textContent = newSubtotal.toFixed(2);

                    // Actualizar subtotal en el carrito
                    updateSubtotal();
                });
            }

            // Celda para el botón de eliminar producto
            var deleteCell = row.insertCell(5);
            var deleteButton = document.createElement('button');
            deleteButton.textContent = '';
            deleteButton.classList.add('delete-button');

            deleteButton.addEventListener('click', function() {
                var row = this.parentElement.parentElement;
                row.parentElement.removeChild(row);

                // Actualizar subtotal en el carrito
                updateSubtotal();
            });

            deleteButton.textContent = '';
            deleteButton.classList.add('delete-button');
            deleteButton.style.color = 'white';
            deleteButton.style.backgroundColor = 'red'; // Cambiar el color del texto a rojo

            // Crear un ícono de "X" usando un elemento span con algún ícono (puede ser un ícono de librería de íconos como Font Awesome, por ejemplo)
            var icon = document.createElement('span');
            icon.classList.add('material-icons'); // Clase para usar íconos de Material Design Icons
            icon.textContent = 'clear'; // Ícono de "X" de Material Design Icons
            icon.style.color = 'white';

            deleteButton.appendChild(icon);

            deleteCell.appendChild(deleteButton);

            // Función para actualizar subtotal en el carrito
            function updateSubtotal() {
                var subtotal = 0;
                var rows = selectedProductsTableBody.rows;

                for (var i = 0; i < rows.length; i++) {
                    var price = parseFloat(rows[i].cells[3].textContent);
                    var quantity = parseInt(rows[i].cells[2].querySelector('.quantity-input-table').value);
                    subtotal += price * quantity;
                }

                document.getElementById('subtotal').textContent = subtotal.toFixed(2);
                document.getElementById('totalVenta').textContent = 'Total: ' + subtotal.toFixed(2);
            }
            updateSubtotal();
        }
    });
</script>






{{-- CSS --}}

<style>
    .selected-products {
        padding-left: 15px;
        border-radius: 10px;
        background-color: #f7f7f7;
        margin-top: 10px;
    }

    .selected-products li {
        list-style: none;
        padding: 8px 0;
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
    }

    .selected-products li:last-child {
        border-bottom: none;
    }

    .quantity-input {
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 5px;
    }
</style>
