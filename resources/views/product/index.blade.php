<x-app-layout>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!--Bootstrap css----->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Google icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />



    <x-slot name="header">
        <!--h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2-->
    </x-slot>
     <button type="button " class="btn btn-danger position-absolute w-250 h-15 fw-bold" style="margin-left: 70rem; margin-top: 20px; border-radius:15px;"><span class="material-symbols-outlined">
            upload
        </span>Add Product</button>
      <h2 class="position-absolute fw-bold" style="margin-left: 270px;margin-top: 20px;">Product</h2>
      <p class="position-absolute" style="margin-left: 270px;margin-top: 70px;">Dashboard / Product</p>


      <div class="col-md-6 position-relative">
        <div class="card position-absolute start-30 top-30 border border-0" style="width: 67rem; margin-left:16rem;margin-top:6.5rem;border-radius:25px;">
            <div class="card-body">


                <input class="form-control position-absolute " style="width: 25rem; margin-left:40rem; margin-top:2px;background-image: url('/public/images/search1.svg');" type="search" placeholder="Search Anything here!" aria-label="default input example">

                <h5 class="card-title"><span class="material-symbols-outlined">
                        deployed_code
                    </span>Product</h5>




                <table class="table table-sm" style="margin-top:60px;">
                    <thead>
                        <tr>
                            <th scope="col">Product ID</th>
                            <th scope="col">Sku ID</th>
                            <th scope="col">Product</th>
                            <th scope="col">Category</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->ProductID}}</th>
                            <td>{{$product->SkuID}}</td>
                            <td><img src="/images/dhal1.png" class="rounded-circle" style="width: 30px; height:30px; float:left;">
                                {{$product->ProductName}}
                            </td>
                            <td>{{$product->CategoryName}}</td>
                            <td>
                                <button type="button" class="btn btn-success w-8 h-8"><span class="material-symbols-outlined">
                                        visibility
                                    </span></button>
                                <button type="button" class="btn btn-primary w-8 h-8"><span class="material-symbols-outlined">
                                        edit
                                    </span></button>
                                <button type="button" class="btn btn-danger w-8 h-8"><span class="material-symbols-outlined">
                                        delete
                                    </span></button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                {{$products->onEachSide(1)->links()}}

                <!--nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav-->

            </div>
        </div>


      </div>
  
      


</x-app-layout>