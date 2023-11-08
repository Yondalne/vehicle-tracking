@extends('layouts.app')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-4">
                <div class="d-flex justify-content-center">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Attribution</h5>
                            </div>
                            <form action="{{ route('attribution.store') }}" method="post" class="row g-3 needs-validation"
                                novalidate>
                                @csrf
                                
                                <select class="form-select" aria-label="Default select example" name="vehicle_id">
                                <option selected>Selectionnez un vehicle</option>
                                    @foreach ($vehicles as $vehicle)
                                        @if (!$vehicle->is_attributed)
                                        <option value="{{$vehicle->id}}">{{$vehicle->serial}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select class="form-select" aria-label="Default select example" name="driver_id">
                                <option selected>Selectionnez un Driver</option>
                                    @foreach ($drivers as $driver)
                                        @if (!$driver->is_associated)
                                        <option value="{{$driver->id}}">{{$driver->first_name." ". $driver->second_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Soumettre le formulaire</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">





                    <!-- Recent Sales -->
                    <div class="col-lg-12">
                        <div class="card recent-sales overflow-auto">

                            

                            <div class="card-body">
                                <h5 class="card-title">Datatables</h5>

                                <!-- Table with stripped rows -->
                                <table class="table">

                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nom du chauffeur</th>
                                            <th scope="col">Immatriculation</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach($drives as $drive)
                                       <tr>
                                       <td>{{$drive->id}}</td>
                                       <td>{{$drive->driver->first_name." ". $drive->driver->second_name}}</td>
                                       <td>{{$drive->vehicle->serial}}</td>
                                       
                                       </tr>
                                       @endforeach
                                       
                                    </tbody>
                                </table>

                                <!-- End Table with stripped rows -->

                            </div>
                        </div>
                    </div>


                </div>

            </div>
    </section>

</main>
@endsection