@extends('layouts.app')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('driver.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Fuel</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Right side columns -->
                <div class="col-lg-4">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Fuel Details</h5>

                            <!-- Browser Default Validation -->
                            <form class="row g-3">
                                <div class="col-md-4">
                                    <label for="validationDefault01" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="validationDefault01" value="John"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefault02" class="form-label">Début</label>
                                    <input type="date" class="form-control" id="validationDefault02" value="Doe"
                                        required>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationDefaultUsername" class="form-label">Fin</label>
                                    <div class="input-group">
                                        
                                        <input type="date" class="form-control" id="validationDefaultUsername"
                                            aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </div>
                            </form>
                            <!-- End Browser Default Validation -->

                        </div>
                    </div>

                </div><!-- End Right side columns -->

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">





                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Données <span></span></h5>

                                    <label for="name">Name</label>
                                         <select name="carburant_id" id="carburant_id">
                                            @foreach ($carburants as $carburant)
                                                <option value="{{ $carburant->id }}">{{ $carburant->driver->second_name }}</option>
                                            @endforeach
                                         </select>

                                         @if(isset($carburant))

                                        <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Vehicule Imm</th>
                                                <th scope="col">Quantité</th>
                                                <th scope="col">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carburants as $carburant)
                                            <tr>
                                                <td>{{$carburant->id}}</td>
                                                <td>{{}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                    </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Recent Sales -->



                    </div>
                </div><!-- End Left side columns -->


            </div>
        </section>

    </main><!-- End #main -->

@endsection