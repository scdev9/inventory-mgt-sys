<x-app-layout>
    <!--Google icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <!--X-slot-->
    <x-slot name="header">

    </x-slot>
    <!--Back button-->

    <a href="{{url('/invoice')}}" class="btn btn-danger position-absolute  fw-bold" style="margin-left: 70rem; margin-top: 20px; border-radius:15px;"><span class="material-symbols-outlined">
            arrow_back
        </span>Back</a>

    <!--<product Create head-->
    <h2 class="position-absolute fw-bold" style="margin-left: 270px;margin-top: 20px;">Order Create</h2>
    <p class="position-absolute" style="margin-left: 270px;margin-top: 70px;">Order / Create</p>

    <!--Card--->
    <div class="col-md-6 ">


        <div class="card position-absolute start-30 top-30 border border-0" style="width: 67rem; margin-left:16rem;margin-top:6.5rem;border-radius:25px;">
            <!--Session Status Show---->
            <div class="card-body card-inner slimscroll">
                @if(session('status'))
                <div class="alert alert-success p-2">{{session('status')}}</div>
                @endif

                <!---Product Create Form------------------------------------>
                <form action="{{url('order/create')}}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="mb-3">
                        <label for="exampleInputEmail">Select Supplier</label>
                        <select class="form-select" name="productSupplier">
                            <option value="Select Supplier" selected disabled hidden>Select Supplier</option>
                            @foreach($suppliers as $supplier)
                            <option value="{{$supplier->SupplierName}}" class="dropdown-item">{{$supplier->SupplierName}}</option>
                            @endforeach
                        </select>
                        @error('productSupplier') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="mb-2">
                        <label for="productName" class="form-label">Order Description</label>
                        <textarea type="text" class="form-control" id="orderDesc" name="orderDesc"></textarea>
                        @error('productSkuID') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="mb-2">




                        <div class="input-group">
                            <span class="input-group-text">Product</span>
                            <select class="form-select" name="orderProduct" id="orderProduct">
                                <option id="ProductOption" value="Select Supplier" selected disabled hidden>Select Product</option>
                                @foreach($products as $product)

                                <option name="inputs[0][name]" value="{{$product->ProductName}}" class="dropdown-item">{{$product->ProductName}}</option>

                                @endforeach
                            </select>
                            @error('orderProduct') <span class="text-danger">{{$message}}</span> @enderror
                            <span class="input-group-text" style="border-left: 0; border-right: 0;">
                                Quantity
                            </span>
                            <input type="text" name="inputs[0][quantity]" id="quantity" class="form-control" placeholder="Enter Quantity" />
                            @error('quantity') <span class="text-danger">{{$message}}</span> @enderror
                            <select class="form-select" name="type" id="type">
                                <option value="" selected disabled hidden>Select Unit </option>
                                <option value="kg">kg</option>
                                <option value="l">l</option>
                                <option value="kg">kg</option>
                                <option value="kg">kg</option>
                                <option value="kg">kg</option>
                                <option value="kg">kg</option>
                                <option value="kg">kg</option>
                                <option value="kg">kg</option>
                                <option value="kg">kg</option>
                                <option value="kg">kg</option>

                            </select>
                            @error('type') <span class="text-danger">{{$message}}</span> @enderror


                            <button type="button" class="btn btn-success" name="add" id="add">Add</button>
                        </div>
                        <table class="table table-sm" id="table" name=table>

                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Action</th>

                        </table>


                    </div>




                    <button type="submit" class="btn btn-danger">Create</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var i = 0;
        var j = 0;
        $('#add').click(function() {

            var p = document.getElementById('orderProduct').value;
            var q = document.getElementById('quantity').value;
            var t = document.getElementById('type').value;

            ++i;

            $('#table').append(
                `<tr>
                <td>
                    <input name="inputs[` + i + `][name]" value="` + p + `"/>
                </td>
                <td>
                    <input name="inputs[` + i + `][quantity]" value="` + q + `"/>
                </td>
                <td>
                    <input name="inputs[` + i + `][unit]" value="` + t + `"/>
                </td>
                <td>
                   <button type="button" class="btn btn-danger remove-table-row">Remove</button>

                </td>

                </tr>`
            );

        });
    </script>



</x-app-layout>