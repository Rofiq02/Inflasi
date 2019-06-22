@extends('template')

@section('judul')
Form Pengeluaran
@stop

@section('content')



<form id="frmKategori" class="form-horizontal" action="{{ url('kategori/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-12">
            <div class="box">
                <!-- Bidodata kategori -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data kategori</h3>
                </div>
                <div class="box-body">
                    <div class="form-group @if($errors->has('nama_kategori')) has-error @endif">
                        <label for="nama_kategori" class="col-sm-2 control-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="kd_kategori" value="{{ $kategori['kd_kategori'] }}">
                            <input type="text" class="form-control" id="nama_kategori" placeholder="Nama Kategori" name="nama_kategori" value="{{ $kategori['nama_kategori'] }}">
                            @if ($errors->has('nama_kategori')) <div class="help-block">{{ $errors->first('nama_kategori') }}</div>@endif
                        </div>
                    </div>    
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">SAVE</button>
                </div>                   
            </div>
        </div>       
    </div>
</form>
@stop
