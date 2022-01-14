@include('components.ad_head_up')

<body>

  @include('components.ad_header')

  @include('components.ad_sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Package</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">

        <div class="col-lg-12 col-md-6">
          <div class="card" style="overflow: auto">
            <div class="card-body" >
              <h5 class="card-title">Table with hoverable rows</h5>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bi-plus"></i>Create</button>

                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Link</th>
                        <th scope="col">Gambar</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php function Rupiah($angka){
                        $hasil = "Rp " . number_format($angka,2,',','.');
                        return $hasil;
                    }
                    $no = 0;
                    foreach ($data as  $datas) { ?>
                    <tr>
                        <td>
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i style="color: green" class="bi-pencil-fill"></i>Edit</a></li>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><i style="color: red" class="bi-trash-fill"></i>Delete</a></li>
                            </ul>
                        </td>
                        <th scope="row"><?= ++$no ?></th>
                        <td><?= $datas['Name'] ?></td>
                        <td><?= Rupiah($datas['Price']) ?></td>
                        <td><?= Rupiah($datas['Discount']) ?></td>
                        <td><?= $datas['Deskripsi'] ?></td>
                        <td><a href="<?= $datas['Deskripsi'] ?>"> <?= $datas['Link'] ?></a></td>
                        <td class="text-center"><img src="<?= url('img/'.$datas['Image'])?>" width="125px" alt="<?= $datas['Name'] ?>"></td>
                    </tr>
                    <?php } if ($no == 0) {
                        echo ' <tr><th colspan="8" class="text-center" > Tidak Ada Data</th></tr>';
                     }?>
                    </tbody>
                </table>
                <!-- End Table with hoverable rows -->

            </div>
          </div>
        </div>

        {{-- Pop up --}}
        <!-- Modal -->

        @include('components.ad_modal_delete')

        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nama Package</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Harga</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Diskon</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Link</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                  <input class="form-control" type="file" id="formFile">
                                </div>
                              </div>

                            </form><!-- End General Form Elements -->

                          </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
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
