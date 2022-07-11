@extends('layouts.main')
@section('contents')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>
            Ujian
          </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Navbar & Tabs</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-8">
          <div class="card card-primary card-outline card-tabs">
            <div class="card-header p-0 pt-1 border-bottom-0">
              <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                    href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home"
                    aria-selected="true">Part 1</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                    href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                    aria-selected="false">Part 2</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill"
                    href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages"
                    aria-selected="false">Part 3</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill"
                    href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings"
                    aria-selected="false">Save</a>
                </li>
              </ul>
            </div>
            <form action="{{ route('ujian.store') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel"
                    aria-labelledby="custom-tabs-three-home-tab">
                    @foreach ($soal as $item => $value)
                    @if ($value->id <= 10) <h6>{{ $item + 1 . ') ' . $value->pertanyaan }}</h6>
                      @foreach ($opsi as $k => $v)
                      @if ($value->id === $v->soal_id)
                      <div class="form-group clearfix">
                        <input type="hidden" name="soal[{{ $value->id }}]" value="{{ $value->id }}">
                        <input type="hidden" name="status[{{ $v->id }}]" value="{{ $v->status }}">
                        <div class="icheck-success">
                          <input type="radio" name="pilihan[{{ $value->id }}]" id="radioSuccess{{ $v->id }}"
                            value="{{ $v->id }}">
                          <label class="form-check-label" for="radioSuccess{{ $v->id }}">
                            {{ $v->pilihan }}
                          </label>
                        </div>
                      </div>
                      @endif
                      @endforeach
                      @endif
                      @endforeach
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-three-profile-tab">
                    @foreach ($soal as $item => $value)
                    @if ($value->id > 10 and $value->id <= 20) <h6>{{ $item + 1 . ') ' . $value->pertanyaan }}</h6>
                      @foreach ($opsi as $k => $v)
                      @if ($value->id === $v->soal_id)
                      <div class="form-group clearfix">
                        <input type="hidden" name="soal[{{ $value->id }}]" value="{{ $value->id }}">
                        <input type="hidden" name="status[{{ $v->id }}]" value="{{ $v->status }}">
                        <div class="icheck-success">
                          <input type="radio" name="pilihan[{{ $value->id }}]" id="radioSuccess{{ $v->id }}"
                            value="{{ $v->id }}">
                          <label class="form-check-label" for="radioSuccess{{ $v->id }}">
                            {{ $v->pilihan }}
                          </label>
                        </div>
                      </div>
                      @endif
                      @endforeach
                      @endif
                      @endforeach

                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel"
                    aria-labelledby="custom-tabs-three-messages-tab">
                    @foreach ($soal as $item => $value)
                    @if ($value->id > 20)
                    <h6>{{ $item + 1 . ') ' . $value->pertanyaan }}</h6>
                    @foreach ($opsi as $k => $v)
                    @if ($value->id === $v->soal_id)
                    <div class="form-group clearfix">
                      <input type="hidden" name="soal[{{ $value->id }}]" value="{{ $value->id }}">
                      <input type="hidden" name="status[{{ $v->id }}]" value="{{ $v->status }}">
                      <div class="icheck-success">
                        <input type="radio" name="pilihan[{{ $value->id }}]" id="radioSuccess{{ $v->id }}"
                          value="{{ $v->id }}">
                        <label class="form-check-label" for="radioSuccess{{ $v->id }}">
                          {{ $v->pilihan }}
                        </label>
                      </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel"
                    aria-labelledby="custom-tabs-three-settings-tab">
                    <div class="icheck-success mb-3">
                      <input type="checkbox" id="checkboxSuccess" required>
                      <label for="checkboxSuccess">
                        Apakah anda yakin dengan jawaban anda dan ingin menyimpannya?
                      </label>
                    </div>
                  @method('POST')
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </form>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection