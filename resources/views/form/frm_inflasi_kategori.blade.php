@extends('template')

@section('judul')
Form Inflasi Pengeluaran
@stop

@section('content')

@if($mess != '')
    <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><em>
        <ul>
            {{ $mess }}
        </ul>
        </em>
    </div>
@endif

<form id="frminflasi_kategori" class="form-horizontal" action="{{ url('inflasi_kategori/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-12">
            <div class="box">
                <!-- Bidodata inflasi -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data inflasi Pengeluaran</h3>
                </div>
                <div class="box-body">
                <div class="form-group  @if($errors->has('kd_kategori')) has-error @endif">
                        <label for="kategori" class="col-sm-2 control-label">Kategori</label>
                        <div class="col-sm-10">
                        <input type="hidden" name="id" value="{{ $inflasi_kategori['id'] }}">
                            <select class="form-control" name="kd_kategori" value="{{ $inflasi_kategori['kd_kategori'] }}">
                                <option value="">- Pilih Kategori -</option>
                                @foreach($kategori as $rsKat)
                                <option {{ $inflasi_kategori['kd_kategori']==$rsKat['kd_kategori'] ? 'selected' : "" }} value="{{ $rsKat['kd_kategori'] }}">{{ $rsKat['nama_kategori'] }}</option> 
                                @endforeach
                                @if ($errors->has('kd_kategori')) <div class="help-block">{{ $errors->first('kd_kategori') }}</div> @endif                             
                            </select>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('kd_bulan')) has-error @endif">
                        <label for="bulan" class="col-sm-2 control-label">Bulan</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="kd_bulan" name="kd_bulan" value="{{ $inflasi_kategori['kd_bulan'] }}">
                            <option value="">- Pilih Bulan -</option>
                            @foreach($bulan as $rsBln)
                            <option {{ $inflasi_kategori['kd_bulan']==$rsBln['kd_bulan'] ? 'selected' : "" }} value="{{ $rsBln['kd_bulan'] }}">{{ $rsBln['nama_bulan'] }}</option> 
                            @endforeach
                            @if ($errors->has('kd_bulan')) <div class="help-block">{{ $errors->first('kd_bulan') }}</div> @endif                             
                        </select>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('tahun')) has-error @endif">
                        <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                        <div class="col-sm-10">
                             <select class="form-control" name="tahun" id="tahun" value="{{ $inflasi_kategori['tahun'] }}">
                                <option value="">- Pilih Tahun -</option>
                                @foreach($tahun as $rsThn)
                                <option {{ $inflasi_kategori['tahun']==$rsThn['tahun'] ? 'selected' : "" }} value="{{ $rsThn['tahun'] }}" >{{ $rsThn['tahun'] }}</option> 
                                @endforeach 
                                @if ($errors->has('tahun')) <div class="help-block">{{ $errors->first('tahun') }}</div> @endif 
                            </select>
                        </div>
                    </div>    
                    <div class="form-group form-group @if($errors->has('nilai_inflasi')) has-error @endif">
                        <label for="inflasi_kategori" class="col-sm-2 control-label">Besar inflasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nilai_inflasi" placeholder="Besar Inflasi" name="nilai_inflasi" value="{{ $inflasi_kategori['nilai_inflasi'] }}">
                            @if ($errors->has('nilai_inflasi')) <div class="help-block">{{ $errors->first('nilai_inflasi') }}</div> @endif
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
