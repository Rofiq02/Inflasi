@extends('template')

@section('judul')
Data YoY
@stop

@section('ac-inflasi')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="inflasi_YoY/add"><button type="button" class="btn bg-green btn-flat margin"><i class="fa fa-plus"></i></button></a>
                @csrf
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Bulan/Tahun</th>
                  <th>Terhadap Bulan/Tahun</th>
                  <th>Besar Inflasi</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inflasi_YoY as $rsInf)
            <tr>
                  <td>{{ $rsInf -> kd_YoY }}</td>
                  <td>{{ App\MGlobal::Get_Bulan($rsInf->kd_bulan) }}/{{ $rsInf -> tahun }}</td>
                  <td>{{ App\MGlobal::Get_Bulan2($rsInf->id) }}/{{ $rsInf -> tahun2 }}</td>
                  <td>{{ $rsInf -> besar_inflasi }}%</td>
                  <td>
                        <a href="/inflasi_YoY/edit/{{ $rsInf->kd_YoY }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                        <a onclick="return confimation_hapus(this)" link="/inflasi_YoY/hapus/{{ $rsInf->kd_YoY }}"><button type="button" class="btn bg-red btn-flat"><i class="fa fa-trash"></i></button></a>
                  </td>
            </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
@stop




