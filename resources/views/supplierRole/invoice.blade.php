<x-app-layout>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!--X-slot-->
    <x-slot name="header">



        <!--h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2-->
    </x-slot>


    <!--Bootstrap css----->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Google icon-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <!--Add product Button-->
    <!--a href="{{url('order/create')}}" class="btn btn-danger position-absolute  fw-bold" style="margin-left: 70rem; margin-top: 20px; border-radius:15px;"><span class="material-symbols-outlined">
            upload
        </span>Create Order</a-->


    <!--Product Head-->
    <h2 class="position-absolute fw-bold" style="margin-left: 270px;margin-top: 20px;">Invoice</h2>
    <p class="position-absolute" style="margin-left: 270px;margin-top: 70px;">Dashboard / Invoice</p>

    <!--Card-->
    <div class="col-md-6 ">
        <div class="card position-absolute start-30 top-30 border border-0" style="width: 67rem; margin-left:16rem;margin-top:6.5rem;border-radius:25px;">
            <div class="card-body">
                <!--Card title With logo-->
                <h5 class="card-title position-absolute"> <span class="material-symbols-outlined" style="margin-left: 20px;">
                        receipt_long
                    </span>Invoice</h5>
                <!--Search Bar-->

                <div class="input-group" style="margin-left: 40rem;width:25rem;">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" name="search" />
                    <button type='submit' class="btn btn-outline-primary" data-mdb-ripple-init>search</button>
                </div>

                <table class="table table-sm" style="margin-top:60px;">
                    <thead>
                        <tr>
                            <th scope="col">Purchase ID</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($supplierAccept as $accept)

                        <tr>
                            <th scope="row">{{$accept->PurchaseID}}</th>
                            <td>{{$accept->PurchaseDate}}</td>

                            <td>


                                <a href="{{url('order/'.$accept->PurchaseID.'/view')}}"><button class="btn btn-success w-9 h-8 "><!--span class="material-symbols-outlined">
                                        visibility
                                    </span--><img src="images/view.svg"></button></a>


                                <form method="POST" action="{{ url('invoice/'.$accept->PurchaseID.'/accept') }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="size" name="status" value="1" />
                                    <button type="submit" class="btn btn-primary w-9 h-8">Accept</button>
                                </form>


                                <a href="{{url('order/'.$accept->PurchaseID.'/delete')}}"><button class="btn btn-danger w-9 h-8"><!--span class="material-symbols-outlined">
                                        delete
                                    </span--><img src="images/delete.svg"></button></a>

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>



            </div>
        </div>
    </div>





</x-app-layout>