@include('components.ad_head_up')

<body>

  @include('components.ad_header')

  @include('components.ad_sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Table Video</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Video</li>
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
                <table class="table table-hover" id="tableData">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Link</th>
                        <th scope="col">Video</th>
                        <th scope="col">Text1</th>
                        <th scope="col">Text2</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 0;
                    foreach ($data as  $datas) { ?>

                    <tr>
                        <td class="id" style="display: none">{{$datas['id']}}</td>
                        <td>
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item edit" href="#"><i style="color: green" class="bi-pencil-fill"></i>Edit</a></li>
                                <li><a class="dropdown-item hapus" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{$datas['id']}}"><i style="color: red" class="bi-trash-fill"></i>Delete</a></li>
                            </ul>
                        </td>
                        <th scope="row"><?= ++$no ?></th>
                        <td><?= $datas['Title'] ?></td>
                        <td><?= $datas['Link'] ?></td>
                        <?php $PecahLink = explode("/",$datas['Link']);
                        if($PecahLink[0] =='https:' && $PecahLink[2] =='youtu.be'){
                            $link = $PecahLink[3];
                        }
                        elseif ($PecahLink[0] =='https:' && $PecahLink[2] =='www.youtube.com' && $PecahLink[3] =='embed'){
                            $link = $PecahLink[4];
                        }
                        elseif ($PecahLink[0] =='https:' && $PecahLink[2] =='www.youtube.com') {
                            $link = explode("=",$PecahLink[3])[1];
                        }
                        ?>
                        <td><iframe width="320" height="180" src="https://www.youtube.com/embed/<?=$link?>" title="<?=$datas['Title']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                        <td><?= $datas['Text1'] ?></td>
                        <td><?= $datas['Text2'] ?></td>
                    </tr>
                    <?php } if ($no == 0) {
                        echo ' <tr><th colspan="7" class="text-center" > Tidak Ada Data</th></tr>';
                     } ?>
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
                <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form name="add-video" id="add-video" method="post" action="{{url('api/video')}}">
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Title">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Link</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Link">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Video</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Video">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Text1</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Text1">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Text2</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Text2">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                              {{-- <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                  <input class="form-control" type="file" id="formFile">
                                </div>
                              </div> --}}

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
                <h5 class="modal-title" id="exampleModalLabel">Edit Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form name="edit-video" id="edit-video" method="post">
                                <input type="hidden" name="id" value="" id="id">
                                <input type="hidden" name="_method" value="PUT">
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Title" id="Title">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Link</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Link" id="Link">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Video</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="Video" rows="5"disabled></textarea>
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Text1</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Text1" id="Text1">
                                </div>
                              </div>
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Text2</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" name="Text2" id="Text2">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                              {{-- <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-3 col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                  <input class="form-control" type="file" id="formFile">
                                </div>
                              </div> --}}

                            </form><!-- End General Form Elements -->

                          </div>
                        </div>

                    </div>
                </div>

            </div>
            </div>
        </div>
        @include('components.ad_modal_deletes')

      </div>
    </section>

  </main><!-- End #main -->

  @include('components.ad_footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    let tableData = document.querySelector('#tableData');
    tableData.addEventListener('click', function (e) {
        if (e.target.className == 'dropdown-item edit') {
            console.log(e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[6]);
            let id = e.target.parentNode.parentNode.parentNode.parentNode.querySelector('td.id').innerHTML;
            document.querySelector('#editModal').querySelector('#id').value = id;
            let Title = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[2].innerHTML;
            document.querySelector('#editModal').querySelector('#Title').value = Title;
            let Link = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[3].innerHTML;
            document.querySelector('#editModal').querySelector('#Link').value = Link;
            let Video = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[4].innerHTML;
            document.querySelector('#editModal').querySelector('#Video').innerHTML = Video;
            let Text1 = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[5].innerHTML;
            document.querySelector('#editModal').querySelector('#Text1').value = Text1;
            let Text2 = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[6].innerHTML;
            document.querySelector('#editModal').querySelector('#Text2').value = Text2;

            document.querySelector('#edit-video').setAttribute("action", base_url+'/api/video/'+id);
            var myModal = new bootstrap.Modal(document.getElementById('editModal'), {})
            myModal.show()
        }
    })

</script>
</body>

</html>
