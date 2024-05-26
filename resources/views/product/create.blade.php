<x-app-layout>
<!--Google icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<!--X-slot-->
    <x-slot name="header" >
    
    </x-slot>
<!--Back button-->    

    <a href="{{url('/product')}}" class="btn btn-danger position-absolute  fw-bold" style="margin-left: 70rem; margin-top: 20px; border-radius:15px;"><span class="material-symbols-outlined">
            arrow_back
        </span>Back</a>

<!--<product Create head-->
    <h2 class="position-absolute fw-bold" style="margin-left: 270px;margin-top: 20px;">Product Create</h2>
    <p class="position-absolute" style="margin-left: 270px;margin-top: 70px;">Product / Create</p>

<!--Card--->
    <div class="col-md-6 ">
    

        <div class="card position-absolute start-30 top-30 border border-0" style="width: 67rem; margin-left:16rem;margin-top:6.5rem;border-radius:25px;">
     <!--Session Status Show---->      
            <div class="card-body">
            @if(session('status'))
            <div class="alert alert-success p-2">{{session('status')}}</div>
            @endif 
            
     <!---Product Create Form------------------------------------>
                <form action="{{url('product/create')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productName" >
                        @error('productName') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-2">
                        <label for="productName" class="form-label">Product SkuID</label>
                        <input type="text" class="form-control" id="productSkuID" name="productSkuID">
                        @error('productSkuID') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail">Product Category</label>
                        <select class="form-select" name="productCategory">
                        <option value="Select Category" selected disabled hidden>Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->CategoryName}}" class="dropdown-item">{{$category->CategoryName}}</option>
                            @endforeach
                        </select>
                        @error('productCategory') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail">Product Supplier</label>
                        <select class="form-select" name="productSupplier">
                            <option value="Select Supplier" selected disabled hidden>Select Supplier</option>
                            @foreach($suppliers as $supplier)
                            <option value="{{$supplier->SupplierName}}" class="dropdown-item">{{$supplier->SupplierName}}</option>
                            @endforeach
                        </select>
                        @error('productSupplier') <span class="text-danger">{{$message}}</span> @enderror
                    </div>




                    <button type="submit" class="btn btn-danger">Create</button>
                </form>
            </div>
        </div>
    </div>



</x-app-layout>