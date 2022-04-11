@include('components.ad_head_up')

<body class="">

  @include('components.ad_header')

  @include('components.ad_sidebar')

  <main id="main" class="main">

    @include('components.ad_breadcrumb', ['title' => "Text Management" , 'breadcrumb1' => "Pages", 'breadcrumb2' => "Text"])

    <section class="section">
        <div class="row">

        <div class="col-lg-12 col-md-6">
          <div class="card" style="overflow: auto">
            <div class="card-body" >
              <h5 class="card-title">Table with hoverable rows</h5>
                <!-- Button trigger modal -->
                {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal"><i class="bi-plus"></i>Create</button> --}}
                <!-- Table with hoverable rows -->
                <table class="table table-hover" id="tableData">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th style="width: 10px;">No</th>
                        <th style="width: 100px;">Text</th>
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
                                {{-- <li><a class="dropdown-item hapus" href="#"><i style="color: red" class="bi-trash-fill"></i>Delete</a></li> --}}
                            </ul>
                        </td>
                        <th scope="row"><?=++$no?></th>
                        <td class="space">
                            <?= $datas['Text'] ?>
                            <?php
                                $urlall = strstr( $data[0]['Text'], 'http');
                                $url1 = str_replace('"></oembed></figure>', '', $urlall);
                                $url2 = str_replace('youtu.be', 'www.youtube.com', $url1);
                                $url = str_replace('m/', 'm/embed/', $url2);
                                // dd($url);
                            ?>
                            @if ($urlall)
                                <iframe width="560" height="315" src="<?= $url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                {{-- {{$url }} --}}
                            @endif
                        </td>
                    </tr>
                    <?php } if ($no == 0) {
                        echo ' <tr><th colspan="7" class="text-center" > Tidak Ada Data</th></tr>';
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
                <h5 class="modal-title" id="exampleModalLabel">Create Text</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form enctype="multipart/form-data" name="add-event" id="add-event" method="post" action="{{url('api/text')}}" >
                                @csrf
                                <div class="row mb-3">
                                   <label for="inputText" class="col-sm-2 col-form-label">Text</label>
                                    <div class="col-sm-10">
                                    <textarea id="editor" type="text" class="form-control" name="Text"></textarea>
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
        @include('components.ad_modal_deletes')
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Text</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">

                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>

                            <!-- General Form Elements -->
                            <form enctype="multipart/form-data" name="edit-event" id="edit-event" method="post">
                                @csrf
                                <input type="hidden" name="id" value="" id="id">
                                {{-- @csrf --}}
                                <input type="hidden" name="_method" value="PUT">
                              <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Text</label>
                                <div class="col-sm-10">
                                  <textarea type="text" class="form-control" name="Text" id="Text">

                                  </textarea>
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


      </div>
    </section>

  </main><!-- End #main -->

  @include('components.ad_footer')

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script>
        let tableData = document.querySelector('#tableData');
        let count = 0;
        tableData.addEventListener('click', function (e) {

            if (e.target.className == 'dropdown-item edit') {
                let id = e.target.parentNode.parentNode.parentNode.parentNode.querySelector('td.id').innerHTML;
                document.querySelector('#editModal').querySelector('#id').value = id;
                let Text = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[2].innerHTML;
                document.querySelector('#editModal').querySelector('#Text').innerHTML = Text;
                console.log("count",count);

                if (count == 0) {
                    ClassicEditor
                    .create( document.querySelector( '#Text' ) )
                    .catch( error => {
                        console.error( error );
                    } );
                }


                count += 1;

                document.querySelector('#edit-event').setAttribute("action", base_url+'/api/text/update/');
                var myModal = new bootstrap.Modal(document.getElementById('editModal'), {})
                myModal.show()
            }
        })
    </script>


<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor.defaultConfig = {
      toolbar: {
        items: [
          'heading',
          '|',
          'bold',
          'italic',
          '|',
          'bulletedList',
          'numberedList',
          '|',
          'outdent', 'indent', '|',
          'insertTable',
          '|',
          'mediaEmbed',
          'undo',
          'redo'
        ]
      },
      image: {
        toolbar: [
          'imageStyle:full',
          'imageStyle:side',
          '|',
          'imageTextAlternative'
        ]
      },
      table: {
        contentToolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
      },
      language: 'en'
    };

</script>

</body>

</html>
