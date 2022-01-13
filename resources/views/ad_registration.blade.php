@include('components.ad_head_up')

<body>

  @include('components.ad_header')

  @include('components.ad_sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tabel Pendaftaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Registration</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-12 col-md-6">
          <div class="card" style="overflow: auto">
            <div class="card-body" >
              <h5 class="card-title">Table with hoverable rows</h5>

                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Handphone</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Class</th>
                        <th scope="col">Major</th>
                        <th scope="col">Package</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    foreach ($data['registration'] as $registrations) { ?>
                    <tr>
                        <td>
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i style="color: green" class="bi-pencil-fill"></i>Edit</a></li>
                                <li><a class="dropdown-item" href="#"><i style="color: red" class="bi-trash-fill"></i>Delete</a></li>
                            </ul>
                        </td>
                        <th scope="row"><?=++$no?></th>
                        <td><?= $registrations['Name'] ?></td>
                        <td><?= $registrations['Email'] ?></td>
                        <td><?= $registrations['Handphone'] ?></td>
                        <td><?= $registrations['School_Origin'] ?></td>
                        <td><?php foreach ($data['class'] as $classs) { if($registrations['Class'] == $classs['id']) {echo $classs['Name'];} }?></td>
                        <td><?php foreach ($data['major'] as $major) { if($registrations['Major'] == $major['id']) {echo $major['Name'];} }?></td>
                        <td><?php foreach ($data['package'] as $package) { if($registrations['Package'] == $package['id']) {echo $package['Name'];} }?></td>
                    </tr>
                    <?php }
                    if ($no == 0) {
                       echo ' <tr><th colspan="9" class="text-center" > Tidak Ada Data</th></tr>';
                    }?>
                    </tbody>
                </table>
                <!-- End Table with hoverable rows -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  @include('components.ad_footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


</body>

</html>
