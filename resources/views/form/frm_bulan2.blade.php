@extends('template')

@section('judul')
Form Bulan
@stop

@section('content')

@if ($errors->any())
  <div class="alert alert-danger alert-dismissible" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><em>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</em>
</div>
@endif

<form id="frmBulan2" class="form-horizontal" action="{{ url('bulan/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-12">
            <div class="box">
                <!-- Bidodata kategori -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data Bulan</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama_bulan" class="col-sm-2 control-label">Nama Bulan</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="kd_bulan" value="{{ $bulan2['id'] }}">
                            <input type="text" class="form-control" id="nama_bulan" placeholder="Nama Bulan" name="nama_bulan" value="{{ $bulan2['nama_bulan'] }}">
                        </div>
                    </div>    
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" onclick="return confimation_simpan(this)" class="btn btn-primary pull-right">SAVE</button>
                </div>                   
            </div>
        </div>       
    </div>
</form>
@stop
