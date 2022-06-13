@include('components.ad_head_up')

<body>

  @include('components.ad_header')

  @include('components.ad_sidebar')

  <main id="main" class="main">

    @include('components.ad_breadcrumb', ['title' => "Package Management" , 'breadcrumb1' => "Pages", 'breadcrumb2' => "Package"])

    <section class="section">
      <div class="row">

        <div class="col-lg-12 col-md-6">
          <div class="card" style="overflow: auto">
            <div class="card-body" >
              <h5 class="card-title">Table with hoverable rows</h5>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bi-plus"></i>Create</button>

                <!-- Table with hoverable rows -->
                <table class="table table-hover" id="tableData">
                    <thead>
                        <tr>
                            <th class="width-5">#</th>
                            <th class="width-5">No</th>
                            <th class="space">Nama</th>
                            <th style="width: 15%;">Harga</th>
                            <th style="width: 15%;">Diskon</th>
                            <th class="space">Deskripsi</th>
                            <th class="space">Link</th>
                            <th class="space">Gambar</th>
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
                            <td class="id" style="display: none">{{$datas['id']}}</td>
                            <td>
                                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item edit" href="#"><i style="color: green" class="bi-pencil-fill"></i>Edit</a></li>
                                    <li><a class="dropdown-item hapus" href="#"><i style="color: red" class="bi-trash-fill"></i>Delete</a></li>
                                </ul>
                            </td>
                            <th scope="row"><?= ++$no ?></th>
                            <td class="space"><?= $datas['Name']?></td>
                            <td class="space"><?= str_replace(' ','.',Rupiah($datas['Price'])) ?></td>
                            <td class="space" style="display: none"><?= $datas['Price'] ?></td>
                            <td class="space"><?= str_replace(' ','.',Rupiah($datas['Discount'])) ?></td>
                            <td class="space" style="display: none"><?= $datas['Discount'] ?></td>
                            <td class="space"><?= $datas['Deskripsi'] ?></td>
                            <td class="space"><a href="<?= $datas['Link'] ?>"> <?= $datas['Link'] ?></a></td>
                            <td class="space"><img class="d-block w-75" src="{{url('resource/package/'.$datas['Image'])}}" ></td>
                            {{-- <td class="text-center"><img src="<?= url('img/'.$datas['Image'])?>" width="125px" alt="<?= $datas['Name'] ?>"></td> --}}
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


        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form enctype="multipart/form-data" name="add-package" id="add-package" method="post" action="{{url('api/package')}}">
                                @csrf
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Nama Package</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Name">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Harga</label>
                                <div class="col-sm-9">
                                  <input type="number" min="0" class="form-control" name="Price">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Harga Awal</label>
                                <div class="col-sm-9">
                                  <input type="number" min="0" class="form-control" name="Discount">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Deskripsi">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Link</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Link">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                  <input class="form-control" type="file" id="formFile" name="Image">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <div class="col-sm-2 col-form-label"></div>
                                <div class="col-sm-10" id="newImage">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                            </form><!-- End General Form Elements -->

                          </div>
                        </div>

                    </div>
                </div>

            </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form enctype="multipart/form-data" name="edit-package" id="edit-package" method="post">
                                @csrf
                                <input type="hidden" name="id" value="" id="id">
                                {{-- @csrf --}}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Nama Package</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="Name" value="" id="Name">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="inputnumber" class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                      <input type="number" min="0" class="form-control" name="Price" value="" id="Price">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="inputnumber" class="col-sm-3 col-form-label">Harga Awal</label>
                                    <div class="col-sm-9">
                                      <input type="number" min="0" class="form-control" name="Discount" value="" id="Discount">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="Deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="Deskripsi"  value="" id="Deskripsi">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">Link</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="Link"  value="" id="Link">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <label for="formFile" class="col-sm-3 col-form-label">Gambar</label>
                                    <div class="col-sm-9">
                                      <input class="form-control" type="file" id="formFile" name="Image">
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <div class="col-sm-3 col-form-label"></div>
                                    <div class="col-sm-9" id="oldImage">

                                    </div>
                                  </div>


                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>

                            </form><!-- End General Form Elements -->

                          </div>
                        </div>

                    </div>
                </div>

            </div>
            </div>
        </div>


        <script>
            let tableData = document.querySelector('#tableData');
            tableData.addEventListener('click', function (e) {
                if (e.target.className == 'dropdown-item edit') {
                    let id = e.target.parentNode.parentNode.parentNode.parentNode.querySelector('td.id').innerHTML;
                    document.querySelector('#editModal').querySelector('#id').value = id;
                    let Name = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[2].innerHTML;
                    document.querySelector('#editModal').querySelector('#Name').value = Name;
                    let Price = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[4].innerHTML;
                    document.querySelector('#editModal').querySelector('#Price').value = Price;
                    let Discount = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[6].innerHTML;
                    document.querySelector('#editModal').querySelector('#Discount').value = Discount;
                    let Deskripsi = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[7].innerHTML;
                    document.querySelector('#editModal').querySelector('#Deskripsi').value = Deskripsi;
                    let Link = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[8].querySelector('a').innerHTML;
                    document.querySelector('#editModal').querySelector('#Link').value = Link;
                    let oldImage = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[9].innerHTML;
                    document.querySelector('#editModal').querySelector('#oldImage').innerHTML = oldImage;
                    document.querySelector('#edit-package').setAttribute("action", base_url+'/api/package/update');
                    var myModal = new bootstrap.Modal(document.getElementById('editModal'), {})
                    myModal.show()
                }
            })
            document.querySelector('#editModal').querySelector('#formFile').addEventListener('change', function (e) {
            // document.querySelector('#oldImage');
                let oldImage = document.querySelector('#editModal').querySelector('#oldImage');
                let linkImage = URL.createObjectURL(event.target.files[0]);(e.target.files[0].name);
                    let img = '<img class="d-block w-100" src="' + linkImage + '">';
                oldImage.innerHTML = img;
            })
            document.querySelector('#createModal').querySelector('#formFile').addEventListener('change', function (e) {
            let newImage = document.querySelector('#createModal').querySelector('#newImage');
            let linkImage = URL.createObjectURL(event.target.files[0]);
            let img = '<img class="d-block w-100" src="' + linkImage + '">';
            newImage.innerHTML = img;
        })

        </script>
        @include('components.ad_modal_deletes')

      </div>
    </section>

  </main><!-- End #main -->

  @include('components.ad_footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


</body>

</html>
