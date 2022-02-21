<div class="pagetitle">
    <h1>{{$title}}</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        @if ($breadcrumb1 != "")
            <li class="breadcrumb-item">{{$breadcrumb1}}</li>
        @endif
        <li class="breadcrumb-item active">{{$breadcrumb2}}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

