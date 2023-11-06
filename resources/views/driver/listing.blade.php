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

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
             
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">contact</th>
                    <th scope="col">Age</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Vehicle N</th>
                  </tr>
                </thead>
                <tbody>
                {{--  Ecrire ICI
                    @foreach ($viewData["products"] as $product)
                      <tr>
                        <th scope="row">{{ $model->getId() }}</th>
                        <td>{{ $model->get() }}</td>
                        <td>{{ $model->get() }}</td>
                        <th scope="row">{{ $model->get() }}</th>
                        <td>{{ $model->get() }}</td>
                        <td>{{ $model->get() }}</td>
                      </tr>
                    @endforeach
                    --}}
                  
                    
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection