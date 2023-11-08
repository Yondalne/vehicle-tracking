@extends('layouts.app')
@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('vehicle.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class= "icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                  <h5 class="card-title">Drivers <span>| Nombre</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class ="card info-card revenue-card">

                <div class="filter">
                  <a class= "icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                  <h5 class="card-title">Maintenance <span>| Nombre</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class= "icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                  <h5 class="card-title">Fuel <span>| Quantité</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->


            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class ="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                  <h5 class="card-title">Vehicle List <span></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Serie</th>
                        <th scope="col">Puissance</th>
                        <th scope="col">Couleur</th>
                        <th scope="col">Marque</th>
                        <th scope="col">Année Production</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($vehicles as $vehicle)
                      <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->serial }}</td>
                        <td>{{ $vehicle->power }}</td>
                        <td>{{ $vehicle->color }}</td>
                        <td>{{ $vehicle->brand }}</td>
                        <td>{{ $vehicle->production_year }}</td>
                        <td>{{ $vehicle->is_attributed ? 1 : 0 }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
          <div class="d-flex justify-content-center">
            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Vehicle Registration</h5>
                </div>
                <form action="{{ route('vehicle.store') }}" method="post" class="row g-3 needs-validation" novalidate>
                  @csrf
                  <div class="col-12">
                    <label for="serial" class="form-label">Serie</label>
                    <input type="text" name="serial" class="form-control" id="serial" required>
                    <div class="invalid-feedback">Veuillez saisie la série du vehicule.</div>
                  </div>
                  <div class="col-12">
                    <label for="power" class="form-label">Puissance</label>
                    <input type="text" name="power" class="form-control" id="power" required>
                    <div class="invalid-feedback">Veuillez entrer votre prénom.</div>
                  </div>
                  <div class="col-12">
                    <label for="color" class="form-label">Couleur</label>
                    <input type="text" name="color" class="form-control" id="color" required>
                    <div class="invalid-feedback">Veuillez entrer la couleur.</div>
                  </div>

                  <div class="col-12">
                    <label for="brand" class="form-label">Marque</label>
                    <input type="text" name="brand" class="form-control" id="brand" required>
                    <div class="invalid-feedback">Veuillez entrer la marque.</div>
                  </div>

                  <div class="col-12">
                    <label for="production_year" class="form-label">Année Production</label>
                    <input type="text" name="production_year" class="form-control" id="production_year" required>
                    <div class="invalid-feedback">Veuillez entrer une année valide.</div>
                  </div>
                  <div class="col-12">
                    <label for="is_attributed" class="form-label">Status</label>
                   <select name="is_attributed" id="is_attributed">
                    <option value="0">0</option>
                    <option value="1">1</option>
                   </select>
                    <div class="invalid-feedback">Veuillez choisir un status.</div>
                  <div class="col-12">
                    <button class="btn btn-primary" type="submit">Soumettre le formulaire</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div><!-- End Right side columns -->
      </div>
    </section>
  </main><!-- End #main -->
@endsection
