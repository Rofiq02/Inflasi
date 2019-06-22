@extends('template')

@section('judul')
Form inflasi YoY
@stop

@section('content')



<form id="frminflasi" class="form-horizontal" action="{{ url('inflasi_YoY/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-12">
            <div class="box">
                <!-- Bidodata inflasi -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data inflasi YoY</h3>
                </div>
                <div class="box-body">
                <div class="form-group @if($errors->has('kd_bulan')) has-error @endif">
                        <label for="bulan" class="col-sm-2 control-label">Bulan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kd_bulan" value="{{ $inflasi_YoY['kd_bulan'] }}">
                                <option value="">- Pilih Bulan -</option>
                                @foreach($bulan as $rsBln)
                                <option {{ $inflasi_YoY['kd_bulan']==$rsBln['kd_bulan'] ? 'selected' : "" }} value="{{ $rsBln['kd_bulan'] }}">{{ $rsBln['nama_bulan'] }}</option>   
                                @endforeach
                                @if ($errors->has('kd_bulan')) <div class="help-block">{{ $errors->first('kd_bulan') }}</div> @endif                             
                            </select>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('tahun')) has-error @endif">
                        <label for="tahun" class="col-sm-2 control-label">Tahun</label>
                        <div class="col-sm-10">
                             <select class="form-control" name="tahun" id="tahun" value="{{ $inflasi_YoY['tahun'] }}">
                                <option value="">- Pilih Tahun -</option>
                                @foreach($tahun as $rsThn)
                                <option {{ $inflasi_YoY['tahun']==$rsThn['tahun'] ? 'selected' : "" }} value="{{ $rsThn['tahun'] }}" >{{ $rsThn['tahun'] }}</option> 
                                @endforeach 
                                @if ($errors->has('tahun')) <div class="help-block">{{ $errors->first('tahun') }}</div> @endif 
                            </select>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('id')) has-error @endif">
                        <label for="bulan2" class="col-sm-2 control-label">Terhadap Bulan</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id" value="{{ $inflasi_YoY['id'] }}">
                                <option value="">- Pilih Bulan -</option>
                                @foreach($bulan2 as $rsBln)
                                <option {{ $inflasi_YoY['id']==$rsBln['id'] ? 'selected' : "" }} value="{{ $rsBln['id'] }}">{{ $rsBln['nama_bulan'] }}</option>   
                                @endforeach
                                @if ($errors->has('id')) <div class="help-block">{{ $errors->first('id') }}</div> @endif                             
                            </select>
                        </div>
                    </div>
                    <div class="form-group @if($errors->has('tahun2')) has-error @endif">
                        <label for="tahun2" class="col-sm-2 control-label">Terhadap Tahun</label>
                        <div class="col-sm-10">
                             <select class="form-control" name="tahun2" id="tahun2" value="{{ $inflasi_YoY['tahun2'] }}">
                                <option value="">- Pilih Tahun -</option>
                                @foreach($tahun2 as $rsThn)
                                <option {{ $inflasi_YoY['tahun2']==$rsThn['tahun2'] ? 'selected' : "" }} value="{{ $rsThn['tahun2'] }}" >{{ $rsThn['tahun2'] }}</option> 
                                @endforeach 
                                @if ($errors->has('tahun2')) <div class="help-block">{{ $errors->first('tahun2') }}</div> @endif 
                            </select>
                        </div>
                    </div>    
                    <div class="form-group @if($errors->has('besar_inflasi')) has-error @endif">
                        <label for="nama_inflasi" class="col-sm-2 control-label">Besar Inflasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="besar_inflasi" placeholder="Besar inflasi" name="besar_inflasi" value="{{ $inflasi_YoY['besar_inflasi'] }}">
                            @if ($errors->has('besar_inflasi')) <div class="help-block">{{ $errors->first('besar_inflasi') }}</div> @endif
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
