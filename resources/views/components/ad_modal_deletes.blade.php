
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="modal-body">
            Are you sure you want to delete this data ?
            {{-- {{$datas['Name']}} --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        {{-- <form action="{{ url('api/'.$target.'/'.$datas['id'])}}" method="POST"> --}}
            <form  method="POST" id="delete">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <?php
            if ((Request::segment(1))=="ref_major"){echo "<script>let target='r_major'</script>";}
            elseif ((Request::segment(1))=="ref_class"){echo "<script>let target='r_class'</script>";}
            elseif ((Request::segment(1))=="ref_package"){echo "<script>let target='r_package'</script>";}
            elseif ((Request::segment(1))=="event"){echo "<script>let target='event'</script>";}
            elseif ((Request::segment(1))=="package"){echo "<script>let target='package'</script>";}
            elseif ((Request::segment(2))=="package"){echo "<script>let target='package'</script>";}
            elseif ((Request::segment(1))=="service"){echo "<script>let target='service'</script>";}
            elseif ((Request::segment(1))=="team"){echo "<script>let target='team'</script>";}
            elseif ((Request::segment(1))=="video"){echo "<script>let target='video'</script>";}
            elseif ((Request::segment(1))=="faq"){echo "<script>let target='faq'</script>";}
            elseif ((Request::segment(1))=="footer"){echo "<script>let target='footer'</script>";}
            elseif ((Request::segment(1))=="registration"){echo "<script>let target='registration'</script>";}
            elseif ((Request::segment(1))=="testimonial"){echo "<script>let target='testimonial'</script>";}
            elseif ((Request::segment(1))=="programs"){echo "<script>let target='program'</script>";}
            elseif ((Request::segment(1))=="career"){echo "<script>let target='career'</script>";}
            elseif ((Request::segment(1))=="friend"){echo "<script>let target='friend'</script>";}
            elseif ((Request::segment(1))=="article"){echo "<script>let target='article'</script>";}
            elseif ((Request::segment(1))=="user"){echo "<script>let target='user'</script>";}
  ?>
  <script>
      if (tableData) {

      }else{

        let tableData = document.querySelector('#tableData');
      }

      tableData.addEventListener('click', function (e) {
        if (e.target.className == 'dropdown-item hapus') {
            // console.log(e.target.parentNode.parentNode.parentNode.parentNode.querySelector('td.id'));
            let id = e.target.parentNode.parentNode.parentNode.parentNode.querySelector('td.id').innerHTML;
            let nama = e.target.parentNode.parentNode.parentNode.parentNode.querySelectorAll('td')[2].innerHTML;
            let label = document.querySelector('#deleteModal').querySelector('#modal-body').innerHTML =  'Are you sure you want to delete data : <b>'+nama+'</b>';
            document.querySelector('#delete').setAttribute("action", base_url+'/api/'+target+'/'+id);
            var modalDelete = new bootstrap.Modal(document.getElementById('deleteModal'), {})
            modalDelete.show()
        }
    } )
  </script>
  {{--
    1. tambahin id="datatable" di table                 => id="tableData"
    2. tambahin nama class di button (edit/hapus)       => class="dropdown-item hapus"
    3. tambahin id data di table dengan display none    => <td class="id" style="display: none">{{$datas['id']}}</td>
    4. tambahin partial view diluar foreach             => @include('components.ad_modal_deletes')


     --}}
