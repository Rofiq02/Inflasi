@extends('template')

@section('judul')
Form inflasi
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

<form id="frminflasi" class="form-horizontal" action="{{ url('inflasi_bulanan/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-12">
            <div class="box">
                <!-- Bidodata inflasi -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data inflasi Bulanan</h3>
                </div>
            <div class="box-body">
                <div class="form-group @if($errors->has('kd_bulan')) has-error @endif">
                        <label for="bulan" class="col-sm-2 control-label">Bulan</label>
                        <div class="col-sm-10">
                        <input type="hidden" name="kd_inflasi" value="{{ $inflasi['kd_inflasi'] }}">
                            <select class="form-control" name="kd_bulan" value="{{ $inflasi['kd_bulan'] }}">
                                <option value="">- Pilih Bulan -</option>
                                @foreach($bulan as $rsBln)
                                <option {{ $inflasi['kd_bulan']==$rsBln['kd_bulan'] ? 'selected' : "" }} value="{{ $rsBln['kd_bulan'] }}">{{ $rsBln['nama_bulan'] }}</option> 
                                @endforeach
                                @if ($errors->has('kd_bulan')) <div class="help-block">{{ $errors->first('kd_bulan') }}</div> @endif                             
                            </select>
                        </div>
                 </div> 
                    <div class="form-group @if($errors->has('tahun')) has-error @endif">
                        <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                        <div class="col-sm-10">
                             <select class="form-control" name="tahun" id="tahun" value="{{ $inflasi['tahun'] }}">
                                <option value="">- Pilih Tahun -</option>
                                @foreach($tahun as $rsThn)
                                <option {{ $inflasi['tahun']==$rsThn['tahun'] ? 'selected' : "" }} value="{{ $rsThn['tahun'] }}" >{{ $rsThn['tahun'] }}</option> 
                                @endforeach
                                @if ($errors->has('tahun'))<div class="help-block">{{ $errors->first('tahun') }}</div> @endif  
                            </select>
                        </div>
                    </div> 
                    <div class="form-group @if($errors->has('besar_inflasi')) has-error @endif">
                        <label for="nama_inflasi" class="col-sm-2 control-label">Besar Inflasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="besar_inflasi" placeholder="Besar inflasi" name="besar_inflasi" value="{{ $inflasi['besar_inflasi'] }}">
                            @if ($errors->has('besar_inflasi'))<div class="help-block">{{ $errors->first('besar_inflasi') }}</div> @endif
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
