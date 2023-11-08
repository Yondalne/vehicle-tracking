@extends('layouts.app')
@section('main')
<section class="section dashboard">
        <div class="row">

            
            <div class="col-lg-">
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
                                            <th scope="col">Nom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Date de naissance</th>
                                            <th scope="col">Adresse</th>
                                            <th scope="col">Salaire</th>
                                            <th scope="col">Téléphone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($drivers as $driver)
                                        <tr>
                                            <th scope="row">{{ $driver->id }}</th>
                                            <td>{{ $driver->second_name }}</td>
                                            <td>{{ $driver->email }}</td>
                                            <td>{{ $driver->birthday }}</td>
                                            <td>{{ $driver->address }}</td>
                                            <td>
                                                @if ($driver->drive)
                                                {{ $driver->drive->id }}
                                                @else
                                                N/A
                                                @endif
                                            </td>
                                            <td>{{ $driver->phone }}</td>
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
@endsection