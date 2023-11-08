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
                                <h5 class="card-title text-center pb-0 fs-4">Driver Registration</h5>
                            </div>
                            <form action="{{ route('driver.store') }}" method="POST" class="row g-3 needs-validation"
                                novalidate>
                                @csrf
                                <div class="col-12">
                                    <label for="yourName" class="form-label">Nom</label>
                                    <input type="text" name="second_name" class="form-control" id="yourName" required>
                                    <div class="invalid-feedback">Veuillez entrer votre nom.</div>
                                </div>
                                <div class="col-12">
                                    <label for="yourfirstname" class="form-label">Prenom</label>
                                    <input type="text" name="first_name" class="form-control" id="yourfirstname"
                                        required>
                                    <div class="invalid-feedback">Veuillez entrer votre prénom.</div>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Contact</label>
                                    <input type="tel" name="phone" class="form-control" id="contact" required>
                                    <div class="invalid-feedback">Veuillez entrer un contact valide.</div>
                                </div>

                                <div class="col-12">
                                    <label for="cni" class="form-label">Numero CNI</label>
                                    <input type="text" name="cni" class="form-control" id="cni" required>
                                    <div class="invalid-feedback">Veuillez entrer un contact valide.</div>
                                </div>

                                <div class="col-12">
                                    <label for="salary" class="form-label">Salaire</label>
                                    <input type="text" name="salary" class="form-control" id="salary" required>
                                    <div class="invalid-feedback">Veuillez entrer un contact valide.</div>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Adresse mail</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                    <div class="invalid-feedback">Veuillez choisir une adresse.</div>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Adresse </label>
                                    <input type="address" name="address" class="form-control" id="email" required>
                                    <div class="invalid-feedback">Veuillez choisir une adresse.</div>
                                </div>
                                <div class="col-12">
                                    <label for="birthday" class="form-label">Date de naissance</label>
                                    <input type="date" name="birthday" class="form-control" id="birthday" required>
                                    <div class="invalid-feedback">Veuillez choisir un âge valide.</div>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Votre Mot de passe</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                    <div class="invalid-feedback">Veuillez entrer l'immatriculation du véhicule.</div>
                                </div>
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
                                            <th scope="col">Nom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Date de naissance</th>
                                            <th scope="col">Adresse</th>
                                            <th scope="col">Salaire</th>
                                            <th scope="col">Téléphone</th>
                                            <th scope="col">Status</th>
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
                                            <td>{{$driver->salary}}</td>
                                            <td>{{ $driver->phone }}</td>
                                            <td>{{ $driver->is_associated ? 1 : 0 }}</td>
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

</main><!-- End #main -->
@endsection